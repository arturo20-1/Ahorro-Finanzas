<!DOCTYPE html><html class="h-full bg-slate-50" lang="es"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1" name="viewport">
<title>Panel de Administración | Finanzas SaaS</title>
<!-- Google Fonts: Plus Jakarta Sans -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
<!-- Tailwind CSS CDN con configuración de paleta personalizada -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                            950: '#022c22',
                        }
                    }
                }
            }
        }
    </script>
<style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="min-h-full bg-slate-50 text-slate-800 antialiased flex flex-col">
<!-- BARRA SUPERIOR (TOPBAR) -->
<header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200/80 shadow-xs">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<div class="flex items-center justify-between h-16 sm:h-20">
<!-- Logo & Modo Administrador -->
<div class="flex items-center gap-3 sm:gap-4">
<a class="flex items-center gap-2.5 group" href="{{ route('admin.dashboard') }}">
<div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-800 to-brand-600 flex items-center justify-center text-white font-extrabold text-xl shadow-md shadow-brand-800/20 group-hover:scale-105 transition-transform">
                            $
                        </div>
<div>
<span class="text-xl font-extrabold text-slate-900 tracking-tight block leading-tight">Finanzas</span>
<span class="text-[10px] text-brand-700 font-bold uppercase tracking-wider block">SaaS Platform</span>
</div>
</a>
<div class="h-6 w-px bg-slate-200 hidden sm:block"></div>
<!-- Badge Visual "Modo Administrador" -->
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-brand-50 border border-brand-200/70 text-brand-800 text-xs font-bold tracking-wide">
<span class="w-2 h-2 rounded-full bg-brand-500 animate-pulse"></span>
<span class="hidden xs:inline">Panel de Control</span> • Modo Administrador
                    </div>
</div>
<!-- Opciones de derecha: Enlace a sitio principal y perfil -->
<div class="flex items-center gap-3 sm:gap-5">
<!-- Enlace para volver al sitio principal -->
<a class="inline-flex items-center gap-2 text-xs sm:text-sm font-semibold text-slate-600 hover:text-brand-800 px-3 py-2 rounded-xl hover:bg-slate-100 transition-colors" href="{{ url('/') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M10 19l-7-7m0 0l7-7m-7 7h18" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
<span class="hidden sm:inline">Volver al sitio principal</span>
<span class="sm:hidden">Sitio</span>
</a>
<!-- Separador vertical -->
<div class="h-6 w-px bg-slate-200"></div>
<!-- Perfil Administrador -->
<div class="flex items-center gap-3">
<div class="relative">
<div class="w-9 h-9 rounded-xl bg-brand-100 border border-brand-200 text-brand-900 font-bold flex items-center justify-center text-xs shadow-xs">
                                AD
                            </div>
<span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 bg-brand-500 border-2 border-white rounded-full"></span>
</div>
<div class="hidden md:block text-left">
<p class="text-xs font-bold text-slate-900 leading-tight">Super Admin</p>
<p class="text-[10px] text-slate-400 font-medium">admin@finanzas.com</p>
</div>
</div>
</div>
</div>
</div>
</header>
<!-- CONTENEDOR PRINCIPAL -->
<main class="flex-1 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 space-y-8">
<!-- ENCABEZADO DE SECCIÓN -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-2 border-b border-slate-200/80">
<div>
<h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">Administración Global</h1>
<p class="text-sm text-slate-500 mt-1">Monitorea la actividad del ecosistema, métricas financieras y gestión de cuentas de usuario.</p>
</div>
<div class="flex items-center gap-2 self-start sm:self-auto">
<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white border border-slate-200 text-xs font-semibold text-slate-600 shadow-xs">
<svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
                    Sincronizado: <span class="font-bold text-slate-800">En tiempo real</span>
</span>
<button class="p-2 bg-white hover:bg-slate-100 border border-slate-200 text-slate-600 rounded-lg text-xs font-semibold shadow-xs transition-colors" onclick="window.location.reload();" title="Actualizar datos" type="button">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</button>
</div>
</div>
<!-- TARJETAS DE MÉTRICAS GLOBALES (KPIS) -->
<section aria-labelledby="metricas-globales">
<h2 class="sr-only" id="metricas-globales">Métricas Globales</h2>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
<!-- KPI 1: Usuarios Registrados -->
<div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="flex items-center justify-between mb-4">
<span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Usuarios Totales</span>
<div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center group-hover:bg-brand-600 group-hover:text-white transition-colors">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
<div>
<div class="text-3xl font-black text-slate-900 tracking-tight">14,820</div>
<div class="flex items-center gap-1.5 mt-2">
<span class="inline-flex items-center text-xs font-bold text-brand-600 bg-brand-50 px-2 py-0.5 rounded-md">
<svg class="w-3.5 h-3.5 mr-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
                                +12.4%
                            </span>
<span class="text-xs text-slate-400 font-medium">vs. mes anterior</span>
</div>
</div>
</div>
<!-- KPI 2: Volumen Total de Transacciones -->
<div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="flex items-center justify-between mb-4">
<span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Volumen Transaccionado</span>
<div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center group-hover:bg-brand-600 group-hover:text-white transition-colors">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
<div>
<div class="text-3xl font-black text-slate-900 tracking-tight">$3.42M <span class="text-sm font-semibold text-slate-400">USD</span></div>
<div class="flex items-center gap-1.5 mt-2">
<span class="inline-flex items-center text-xs font-bold text-brand-600 bg-brand-50 px-2 py-0.5 rounded-md">
<svg class="w-3.5 h-3.5 mr-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
                                +18.2%
                            </span>
<span class="text-xs text-slate-400 font-medium">procesado este año</span>
</div>
</div>
</div>
<!-- KPI 3: Cuentas Bancarias Vinculadas -->
<div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="flex items-center justify-between mb-4">
<span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Cuentas Bancarias</span>
<div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center group-hover:bg-brand-600 group-hover:text-white transition-colors">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
<div>
<div class="text-3xl font-black text-slate-900 tracking-tight">8,945</div>
<div class="flex items-center gap-1.5 mt-2">
<span class="inline-flex items-center text-xs font-bold text-brand-700 bg-brand-50 px-2 py-0.5 rounded-md">
                                99.4%
                            </span>
<span class="text-xs text-slate-400 font-medium">sincronización activa</span>
</div>
</div>
</div>
<!-- KPI 4: Metas de Ahorro Activas -->
<div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-xs hover:shadow-md transition-shadow relative overflow-hidden group">
<div class="flex items-center justify-between mb-4">
<span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Metas de Ahorro</span>
<div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-700 flex items-center justify-center group-hover:bg-brand-600 group-hover:text-white transition-colors">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
</div>
<div>
<div class="text-3xl font-black text-slate-900 tracking-tight">6,120</div>
<div class="flex items-center gap-1.5 mt-2">
<span class="inline-flex items-center text-xs font-bold text-brand-600 bg-brand-50 px-2 py-0.5 rounded-md">
<svg class="w-3.5 h-3.5 mr-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M5 10l7-7m0 0l7 7m-7-7v18" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
                                +8.7%
                            </span>
<span class="text-xs text-slate-400 font-medium">objetivos completados</span>
</div>
</div>
</div>
</div>
</section>
<!-- SECCIÓN: TABLA DE GESTIÓN DE USUARIOS -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-200/90 pb-3"><nav aria-label="Módulos del Sistema" class="flex items-center gap-2"><a class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-brand-800 text-white shadow-sm transition-all" href="#modulo-usuarios"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg><span>Gestión de Usuarios</span><span class="px-2 py-0.5 rounded-full bg-brand-900/40 text-brand-100 text-[10px] font-black">14,820</span></a><a class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 hover:text-slate-900 shadow-2xs transition-all" href="#modulo-categorias"><svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" stroke-linecap="round" stroke-linejoin="round"></path></svg><span>Gestión de Categorías Globales</span><span class="px-2 py-0.5 rounded-full bg-slate-100 text-slate-600 text-[10px] font-bold">18</span></a></nav><div class="flex items-center gap-2 text-xs text-slate-400 font-medium"><span class="w-2 h-2 rounded-full bg-brand-500"></span> Panel de Control Central</div></div><section aria-labelledby="titulo-usuarios" class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden" id="modulo-usuarios">
<!-- Barra Superior de la Tabla: Título, Filtros y Buscador -->
<div class="p-6 sm:p-7 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h2 class="text-lg sm:text-xl font-bold text-slate-900 tracking-tight" id="titulo-usuarios">Gestión de Usuarios</h2>
<p class="text-xs sm:text-sm text-slate-500 mt-0.5">Consulta, audita y administra el estado de los clientes en la plataforma.</p>
</div>
<!-- Barra de búsqueda y acciones -->
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
<!-- Formulario de Búsqueda -->
<form action="{{ route('admin.dashboard') }}" class="relative w-full sm:w-72" method="GET">
<div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</div>
<input class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600 transition-all placeholder:text-slate-400" name="search" placeholder="Buscar por ID, nombre o correo..." type="text" value="{{ request('search') }}">
</form>
<!-- Botón de Exportar / Filtrar -->
<div class="flex items-center gap-2">
<button class="inline-flex items-center justify-center gap-2 px-3.5 py-2 bg-white border border-slate-200 hover:bg-slate-50 text-slate-700 rounded-xl text-xs font-semibold shadow-xs transition-colors" type="button">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
<span>Filtros</span>
</button>
</div>
</div>
</div>
<!-- Tabla Moderna de Usuarios -->
<div class="overflow-x-auto">

                        
                        {{-- Ejemplo de renderizado con Blade. Si tienes la variable $users activa, itérala con @forelse: --}}
                        {{-- @forelse ($users ?? [] as $user) ... @empty ... @endforelse --}}

                        <table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50/75 border-b border-slate-200/80 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
<th class="py-3.5 px-6" scope="col">ID &amp; Nombre de Usuario</th>
<th class="py-3.5 px-6" scope="col">Correo Electrónico</th>
<th class="py-3.5 px-6" scope="col">Fecha de Registro</th>
<th class="py-3.5 px-6 text-center" scope="col">Estado</th>
<th class="py-3.5 px-6 text-right" scope="col">Acciones</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-sm"><!-- Fila 1: Arturo Gómez (Activo) -->
<tr class="hover:bg-slate-50/70 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-800 font-bold flex items-center justify-center text-xs shrink-0">
                                        AG
                                    </div>
<div>
<p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Arturo Gómez</p>
<span class="font-mono text-xs text-slate-400">#USR-8942</span>
</div>
</div>
</td>
<td class="py-4 px-6 text-slate-600 font-medium">
                                arturo.gomez@empresa.com
                            </td>
<td class="py-4 px-6 text-slate-500 text-xs font-medium">
                                14 Octubre, 2024
                            </td>
<td class="py-4 px-6 text-center">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60">
<span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>
                                    Activo
                                </span>
</td>
<td class="py-4 px-6 text-right">
<a class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors shadow-2xs" href="{{ url('/admin/users/8942') }}">
                                    Gestionar
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-brand-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</a>
</td>
</tr>
<!-- Fila 2: Elena Morales (Activa) -->
<tr class="hover:bg-slate-50/70 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 font-bold flex items-center justify-center text-xs shrink-0">
                                        EM
                                    </div>
<div>
<p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Elena Morales V.</p>
<span class="font-mono text-xs text-slate-400">#USR-8941</span>
</div>
</div>
</td>
<td class="py-4 px-6 text-slate-600 font-medium">
                                elena.morales@finanzas.co
                            </td>
<td class="py-4 px-6 text-slate-500 text-xs font-medium">
                                12 Octubre, 2024
                            </td>
<td class="py-4 px-6 text-center">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60">
<span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>
                                    Activo
                                </span>
</td>
<td class="py-4 px-6 text-right">
<a class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors shadow-2xs" href="{{ url('/admin/users/8941') }}">
                                    Gestionar
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-brand-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</a>
</td>
</tr>
<!-- Fila 3: Carlos Méndez (Suspendido) -->
<tr class="hover:bg-slate-50/70 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-800 font-bold flex items-center justify-center text-xs shrink-0">
                                        CM
                                    </div>
<div>
<p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Carlos Méndez</p>
<span class="font-mono text-xs text-slate-400">#USR-8938</span>
</div>
</div>
</td>
<td class="py-4 px-6 text-slate-600 font-medium">
                                carlos.mendez@outlook.com
                            </td>
<td class="py-4 px-6 text-slate-500 text-xs font-medium">
                                28 Septiembre, 2024
                            </td>
<td class="py-4 px-6 text-center">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200/60">
<span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    Suspendido
                                </span>
</td>
<td class="py-4 px-6 text-right">
<a class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors shadow-2xs" href="{{ url('/admin/users/8938') }}">
                                    Gestionar
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-brand-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</a>
</td>
</tr>
<!-- Fila 4: Mariana Silva (Activo) -->
<tr class="hover:bg-slate-50/70 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-800 font-bold flex items-center justify-center text-xs shrink-0">
                                        MS
                                    </div>
<div>
<p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Mariana Silva R.</p>
<span class="font-mono text-xs text-slate-400">#USR-8935</span>
</div>
</div>
</td>
<td class="py-4 px-6 text-slate-600 font-medium">
                                mariana.silva@icloud.com
                            </td>
<td class="py-4 px-6 text-slate-500 text-xs font-medium">
                                25 Septiembre, 2024
                            </td>
<td class="py-4 px-6 text-center">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60">
<span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>
                                    Activo
                                </span>
</td>
<td class="py-4 px-6 text-right">
<a class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors shadow-2xs" href="{{ url('/admin/users/8935') }}">
                                    Gestionar
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-brand-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</a>
</td>
</tr>
<!-- Fila 5: Roberto Domínguez (Suspendido) -->
<tr class="hover:bg-slate-50/70 transition-colors group">
<td class="py-4 px-6">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-rose-100 text-rose-800 font-bold flex items-center justify-center text-xs shrink-0">
                                        RD
                                    </div>
<div>
<p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Roberto Domínguez</p>
<span class="font-mono text-xs text-slate-400">#USR-8930</span>
</div>
</div>
</td>
<td class="py-4 px-6 text-slate-600 font-medium">
                                r.dominguez@corp.mx
                            </td>
<td class="py-4 px-6 text-slate-500 text-xs font-medium">
                                18 Septiembre, 2024
                            </td>
<td class="py-4 px-6 text-center">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200/60">
<span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>
                                    Suspendido
                                </span>
</td>
<td class="py-4 px-6 text-right">
<a class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors shadow-2xs" href="{{ url('/admin/users/8930') }}">
                                    Gestionar
                                    <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-brand-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
<path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round"></path>
</svg>
</a>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Paginación de la Tabla -->
<div class="p-4 sm:p-5 border-t border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4">
<span class="text-xs text-slate-500">
                    Mostrando <span class="font-bold text-slate-700">1 - 5</span> de <span class="font-bold text-slate-700">14,820</span> usuarios registrados
                </span>
<div class="flex items-center gap-1.5">
<button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-400 cursor-not-allowed" disabled="" type="button">
                        Anterior
                    </button>
<button class="px-3 py-1.5 rounded-lg border border-brand-600 bg-brand-800 text-xs font-bold text-white shadow-2xs" type="button">
                        1
                    </button>
<button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-xs font-semibold text-slate-700" type="button">
                        2
                    </button>
<button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-xs font-semibold text-slate-700" type="button">
                        3
                    </button>
<span class="px-2 text-xs text-slate-400">...</span>
<button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-xs font-semibold text-slate-700" type="button">
                        2,964
                    </button>
<button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-xs font-semibold text-slate-700" type="button">
                        Siguiente
                    </button>
</div>
</div>
</section><section aria-labelledby="titulo-categorias" class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden mt-8" id="modulo-categorias"><div class="p-6 sm:p-7 border-b border-slate-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4"><div><div class="flex items-center gap-2.5 flex-wrap"><h2 class="text-lg sm:text-xl font-bold text-slate-900 tracking-tight" id="titulo-categorias">Gestión de Categorías Financieras</h2><div class="flex items-center gap-1.5"><span class="inline-flex items-center px-2 py-0.5 rounded-md bg-brand-50 text-brand-700 text-[11px] font-bold border border-brand-200/60">18 activas</span><span class="inline-flex items-center px-2 py-0.5 rounded-md bg-rose-50 text-rose-700 text-[11px] font-bold border border-rose-200/60">12 gastos</span><span class="inline-flex items-center px-2 py-0.5 rounded-md bg-emerald-100 text-emerald-800 text-[11px] font-bold">6 ingresos</span></div></div><p class="text-xs sm:text-sm text-slate-500 mt-1">Clasifica y controla las reglas de transacciones, presupuestos límite y reportes fiscales del sistema.</p></div><div class="flex flex-wrap items-center gap-2.5"><div class="inline-flex rounded-xl p-1 bg-slate-100 border border-slate-200 text-xs font-semibold"><button class="px-3 py-1.5 rounded-lg bg-white text-slate-800 font-bold shadow-2xs" type="button">Todas (18)</button><button class="px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition-colors" type="button">Gastos (12)</button><button class="px-3 py-1.5 rounded-lg text-slate-600 hover:text-slate-900 transition-colors" type="button">Ingresos (6)</button></div><button class="inline-flex items-center gap-2 px-4 py-2 bg-brand-600 hover:bg-brand-700 text-white rounded-xl text-xs sm:text-sm font-bold shadow-xs hover:shadow-md transition-all" onclick="document.getElementById('form-nueva-categoria').classList.toggle('hidden')" type="button"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4v16m8-8H4" stroke-linecap="round" stroke-linejoin="round"></path></svg><span>Nueva Categoría</span></button></div></div><div class="hidden bg-slate-50/70 border-b border-slate-200 p-6 transition-all" id="form-nueva-categoria"><form action="{{ route('admin.categories.store') }}" class="space-y-4" method="POST"><div class="flex items-center justify-between pb-2 border-b border-slate-200/70"><div class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-brand-600"></span><h3 class="text-sm font-bold text-slate-900">Crear Nueva Categoría Global</h3></div><button class="text-slate-400 hover:text-slate-600 text-xs font-semibold" onclick="document.getElementById('form-nueva-categoria').classList.add('hidden')" type="button">✕ Cancelar</button></div><div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5"><div class="lg:col-span-2"><label class="block text-xs font-bold text-slate-700 mb-1">Nombre de Categoría</label><input class="w-full px-3.5 py-2 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600" name="category_name" placeholder="Ej. Suscripciones de Software" type="text"></div><div><label class="block text-xs font-bold text-slate-700 mb-1">Tipo de Flujo</label><select class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600" name="type"><option value="expense">Gasto (Salida)</option><option value="income">Ingreso (Entrada)</option></select></div><div><label class="block text-xs font-bold text-slate-700 mb-1">Límite Mensual Sugerido</label><input class="w-full px-3 py-2 bg-white border border-slate-200 rounded-xl text-xs sm:text-sm text-slate-800 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500/20 focus:border-brand-600" name="monthly_budget" placeholder="Ej. 500 USD" type="number"></div><div class="flex items-end"><button class="w-full inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-brand-800 hover:bg-brand-900 text-white rounded-xl text-xs sm:text-sm font-bold shadow-xs transition-colors" type="button">Guardar Categoría</button></div></div></form></div><div class="overflow-x-auto"><table class="w-full text-left border-collapse"><thead><tr class="bg-slate-50/75 border-b border-slate-200/80 text-[11px] font-bold text-slate-400 uppercase tracking-wider"><th class="py-3.5 px-6" scope="col">Categoría &amp; Identificador</th><th class="py-3.5 px-6" scope="col">Tipo de Operación</th><th class="py-3.5 px-6" scope="col">Transacciones</th><th class="py-3.5 px-6" scope="col">Límite Sugerido / Estimado</th><th class="py-3.5 px-6 text-center" scope="col">Estado</th><th class="py-3.5 px-6 text-right" scope="col">Acciones</th></tr></thead><tbody class="divide-y divide-slate-100 text-sm"><tr class="hover:bg-slate-50/70 transition-colors group"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-800 flex items-center justify-center text-lg shrink-0 shadow-2xs">🥗</div><div><p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Alimentación &amp; Supermercado</p><span class="font-mono text-xs text-slate-400">CAT-ALIM-01 • Gastos Esenciales</span></div></div></td><td class="py-4 px-6"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200/60"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Gasto</span></td><td class="py-4 px-6 text-slate-700 font-semibold">4,821 <span class="text-xs text-slate-400 font-normal">txs</span></td><td class="py-4 px-6 text-slate-900 font-bold">$650.00 <span class="text-xs text-slate-400 font-medium">/ mes prom.</span></td><td class="py-4 px-6 text-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Activo</span></td><td class="py-4 px-6 text-right"><div class="inline-flex items-center gap-1.5"><button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors" type="button">Editar</button><button class="p-1.5 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100" type="button"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button></div></td></tr><tr class="hover:bg-slate-50/70 transition-colors group"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-800 flex items-center justify-center text-lg shrink-0 shadow-2xs">💼</div><div><p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Nómina &amp; Sueldos Fijos</p><span class="font-mono text-xs text-slate-400">CAT-NOM-02 • Flujos Recurrentes</span></div></div></td><td class="py-4 px-6"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Ingreso</span></td><td class="py-4 px-6 text-slate-700 font-semibold">3,105 <span class="text-xs text-slate-400 font-normal">txs</span></td><td class="py-4 px-6 text-slate-900 font-bold">$3,200.00 <span class="text-xs text-slate-400 font-medium">/ mes prom.</span></td><td class="py-4 px-6 text-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Activo</span></td><td class="py-4 px-6 text-right"><div class="inline-flex items-center gap-1.5"><button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors" type="button">Editar</button><button class="p-1.5 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100" type="button"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button></div></td></tr><tr class="hover:bg-slate-50/70 transition-colors group"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center text-lg shrink-0 shadow-2xs">🏠</div><div><p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Vivienda, Alquiler &amp; Servicios</p><span class="font-mono text-xs text-slate-400">CAT-VIV-03 • Servicios Básicos</span></div></div></td><td class="py-4 px-6"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200/60"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Gasto</span></td><td class="py-4 px-6 text-slate-700 font-semibold">2,430 <span class="text-xs text-slate-400 font-normal">txs</span></td><td class="py-4 px-6 text-slate-900 font-bold">$1,100.00 <span class="text-xs text-slate-400 font-medium">/ mes prom.</span></td><td class="py-4 px-6 text-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Activo</span></td><td class="py-4 px-6 text-right"><div class="inline-flex items-center gap-1.5"><button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors" type="button">Editar</button><button class="p-1.5 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100" type="button"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button></div></td></tr><tr class="hover:bg-slate-50/70 transition-colors group"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-brand-100 text-brand-800 flex items-center justify-center text-lg shrink-0 shadow-2xs">💻</div><div><p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Freelance &amp; Consultorías</p><span class="font-mono text-xs text-slate-400">CAT-FRL-04 • Facturación Variable</span></div></div></td><td class="py-4 px-6"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Ingreso</span></td><td class="py-4 px-6 text-slate-700 font-semibold">1,240 <span class="text-xs text-slate-400 font-normal">txs</span></td><td class="py-4 px-6 text-slate-900 font-bold">$1,850.00 <span class="text-xs text-slate-400 font-medium">/ mes prom.</span></td><td class="py-4 px-6 text-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Activo</span></td><td class="py-4 px-6 text-right"><div class="inline-flex items-center gap-1.5"><button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors" type="button">Editar</button><button class="p-1.5 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100" type="button"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button></div></td></tr><tr class="hover:bg-slate-50/70 transition-colors group"><td class="py-4 px-6"><div class="flex items-center gap-3"><div class="w-10 h-10 rounded-xl bg-slate-100 text-slate-800 flex items-center justify-center text-lg shrink-0 shadow-2xs">🚗</div><div><p class="font-bold text-slate-900 group-hover:text-brand-800 transition-colors">Transporte &amp; Movilidad</p><span class="font-mono text-xs text-slate-400">CAT-TRN-05 • Combustible y Viajes</span></div></div></td><td class="py-4 px-6"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-rose-50 text-rose-700 border border-rose-200/60"><span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span>Gasto</span></td><td class="py-4 px-6 text-slate-700 font-semibold">1,940 <span class="text-xs text-slate-400 font-normal">txs</span></td><td class="py-4 px-6 text-slate-900 font-bold">$380.00 <span class="text-xs text-slate-400 font-medium">/ mes prom.</span></td><td class="py-4 px-6 text-center"><span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-bold bg-brand-50 text-brand-700 border border-brand-200/60"><span class="w-1.5 h-1.5 rounded-full bg-brand-600"></span>Activo</span></td><td class="py-4 px-6 text-right"><div class="inline-flex items-center gap-1.5"><button class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-slate-50 hover:bg-brand-50 text-slate-700 hover:text-brand-800 text-xs font-bold border border-slate-200/90 transition-colors" type="button">Editar</button><button class="p-1.5 rounded-xl text-slate-400 hover:text-slate-600 hover:bg-slate-100" type="button"><svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg></button></div></td></tr></tbody></table></div><div class="p-4 sm:p-5 border-t border-slate-100 bg-slate-50/50 flex flex-col sm:flex-row items-center justify-between gap-4"><span class="text-xs text-slate-500">Mostrando <span class="font-bold text-slate-700">1 - 5</span> de <span class="font-bold text-slate-700">18</span> categorías configuradas</span><div class="flex items-center gap-1.5"><button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white text-xs font-semibold text-slate-400 cursor-not-allowed" disabled="" type="button">Anterior</button><button class="px-3 py-1.5 rounded-lg border border-brand-600 bg-brand-800 text-xs font-bold text-white shadow-2xs" type="button">1</button><button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-xs font-semibold text-slate-700" type="button">2</button><button class="px-3 py-1.5 rounded-lg border border-slate-200 bg-white hover:bg-slate-100 text-xs font-semibold text-slate-700" type="button">Siguiente</button></div></div></section>
</main>
<!-- FOOTER DEL PANEL DE ADMINISTRACIÓN -->
<footer class="mt-auto border-t border-slate-200 bg-white py-6">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
<div class="flex items-center gap-2">
<span class="font-extrabold text-slate-900">Finanzas</span>
<span>• SaaS Admin Suite v2.4</span>
</div>
<div class="flex items-center gap-6">
<span>Auditoría SOC2 Tipo II</span>
<span>Cifrado Bancario AES-256</span>
<span class="text-slate-400">© {{ date('Y') }} Finanzas Inc.</span>
</div>
</div>
</footer>


</body></html>