<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Acceso administrador | Finanzas &amp; Ahorro</title>
<link href="{{ asset('images/logo.png') }}" rel="icon" type="image/png">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-emerald-50 flex items-center justify-center p-6 font-sans text-slate-800">
<main class="w-full max-w-md bg-white rounded-2xl shadow-lg border border-emerald-100 p-8">
<div class="flex items-center gap-3 mb-6">
<img alt="Logo" class="h-12 w-auto object-contain" src="{{ asset('images/logo.png') }}">
<div>
<h1 class="text-xl font-semibold">Acceso administrador</h1>
<p class="text-sm text-slate-500">Panel de gestión de categorías y clientes</p>
</div>
</div>

@if ($errors->any())
<div class="mb-5 rounded-xl bg-rose-50 border border-rose-200 text-rose-700 text-sm px-4 py-3 space-y-1">
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
</div>
@endif

<form action="{{ route('admin.login.store') }}" class="space-y-4" method="POST">
@csrf
<div>
<label class="block text-sm font-medium mb-1" for="email">Correo electrónico</label>
<input autocomplete="email" autofocus class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="email" name="email" required type="email" value="{{ old('email') }}">
</div>
<div>
<label class="block text-sm font-medium mb-1" for="password">Contraseña</label>
<input autocomplete="current-password" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-emerald-500" id="password" name="password" required type="password">
</div>
<button class="w-full rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 transition-colors" type="submit">Entrar al panel</button>
</form>

<p class="mt-6 text-center text-sm text-slate-500">
¿Eres cliente? <a class="text-emerald-700 font-medium hover:underline" href="{{ route('login') }}">Inicia sesión aquí</a>
</p>
</main>
</body>
</html>
