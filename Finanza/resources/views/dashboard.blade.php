@extends('layouts.app')

@section('title', 'Dashboard | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-space-xl">
<!-- 1. Cabecera Interior del Dashboard -->
<header class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-md mb-space-lg">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">¡Hola, {{ \Illuminate\Support\Str::before(auth()->user()->name, ' ') }}!</h1>
<span class="text-[28px] animate-bounce"></span>
</div>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
        Aquí está el balance y rendimiento financiero de tu patrimonio en tiempo real.
      </p>
</div>
<div class="flex flex-wrap items-center gap-space-sm">
<!-- Selector de Período -->
<div class="flex items-center bg-surface-container p-1 rounded-xl shadow-sm">
<button class="px-space-md py-1.5 font-label-md text-label-md rounded-lg bg-surface-container-lowest text-primary shadow-sm font-bold transition-all" type="button">
          Este Mes
        </button>
<button class="px-space-md py-1.5 font-label-md text-label-md rounded-lg text-on-surface-variant hover:text-on-surface transition-colors" type="button">
          Últimos 30 días
        </button>
<button class="px-space-md py-1.5 font-label-md text-label-md rounded-lg text-on-surface-variant hover:text-on-surface transition-colors" type="button">
          Este Año
        </button>
</div>
<!-- Acciones Rápidas -->
<div class="flex items-center gap-space-xs">
<button class="flex items-center gap-space-xs bg-surface-container-low hover:bg-surface-container text-on-surface px-space-md py-2 rounded-xl font-label-lg text-label-lg transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px] text-tertiary">flag</span>
<span class="">+ Nueva Meta</span>
</button>
<button class="flex items-center gap-space-xs bg-primary hover:bg-primary-container text-on-primary px-space-md py-2 rounded-xl font-label-lg text-label-lg transition-all shadow-[0_4px_16px_rgba(0,105,72,0.22)]" type="button">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span class="">Registrar Transacción</span>
</button>
</div>
</div>
</header>
<!-- 2. KPIs Superiores (4 Columnas) -->
<section class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-space-md mb-space-lg">
<!-- Tarjeta 1: Balance Total -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-primary/5 pointer-events-none"></div>
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Balance Total Disponible</span>
<div class="w-9 h-9 rounded-xl bg-secondary-container text-on-secondary-container flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">account_balance_wallet</span>
</div>
</div>
<div>
<div class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">$24,580.00 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></div>
<div class="flex items-center gap-space-xs mt-space-xs">
<span class="inline-flex items-center gap-0.5 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">trending_up</span> +12.4%
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">vs mes anterior</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-space-xs text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-primary">verified_user</span>
<span class="font-label-sm text-label-sm">3 cuentas sincronizadas</span>
</div>
</div>
<!-- Tarjeta 2: Ingresos del Mes -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Ingresos del Mes</span>
<div class="w-9 h-9 rounded-xl bg-primary-fixed text-on-primary-fixed flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">arrow_downward</span>
</div>
</div>
<div>
<div class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">$6,450.00 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></div>
<div class="flex items-center gap-space-xs mt-space-xs">
<span class="inline-flex items-center gap-0.5 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">north_east</span> +8.2%
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">vs mes anterior</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-space-xs text-on-surface-variant">
<span class="material-symbols-outlined text-[16px] text-primary">receipt_long</span>
<span class="font-label-sm text-label-sm">12 transacciones registradas</span>
</div>
</div>
<!-- Tarjeta 3: Gastos del Mes -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex flex-col justify-between group hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Gastos del Mes</span>
<div class="w-9 h-9 rounded-xl bg-error-container text-on-error-container flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">arrow_upward</span>
</div>
</div>
<div>
<div class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">$2,890.50 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></div>
<div class="flex items-center gap-space-xs mt-space-xs">
<span class="inline-flex items-center gap-0.5 px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">south</span> -3.1%
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">menos gasto vs abril</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center gap-space-xs text-secondary">
<span class="material-symbols-outlined text-[16px]">check_circle</span>
<span class="font-label-sm text-label-sm font-semibold">En control de presupuesto</span>
</div>
</div>
<!-- Tarjeta 4: Capacidad y Tasa de Ahorro -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex flex-col justify-between relative overflow-hidden group hover:shadow-md transition-shadow">
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Tasa de Ahorro</span>
<div class="w-9 h-9 rounded-xl bg-tertiary-fixed text-on-tertiary-fixed-variant flex items-center justify-center">
<span class="material-symbols-outlined text-[20px]">savings</span>
</div>
</div>
<div class="flex items-baseline justify-between">
<div>
<div class="font-headline-lg text-headline-lg text-tertiary font-extrabold tracking-tight">55.2%</div>
<p class="font-label-sm text-label-sm text-on-surface-variant mt-0.5">$3,559.50 disponibles p/ ahorro</p>
</div>
<!-- Progress Circular Radial Mini SVG -->
<div class="relative w-12 h-12 flex items-center justify-center">
<svg class="w-12 h-12 transform -rotate-90" viewBox="0 0 36 36">
<path class="text-surface-container-high" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-tertiary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="55.2, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<span class="material-symbols-outlined text-[16px] text-tertiary absolute">star</span>
</div>
</div>
<div class="mt-space-md pt-space-xs flex items-center justify-between">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
          Salud Excelente ✨
        </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Objetivo: 50%</span>
</div>
</div>
</section>
<!-- 3. Fila Central de Análisis Visual -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-lg">
<!-- Columna Izquierda: Gráfico Principal de Flujo de Dinero (7 cols) -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex flex-col justify-between">
<div>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-space-md">
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Flujo de Dinero: Ingresos vs. Gastos</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Comportamiento financiero consolidado durante el primer semestre</p>
</div>
<div class="flex items-center gap-space-sm">
<div class="flex items-center gap-space-xs text-label-sm font-label-sm">
<span class="w-2.5 h-2.5 rounded-full bg-primary"></span>
<span class="text-on-surface">Ingresos</span>
<span class="w-2.5 h-2.5 rounded-full bg-error ml-2"></span>
<span class="text-on-surface">Gastos</span>
</div>
</div>
</div>
<!-- Visual Chart SVG (High fidelity comparative double-column bar chart) -->
<div class="w-full h-64 relative mt-space-md">
<svg class="w-full h-full overflow-visible" preserveAspectRatio="none" viewBox="0 0 600 220">
<!-- Grid Lines -->
<line class="text-surface-container" stroke="currentColor" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="600" y1="20" y2="20"></line>
<line class="text-surface-container" stroke="currentColor" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="600" y1="70" y2="70"></line>
<line class="text-surface-container" stroke="currentColor" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="600" y1="120" y2="120"></line>
<line class="text-surface-container" stroke="currentColor" stroke-dasharray="4 4" stroke-width="1" x1="0" x2="600" y1="170" y2="170"></line>
<line class="text-surface-container-highest" stroke="currentColor" stroke-width="1.5" x1="0" x2="600" y1="195" y2="195"></line>
<!-- Month 1: Ene (Ingreso: 5200, Gasto: 2700) -->
<g class="transition-all hover:opacity-90">
<rect class="transition-all duration-300" fill="#006948" height="130" rx="4" width="22" x="35" y="65"></rect>
<rect fill="#ba1a1a" height="67" opacity="0.85" rx="4" width="22" x="62" y="128"></rect>
</g>
<!-- Month 2: Feb (Ingreso: 5600, Gasto: 3100) -->
<g class="transition-all hover:opacity-90">
<rect fill="#006948" height="140" rx="4" width="22" x="135" y="55"></rect>
<rect fill="#ba1a1a" height="77" opacity="0.85" rx="4" width="22" x="162" y="118"></rect>
</g>
<!-- Month 3: Mar (Ingreso: 5100, Gasto: 2900) -->
<g class="transition-all hover:opacity-90">
<rect fill="#006948" height="127" rx="4" width="22" x="235" y="68"></rect>
<rect fill="#ba1a1a" height="72" opacity="0.85" rx="4" width="22" x="262" y="123"></rect>
</g>
<!-- Month 4: Abr (Ingreso: 6100, Gasto: 3050) -->
<g class="transition-all hover:opacity-90">
<rect fill="#006948" height="153" rx="4" width="22" x="335" y="42"></rect>
<rect fill="#ba1a1a" height="76" opacity="0.85" rx="4" width="22" x="362" y="119"></rect>
</g>
<!-- Month 5: May (Ingreso: 6450, Gasto: 2890) - Destacado -->
<g class="transition-all hover:opacity-90">
<rect fill="#00855d" height="161" rx="4" width="22" x="435" y="34"></rect>
<rect fill="#ba1a1a" height="72" opacity="0.85" rx="4" width="22" x="462" y="123"></rect>
<!-- Indicator Badge -->
<circle cx="446" cy="24" fill="#8d4b00" r="4"></circle>
</g>
<!-- Month 6: Jun (Proyección Ingreso: 6800, Gasto: 2600) -->
<g class="transition-all hover:opacity-90">
<rect fill="#68dba9" height="170" rx="4" stroke-dasharray="3 3" width="22" x="535" y="25"></rect>
<rect fill="#ffdad6" height="65" rx="4" width="22" x="562" y="130"></rect>
</g>
</svg>
<!-- X Axis Labels -->
<div class="flex justify-between px-6 pt-2 font-label-md text-label-md text-on-surface-variant">
<span class="">Ene</span>
<span class="">Feb</span>
<span class="">Mar</span>
<span class="">Abr</span>
<span class="font-bold text-primary">May (Actual)</span>
<span class="italic text-on-surface-variant">Jun (Est.)</span>
</div>
</div>
</div>
<!-- Quick Metrics Footer -->
<div class="mt-space-md pt-space-md bg-surface-container-low rounded-xl p-space-md flex flex-col sm:flex-row items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-lowest flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[18px]">query_stats</span>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Promedio mensual de ahorro</div>
<div class="font-headline-sm text-headline-sm font-bold text-on-surface">$3,210.00 USD</div>
</div>
</div>
<div class="flex items-center gap-space-sm">
<div class="w-8 h-8 rounded-lg bg-surface-container-lowest flex items-center justify-center text-secondary shadow-sm">
<span class="material-symbols-outlined text-[18px]">calendar_today</span>
</div>
<div>
<div class="font-label-sm text-label-sm text-on-surface-variant">Gasto diario promedio</div>
<div class="font-headline-sm text-headline-sm font-bold text-on-surface">$96.35 USD</div>
</div>
</div>
</div>
</div>
<!-- Columna Derecha: Presupuestos Inteligentes & Metas (5 cols) -->
<div class="lg:col-span-5 flex flex-col gap-space-md">
<!-- Bloque A: Presupuestos Inteligentes -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
<div class="flex items-center justify-between mb-space-sm">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Presupuestos Inteligentes</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Monitoreo de consumo mensual</span>
</div>
<button class="text-primary hover:text-primary-container font-label-md text-label-md font-semibold" type="button">
            Configurar
          </button>
</div>
<div class="space-y-space-sm mt-space-sm">
<!-- Categoría 1: Vivienda (91% - Amarillo/Precaución) -->
<div class="space-y-1">
<div class="flex justify-between items-center font-label-md text-label-md">
<span class="text-on-surface font-semibold flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-tertiary"></span>
                Vivienda y Servicios
              </span>
<span class="text-on-surface-variant font-medium">$1,100 / <span class="text-on-surface">$1,200</span> <span class="text-tertiary font-bold ml-1">91%</span></span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container overflow-hidden">
<div class="h-full bg-tertiary rounded-full transition-all duration-500" style="width: 91%"></div>
</div>
</div>
<!-- Categoría 2: Alimentación (65% - Verde/Seguro) -->
<div class="space-y-1">
<div class="flex justify-between items-center font-label-md text-label-md">
<span class="text-on-surface font-semibold flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-primary"></span>
                Alimentación &amp; Supermercado
              </span>
<span class="text-on-surface-variant font-medium">$520 / <span class="text-on-surface">$800</span> <span class="text-primary font-bold ml-1">65%</span></span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container overflow-hidden">
<div class="h-full bg-primary rounded-full transition-all duration-500" style="width: 65%"></div>
</div>
</div>
<!-- Categoría 3: Ocio (102% - Excedido) -->
<div class="space-y-1">
<div class="flex justify-between items-center font-label-md text-label-md">
<span class="text-on-surface font-semibold flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-error"></span>
                Ocio &amp; Entretenimiento
              </span>
<span class="text-on-surface-variant font-medium">$410 / <span class="text-on-surface">$400</span> <span class="text-error font-bold ml-1">102% ⚠️</span></span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container overflow-hidden">
<div class="h-full bg-error rounded-full transition-all duration-500" style="width: 100%"></div>
</div>
</div>
<!-- Categoría 4: Transporte (60% - Verde) -->
<div class="space-y-1">
<div class="flex justify-between items-center font-label-md text-label-md">
<span class="text-on-surface font-semibold flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full bg-primary"></span>
                Transporte &amp; Movilidad
              </span>
<span class="text-on-surface-variant font-medium">$180 / <span class="text-on-surface">$300</span> <span class="text-primary font-bold ml-1">60%</span></span>
</div>
<div class="w-full h-2 rounded-full bg-surface-container overflow-hidden">
<div class="h-full bg-primary rounded-full transition-all duration-500" style="width: 60%"></div>
</div>
</div>
</div>
</div>
<!-- Bloque B: Metas de Ahorro Activas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm flex-1 flex flex-col justify-between">
<div class="flex items-center justify-between mb-space-sm">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Metas de Ahorro</h3>
<span class="inline-flex items-center gap-1 text-tertiary font-label-sm text-label-sm font-bold bg-tertiary-fixed px-2 py-0.5 rounded-full">
<span class="material-symbols-outlined text-[14px]">diamond</span> 2 En Curso
          </span>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<!-- Meta 1 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Fondo Emergencia</span>
<span class="font-label-sm text-label-sm bg-secondary-fixed text-on-secondary-fixed px-1.5 py-0.5 rounded">En camino</span>
</div>
<p class="font-headline-sm text-headline-sm font-extrabold text-primary">$7,800 <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">/ $10,000</span></p>
</div>
<div class="mt-space-sm">
<div class="w-full h-1.5 rounded-full bg-surface-container-highest overflow-hidden mb-1">
<div class="h-full bg-primary rounded-full" style="width: 78%"></div>
</div>
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant">
<span class="">78% completado</span>
<span class="">Faltan $2,200</span>
</div>
</div>
</div>
<!-- Meta 2 -->
<div class="bg-surface-container-low p-space-md rounded-xl flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-1">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Viaje a Japón</span>
<span class="font-label-sm text-label-sm bg-tertiary-fixed text-on-tertiary-fixed-variant px-1.5 py-0.5 rounded">Meta Agosto</span>
</div>
<p class="font-headline-sm text-headline-sm font-extrabold text-tertiary">$2,450 <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">/ $4,000</span></p>
</div>
<div class="mt-space-sm">
<div class="w-full h-1.5 rounded-full bg-surface-container-highest overflow-hidden mb-1">
<div class="h-full bg-tertiary rounded-full" style="width: 61%"></div>
</div>
<div class="flex justify-between font-label-sm text-label-sm text-on-surface-variant">
<span class="">61% completado</span>
<span class="">Faltan $1,550</span>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- 4. Sección Inferior: Tabla de Últimas Transacciones -->
<section class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-sm">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-md mb-space-md">
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Movimientos Recientes</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">Últimas operaciones financieras sincronizadas automáticamente</p>
</div>
<div class="flex flex-wrap items-center gap-space-xs">
<!-- Filtros Rápidos -->
<div class="flex bg-surface-container-low p-1 rounded-xl font-label-md text-label-md">
<button class="px-space-sm py-1 rounded-lg bg-surface-container-lowest text-on-surface font-bold shadow-sm" type="button">Todas</button>
<button class="px-space-sm py-1 rounded-lg text-on-surface-variant hover:text-on-surface" type="button">Ingresos</button>
<button class="px-space-sm py-1 rounded-lg text-on-surface-variant hover:text-on-surface" type="button">Gastos</button>
</div>
<button class="p-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface" type="button">
<span class="material-symbols-outlined text-[18px]">filter_list</span>
</button>
</div>
</div>
<!-- Contenedor Responsive Tabla -->
<div class="overflow-x-auto">
<table class="w-full text-left">
<thead>
<tr class="text-on-surface-variant font-label-md text-label-md uppercase tracking-wider bg-surface-container-low/60 rounded-xl">
<th class="py-3 px-4 rounded-l-xl">Concepto / Comercio</th>
<th class="py-3 px-4">Fecha</th>
<th class="py-3 px-4">Categoría</th>
<th class="py-3 px-4">Estado</th>
<th class="py-3 px-4 text-right rounded-r-xl">Monto (USD)</th>
</tr>
</thead>
<tbody class="divide-y divide-transparent">
<!-- Fila 1: Sueldo -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-on-secondary-container flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">work</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Sueldo Corporativo Tech Corp</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Depósito directo de nómina</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">28 May 2025</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                Nómina
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Completado
              </span>
</td>
<td class="py-3.5 px-4 text-right">
<span class="font-headline-sm text-headline-sm font-extrabold text-primary">+$4,800.00</span>
</td>
</tr>
<!-- Fila 2: Whole Foods -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container text-on-surface flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">shopping_cart</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Supermercado Whole Foods</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Tarjeta Débito Platinum ••4921</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">27 May 2025</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                Alimentación
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Completado
              </span>
</td>
<td class="py-3.5 px-4 text-right">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">-$142.30</span>
</td>
</tr>
<!-- Fila 3: Alquiler -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container text-on-surface flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">home</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Pago Alquiler Apartamento</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Transferencia ACH programada</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">25 May 2025</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                Vivienda
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Completado
              </span>
</td>
<td class="py-3.5 px-4 text-right">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">-$950.00</span>
</td>
</tr>
<!-- Fila 4: Freelance -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-on-secondary-container flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">laptop_mac</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Proyecto Consultoría Freelance</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Stripe Invoice #INV-8821</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">24 May 2025</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                Ingreso Extra
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Completado
              </span>
</td>
<td class="py-3.5 px-4 text-right">
<span class="font-headline-sm text-headline-sm font-extrabold text-primary">+$1,650.00</span>
</td>
</tr>
<!-- Fila 5: Restaurante -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container text-on-surface flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">restaurant</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Restaurante Bistro Gourmet</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cena fin de semana</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">22 May 2025</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                Ocio
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span> Completado
              </span>
</td>
<td class="py-3.5 px-4 text-right">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">-$78.50</span>
</td>
</tr>
<!-- Fila 6: SaaS Cloud (Pendiente) -->
<tr class="hover:bg-surface-container-low/50 transition-colors">
<td class="py-3.5 px-4">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-xl bg-surface-container text-on-surface flex items-center justify-center flex-shrink-0">
<span class="material-symbols-outlined text-[20px]">cloud_sync</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Suscripción SaaS Cloud</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Cobro recurrente mensual</span>
</div>
</div>
</td>
<td class="py-3.5 px-4 font-body-sm text-body-sm text-on-surface-variant">20 May 2025</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface font-label-sm text-label-sm font-semibold">
                Servicios
              </span>
</td>
<td class="py-3.5 px-4">
<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-label-sm font-bold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span> Pendiente
              </span>
</td>
<td class="py-3.5 px-4 text-right">
<span class="font-headline-sm text-headline-sm font-bold text-on-surface">-$29.99</span>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pie de Tabla & Enlace Completo -->
<div class="mt-space-md pt-space-sm flex flex-col sm:flex-row items-center justify-between gap-space-sm">
<div class="font-label-md text-label-md text-on-surface-variant">
        Mostrando 6 de 142 transacciones registradas este mes
      </div>
<a class="inline-flex items-center gap-1 font-label-lg text-label-lg font-bold text-primary hover:text-primary-container group transition-colors" href="#">
        Ver todas las transacciones
        <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
</div>
</section>
</div>
@endsection
