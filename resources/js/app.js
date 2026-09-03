document.addEventListener('DOMContentLoaded', () => {
	const categorySelect = document.querySelector('#category');
	const subcategorySelect = document.querySelector('#subcategory');

	if (categorySelect && subcategorySelect && window.catalogCategories) {
		const updateSubcategories = () => {
			const selectedSubcategory = subcategorySelect.dataset.selected;
			const subcategories = window.catalogCategories[categorySelect.value] || [];

			subcategorySelect.innerHTML = '<option value="">Pilih subkategori</option>';
			subcategories.forEach((subcategory) => {
				const option = new Option(subcategory, subcategory);
				option.selected = subcategory === selectedSubcategory;
				subcategorySelect.add(option);
			});
			subcategorySelect.dataset.selected = '';
		};

		categorySelect.addEventListener('change', () => {
			subcategorySelect.dataset.selected = '';
			updateSubcategories();
		});
		updateSubcategories();
	}

	const productCards = [...document.querySelectorAll('[data-product-category]')];
	const filterLinks = document.querySelectorAll('[data-filter-category]');

	if (filterLinks.length) {
		const matchesCategory = (productCategory, selectedCategory) => selectedCategory === 'Meteran Air'
			? productCategory === 'Meteran Air' || productCategory === 'Water Meter'
			: productCategory === selectedCategory;

		const filterProducts = (category, subcategory = '') => {
			let visibleIndex = 0;

			productCards.forEach((product) => {
				const matches = category === 'all'
					|| (matchesCategory(product.dataset.productCategory, category)
						&& (! subcategory || product.dataset.productSubcategory === subcategory));

				clearTimeout(product.filterTimeout);
				if (matches) {
					product.hidden = false;
					product.classList.add('is-filter-hidden');
					product.style.setProperty('--filter-delay', `${visibleIndex * 65}ms`);
					visibleIndex += 1;
					requestAnimationFrame(() => product.classList.remove('is-filter-hidden'));
				} else {
					product.classList.add('is-filter-hidden');
					product.filterTimeout = setTimeout(() => {
						product.hidden = true;
					}, 320);
				}
			});
		};

		document.querySelectorAll('.category-group').forEach((group) => {
			const summary = group.querySelector('summary');
			const children = group.querySelector('.category-children');

			const openGroup = () => {
				group.open = true;
				group.classList.remove('is-closing');
				children.style.maxHeight = '0px';
				requestAnimationFrame(() => {
					children.style.maxHeight = `${children.scrollHeight}px`;
				});
			};

			const closeGroup = () => {
				children.style.maxHeight = `${children.scrollHeight}px`;
				group.classList.add('is-closing');
				requestAnimationFrame(() => {
					children.style.maxHeight = '0px';
				});
			};

			summary.addEventListener('click', (event) => {
				event.preventDefault();
				filterProducts(summary.querySelector('[data-filter-category]').dataset.filterCategory);

				if (group.open && ! group.classList.contains('is-closing')) {
					closeGroup();
				} else {
					openGroup();
				}
			});

			children.addEventListener('transitionend', (event) => {
				if (event.propertyName === 'max-height' && group.classList.contains('is-closing')) {
					group.open = false;
					group.classList.remove('is-closing');
					children.style.maxHeight = '';
				}
			});
		});

		document.querySelectorAll('.category-child').forEach((link) => {
			link.addEventListener('click', (event) => {
				event.preventDefault();
				filterProducts(link.dataset.filterCategory, link.dataset.filterSubcategory);
			});
		});

		document.querySelector('.category-all').addEventListener('click', (event) => {
			event.preventDefault();
			filterProducts('all');
		});
	}
});
