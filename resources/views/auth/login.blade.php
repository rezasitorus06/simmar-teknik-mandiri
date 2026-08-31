<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Admin | Simmar Teknik Mandiri</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-[#d8e6e8] p-5">
	<div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.65),transparent_40%)]"></div>
	<main class="relative w-full max-w-md rounded-[28px] border border-[#dfe5dc] bg-white/90 p-8 shadow-[0_24px_60px_rgba(23,35,31,0.08)] backdrop-blur-sm md:p-10">
		<a href="{{ route('home') }}" aria-label="Simmar Teknik Mandiri" class="block w-32 max-w-full"><img src="{{ asset('images/Logo-simmar.png') }}" alt="Simmar Teknik Mandiri" class="h-auto w-full object-contain"></a>
		<p class="eyebrow mt-12 text-moss">Area admin</p>
		<h1 class="mt-3 text-3xl font-semibold text-ink">Selamat datang kembali.</h1>
		<p class="mt-3 text-sm leading-6 text-[#68736d]">Kelola katalog water meter dan flow meter Anda di sini.</p>
		<form method="POST" action="{{ route('login.store') }}" class="mt-8 space-y-5">
			@csrf
			<div>
				<label for="email" class="mb-2 block text-sm font-medium text-ink">Email</label>
				<input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="field">
				@error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<div>
				<label for="password" class="mb-2 block text-sm font-medium text-ink">Password</label>
				<input id="password" name="password" type="password" required class="field">
				@error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
			</div>
			<button class="primary-cta w-full rounded-full px-5 py-3 text-sm font-bold">Masuk ke dashboard</button>
		</form>
	</main>
</body>
</html>
