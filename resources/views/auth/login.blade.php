<!doctype html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Admin | Simmar Teknik Mandiri</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-[#d8e6e8] p-5">
	<main class="w-full max-w-md bg-white p-8 shadow-xl md:p-10">
		<a href="{{ route('home') }}" aria-label="Simmar Teknik Mandiri" class="block w-32 max-w-full"><img src="{{ asset('images/Logo-simmar.png') }}" alt="Simmar Teknik Mandiri" class="h-auto w-full object-contain"></a>
		<p class="eyebrow mt-12 text-moss">Area admin</p>
		<h1 class="mt-3 text-3xl font-semibold">Selamat datang kembali.</h1>
		<p class="mt-3 text-sm leading-6 text-[#68736d]">Kelola katalog water meter dan flow meter Anda di sini.</p>
		<form method="POST" action="{{ route('login.store') }}" class="mt-8 space-y-5">
			@csrf
			<div><label for="email" class="mb-2 block text-sm font-medium">Email</label><input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus class="field">@error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
			<div><label for="password" class="mb-2 block text-sm font-medium">Password</label><input id="password" name="password" type="password" required class="field">@error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror</div>
			<button class="w-full rounded-full bg-moss px-5 py-3 font-bold text-white transition hover:bg-ink">Masuk ke dashboard</button>
		</form>
	</main>
</body>
</html>
