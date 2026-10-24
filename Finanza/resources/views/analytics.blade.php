@extends('layouts.app')

@section('title', 'Reportes &amp; An&aacute;lisis | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-16">
<!-- Active Sidebar Link Injector Script -->

<!-- Section 1: Breadcrumbs & Header -->
<header class="flex flex-col gap-space-md pt-space-md pb-space-lg">
<!-- Breadcrumb & System Status -->
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<a class="hover:text-primary transition-colors flex items-center gap-1" href="#">
<span class="material-symbols-outlined text-[16px]">grid_view</span>
          Dashboard
        </a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-on-surface font-label-lg text-label-lg font-semibold">Reportes &amp; Análisis</span>
</div>
<div class="inline-flex items-center gap-space-xs bg-surface-container px-space-md py-1 rounded-full shadow-sm">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-semibold tracking-wide">
          Motor Analítico &amp; Predictivo Activo • Sincronizado hace 3 min
        </span>
</div>
</div>
<!-- Title, Subtitle & Action Toolbar -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg">
<div class="flex flex-col gap-1 max-w-2xl">
<h1 class="font-display text-display text-on-surface tracking-tight">Reportes &amp; Análisis Financiero</h1>
<p class="font-body-md text-body-md text-on-surface-variant">
          Visualiza tendencias dinámicas, desglose exhaustivo de patrones de gasto e informes inteligentes del rendimiento de tu patrimonio.
        </p>
</div>
<!-- Action Buttons & Range Selector -->
<div class="flex flex-wrap items-center gap-space-sm">
<!-- Date Selector Pills -->
<div class="bg-surface-container-high p-1 rounded-xl flex items-center shadow-inner">
<button class="px-space-md py-1.5 rounded-lg font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" type="button">Este Mes</button>
<button class="px-space-md py-1.5 rounded-lg font-label-md text-label-md bg-surface-container-lowest text-primary font-bold shadow-[0_2px_8px_rgba(0,0,0,0.06)]" type="button">Último Trimestre</button>
<button class="px-space-md py-1.5 rounded-lg font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all" type="button">Año Actual</button>
<button class="px-space-sm py-1.5 rounded-lg font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-all flex items-center gap-0.5" type="button">
<span class="material-symbols-outlined text-[16px]">calendar_today</span>
</button>
</div>
<!-- Comparative Action Button -->
<button class="flex items-center gap-space-xs px-space-md py-2.5 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container-high font-label-lg text-label-lg transition-all shadow-[0_2px_6px_rgba(15,23,42,0.04)]" type="button">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">compare_arrows</span>
<span class="hidden sm:inline">Comparar con Período Anterior</span>
</button>
<!-- Primary Export Action -->
<div class="relative inline-block text-left">
<button class="flex items-center gap-space-xs px-space-lg py-2.5 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg transition-all shadow-[0_4px_16px_rgba(0,105,72,0.28)]" type="button">
<span class="material-symbols-outlined text-[20px]">download</span>
<span>Exportar Informe</span>
<span class="material-symbols-outlined text-[18px] -mr-1">keyboard_arrow_down</span>
</button>
</div>
</div>
</div>
</header>
<!-- Section 2: Four Key Analytics KPI Cards -->
<section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-space-lg mb-space-xl">
<!-- KPI 1: Patrimonio Neto Total -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between transition-all hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)]">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Patrimonio Neto Total</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">$24,580.00 <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">USD</span></span>
</div>
<div class="w-10 h-10 rounded-xl bg-secondary-container/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
</div>
</div>
<div class="mt-space-md pt-space-sm flex items-end justify-between">
<div class="flex flex-col gap-1">
<div class="inline-flex items-center gap-1 bg-secondary-fixed/50 text-on-secondary-fixed px-2 py-0.5 rounded-full font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">trending_up</span>
            +14.8% (6 meses)
          </div>
<span class="font-label-sm text-label-sm text-on-surface-variant">3 cuentas e inversiones activas</span>
</div>
<!-- Sparkline Vector -->
<svg class="w-20 h-9 overflow-visible text-primary" fill="none" viewbox="0 0 80 36">
<path d="M2 30 C 15 28, 25 34, 38 20 C 50 8, 62 14, 78 4" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
<circle cx="78" cy="4" fill="currentColor" r="3.5"></circle>
</svg>
</div>
</div>
<!-- KPI 2: Tasa Promedio de Ahorro -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between transition-all hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)]">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Tasa Promedio de Ahorro</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-extrabold tracking-tight">48.6%</span>
</div>
<div class="w-10 h-10 rounded-xl bg-tertiary-fixed/60 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">workspace_premium</span>
</div>
</div>
<div class="mt-space-md pt-space-sm flex items-end justify-between">
<div class="flex flex-col gap-1">
<div class="inline-flex items-center gap-1 bg-tertiary-fixed text-on-tertiary-fixed-variant px-2 py-0.5 rounded-full font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">star</span>
            +5.2% vs. meta (40%)
          </div>
<span class="font-label-sm text-label-sm text-on-surface-variant">$3,559.50 USD prom./mes</span>
</div>
<!-- Circular mini gauge -->
<div class="relative w-10 h-10 flex items-center justify-center">
<svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
<path class="text-surface-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="3.5"></path>
<path class="text-tertiary-container" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="48.6, 100" stroke-linecap="round" stroke-width="3.5"></path>
</svg>
<span class="absolute font-label-sm text-[10px] font-extrabold text-tertiary">49%</span>
</div>
</div>
</div>
<!-- KPI 3: Categoría de Mayor Gasto -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between transition-all hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)]">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-1">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider">Mayor Categoría de Egresos</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-extrabold tracking-tight truncate">Vivienda &amp; Servicios</span>
<span class="font-label-lg text-label-lg font-bold text-on-surface mt-0.5">$1,100.00 USD</span>
</div>
<div class="w-10 h-10 rounded-xl bg-surface-container flex items-center justify-center text-on-surface-variant">
<span class="material-symbols-outlined text-[22px]">real_estate_agent</span>
</div>
</div>
<div class="mt-space-md pt-space-sm flex flex-col gap-1">
<div class="flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">38.1% de egresos globales</span>
<span class="bg-surface-container px-2 py-0.5 rounded-full font-label-sm text-label-sm text-on-surface font-semibold">Bajo Control</span>
</div>
<div class="w-full bg-surface-container-high rounded-full h-1.5 mt-1">
<div class="bg-on-surface-variant rounded-full h-1.5" style="width: 38.1%"></div>
</div>
</div>
</div>
<!-- KPI 4: Proyección Cierre de Mes (IA) -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between transition-all hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)]">
<div class="flex items-start justify-between">
<div class="flex flex-col gap-1">
<div class="flex items-center gap-1.5">
<span class="font-label-sm text-label-sm text-primary font-bold uppercase tracking-wider">Proyección Cierre (IA)</span>
<span class="flex h-1.5 w-1.5 rounded-full bg-primary"></span>
</div>
<span class="font-headline-lg text-headline-lg text-primary font-extrabold tracking-tight">+$3,210.00 <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">USD</span></span>
</div>
<div class="w-10 h-10 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
</div>
</div>
<div class="mt-space-md pt-space-sm flex flex-col gap-1">
<div class="inline-flex items-center gap-1 bg-secondary-fixed/50 text-on-secondary-fixed px-2 py-0.5 rounded-full font-label-sm text-label-sm font-bold w-fit">
<span class="material-symbols-outlined text-[14px]">speed</span>
          7.2% ritmo más eficiente
        </div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Metas alcanzadas ~1.5 semanas antes</span>
</div>
</div>
</section>
<!-- Section 3: Charts & Analytical Core (2-Column Asymmetric Bento) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-space-lg mb-space-xl">
<!-- Left / Dominant Column: Historical Cashflow Trends (7 cols) -->
<div class="lg:col-span-7 bg-surface-container-lowest rounded-3xl p-space-lg md:p-space-xl shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-space-lg">
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Tendencia de Flujo Neto</h2>
<span class="font-body-sm text-body-sm text-on-surface-variant">Comparativa mensual de entradas versus salidas y superávit de capital</span>
</div>
<!-- Legend Badges -->
<div class="flex items-center gap-space-md">
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded-md bg-primary"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Ingresos</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded-md bg-error"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Gastos</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-3 h-3 rounded-md bg-secondary-fixed"></span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Ahorro</span>
</div>
</div>
</div>
<!-- Main Analytical Vector Chart -->
<div class="relative w-full h-72 flex flex-col justify-end pt-6">
<!-- Horizontal Grid Lines -->
<div class="absolute inset-0 flex flex-col justify-between pointer-events-none opacity-40">
<div class="w-full flex items-center justify-between text-on-surface-variant font-label-sm text-[10px]">
<span>$8,000</span>
<div class="w-[calc(100%-48px)] h-[1px] bg-surface-container-highest"></div>
</div>
<div class="w-full flex items-center justify-between text-on-surface-variant font-label-sm text-[10px]">
<span>$6,000</span>
<div class="w-[calc(100%-48px)] h-[1px] bg-surface-container-highest"></div>
</div>
<div class="w-full flex items-center justify-between text-on-surface-variant font-label-sm text-[10px]">
<span>$4,000</span>
<div class="w-[calc(100%-48px)] h-[1px] bg-surface-container-highest"></div>
</div>
<div class="w-full flex items-center justify-between text-on-surface-variant font-label-sm text-[10px]">
<span>$2,000</span>
<div class="w-[calc(100%-48px)] h-[1px] bg-surface-container-highest"></div>
</div>
<div class="w-full flex items-center justify-between text-on-surface-variant font-label-sm text-[10px]">
<span>$0</span>
<div class="w-[calc(100%-48px)] h-[1px] bg-surface-container-highest"></div>
</div>
</div>
<!-- Bars Area -->
<div class="relative z-10 w-full pl-12 pr-4 h-56 flex items-end justify-between gap-2 sm:gap-6">
<!-- Month 1: Ene -->
<div class="flex-1 flex flex-col items-center h-full justify-end group">
<div class="flex items-end gap-1.5 w-full justify-center h-full">
<!-- Income bar -->
<div class="w-3 sm:w-4 bg-primary rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 68%" title="Ingresos: $5,500"></div>
<!-- Expense bar -->
<div class="w-3 sm:w-4 bg-error/80 rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 38%" title="Gastos: $3,050"></div>
<!-- Savings bar -->
<div class="w-3 sm:w-4 bg-secondary-fixed rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 30%" title="Ahorro: $2,450"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-2 font-semibold">Ene</span>
</div>
<!-- Month 2: Feb -->
<div class="flex-1 flex flex-col items-center h-full justify-end group">
<div class="flex items-end gap-1.5 w-full justify-center h-full">
<div class="w-3 sm:w-4 bg-primary rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 72%" title="Ingresos: $5,800"></div>
<div class="w-3 sm:w-4 bg-error/80 rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 34%" title="Gastos: $2,700"></div>
<div class="w-3 sm:w-4 bg-secondary-fixed rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 38%" title="Ahorro: $3,100"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-2 font-semibold">Feb</span>
</div>
<!-- Month 3: Mar -->
<div class="flex-1 flex flex-col items-center h-full justify-end group">
<div class="flex items-end gap-1.5 w-full justify-center h-full">
<div class="w-3 sm:w-4 bg-primary rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 75%" title="Ingresos: $6,000"></div>
<div class="w-3 sm:w-4 bg-error/80 rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 42%" title="Gastos: $3,350"></div>
<div class="w-3 sm:w-4 bg-secondary-fixed rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 33%" title="Ahorro: $2,650"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-2 font-semibold">Mar</span>
</div>
<!-- Month 4: Abr -->
<div class="flex-1 flex flex-col items-center h-full justify-end group">
<div class="flex items-end gap-1.5 w-full justify-center h-full">
<div class="w-3 sm:w-4 bg-primary rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 79%" title="Ingresos: $6,350"></div>
<div class="w-3 sm:w-4 bg-error/80 rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 36%" title="Gastos: $2,880"></div>
<div class="w-3 sm:w-4 bg-secondary-fixed rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 43%" title="Ahorro: $3,470"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-2 font-semibold">Abr</span>
</div>
<!-- Month 5: May (Highlighted active) -->
<div class="flex-1 flex flex-col items-center h-full justify-end group relative">
<div class="absolute -top-6 bg-primary text-on-primary font-label-sm text-[10px] px-1.5 py-0.5 rounded-full font-bold shadow-md">
              Activo
            </div>
<div class="flex items-end gap-1.5 w-full justify-center h-full bg-surface-container-low/60 rounded-xl p-1">
<div class="w-3 sm:w-4 bg-primary rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 85%" title="Ingresos: $6,800"></div>
<div class="w-3 sm:w-4 bg-error/80 rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 35%" title="Gastos: $2,800"></div>
<div class="w-3 sm:w-4 bg-secondary-fixed rounded-t-lg transition-all group-hover:brightness-110 shadow-sm" style="height: 50%" title="Ahorro: $4,000"></div>
</div>
<span class="font-label-sm text-label-sm text-primary font-bold mt-2">May</span>
</div>
<!-- Month 6: Jun (Proyección) -->
<div class="flex-1 flex flex-col items-center h-full justify-end group opacity-75">
<div class="flex items-end gap-1.5 w-full justify-center h-full border-b-2 border-dashed border-primary">
<div class="w-3 sm:w-4 bg-primary/70 rounded-t-lg" style="height: 82%" title="Proyección Ingresos: $6,500"></div>
<div class="w-3 sm:w-4 bg-error/50 rounded-t-lg" style="height: 32%" title="Proyección Gastos: $2,600"></div>
<div class="w-3 sm:w-4 bg-secondary-fixed/70 rounded-t-lg" style="height: 50%" title="Proyección Ahorro: $3,900"></div>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant mt-2">Jun (Est.)</span>
</div>
</div>
</div>
<!-- Quick Metrics Ribbon at bottom -->
<div class="mt-space-lg pt-space-md bg-surface-container-low rounded-2xl p-space-md grid grid-cols-1 sm:grid-cols-3 gap-space-md">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Ingreso Promedio</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">$6,200.00 USD</span>
<span class="font-label-sm text-label-sm text-primary font-semibold flex items-center gap-0.5 mt-0.5">
<span class="material-symbols-outlined text-[14px]">north_east</span> +8.2% constante
          </span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Gasto Promedio</span>
<span class="font-headline-sm text-headline-sm text-on-surface font-bold tracking-tight">$2,950.00 USD</span>
<span class="font-label-sm text-label-sm text-on-surface-variant flex items-center gap-0.5 mt-0.5">
<span class="material-symbols-outlined text-[14px]">horizontal_rule</span> Rango optimizado
          </span>
</div>
<div class="flex flex-col">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase font-semibold">Ahorro Promedio</span>
<span class="font-headline-sm text-headline-sm text-primary font-bold tracking-tight">$3,250.00 USD</span>
<span class="font-label-sm text-label-sm text-primary font-semibold flex items-center gap-0.5 mt-0.5">
<span class="material-symbols-outlined text-[14px]">verified</span> 52.4% ratio mensual
          </span>
</div>
</div>
</div>
<!-- Right Column: Expense Category Breakdown Donut (5 cols) -->
<div class="lg:col-span-5 bg-surface-container-lowest rounded-3xl p-space-lg md:p-space-xl shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between">
<div class="flex items-center justify-between mb-space-md">
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Desglose por Categoría</h2>
<span class="font-body-sm text-body-sm text-on-surface-variant">Distribución del gasto en el último trimestre</span>
</div>
<button class="p-1 rounded-xl text-on-surface-variant hover:bg-surface-container-high transition-colors" type="button">
<span class="material-symbols-outlined text-[20px]">filter_list</span>
</button>
</div>
<!-- Donut Visual Component with SVG -->
<div class="flex flex-col sm:flex-row items-center justify-center gap-space-lg my-2">
<div class="relative w-44 h-44 flex items-center justify-center shrink-0">
<svg class="w-full h-full transform -rotate-90" viewbox="0 0 100 100">
<!-- Background Ring -->
<circle class="text-surface-container-low" cx="50" cy="50" fill="transparent" r="40" stroke="currentColor" stroke-width="12"></circle>
<!-- Segment 1: Vivienda 38.1% (Primary - Emerald) -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#006948" stroke-dasharray="95.7 251.3" stroke-dashoffset="0" stroke-width="12"></circle>
<!-- Segment 2: Alimentación 18% (Secondary - Teal) -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#2b6954" stroke-dasharray="45.2 251.3" stroke-dashoffset="-95.7" stroke-width="12"></circle>
<!-- Segment 3: Ocio 14.2% (Tertiary - Amber) -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#8d4b00" stroke-dasharray="35.7 251.3" stroke-dashoffset="-140.9" stroke-width="12"></circle>
<!-- Segment 4: Transporte 6.2% (Slate-surface) -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#6d7a72" stroke-dasharray="15.6 251.3" stroke-dashoffset="-176.6" stroke-width="12"></circle>
<!-- Segment 5: Educación 5.2% -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#00855d" stroke-dasharray="13.1 251.3" stroke-dashoffset="-192.2" stroke-width="12"></circle>
<!-- Segment 6: Suscripciones 5.2% -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#ffb77d" stroke-dasharray="13.1 251.3" stroke-dashoffset="-205.3" stroke-width="12"></circle>
<!-- Segment 7: Otros 13.1% -->
<circle cx="50" cy="50" fill="transparent" r="40" stroke="#bccac0" stroke-dasharray="32.9 251.3" stroke-dashoffset="-218.4" stroke-width="12"></circle>
</svg>
<!-- Inner Metric Badge -->
<div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
<span class="font-label-sm text-[10px] text-on-surface-variant uppercase tracking-wider">Total Gastado</span>
<span class="font-label-lg text-label-lg font-extrabold text-on-surface leading-tight">$2,890.50</span>
<span class="font-label-sm text-[9px] text-primary font-bold">USD / Mes</span>
</div>
</div>
<div class="flex flex-col gap-1 w-full max-w-[210px]">
<div class="p-2 rounded-xl bg-surface-container-low flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Mayor Peso:</span>
<span class="font-label-sm text-label-sm text-on-surface font-bold">Vivienda (38%)</span>
</div>
<div class="p-2 rounded-xl bg-surface-container-low flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Discrecional:</span>
<span class="font-label-sm text-label-sm text-primary font-bold">25.6% Total</span>
</div>
</div>
</div>
<!-- Category Detailed Legend List -->
<div class="flex flex-col gap-2 mt-space-sm max-h-56 overflow-y-auto pr-1">
<!-- Item 1 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-primary shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Vivienda &amp; Servicios</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">38.1%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$1,100.00</span>
</div>
</div>
<!-- Item 2 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-secondary shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Alimentación &amp; Supermercado</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">18.0%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$520.00</span>
</div>
</div>
<!-- Item 3 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-tertiary shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Ocio &amp; Entretenimiento</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">14.2%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$410.00</span>
</div>
</div>
<!-- Item 4 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-outline shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Transporte &amp; Movilidad</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">6.2%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$180.00</span>
</div>
</div>
<!-- Item 5 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-primary-container shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Educación &amp; Cursos</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">5.2%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$150.00</span>
</div>
</div>
<!-- Item 6 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-tertiary-fixed-dim shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Suscripciones Digitales</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">5.2%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$150.00</span>
</div>
</div>
<!-- Item 7 -->
<div class="flex items-center justify-between py-1.5 px-space-sm rounded-xl hover:bg-surface-container-low transition-colors">
<div class="flex items-center gap-space-sm min-w-0">
<span class="w-3 h-3 rounded-full bg-outline-variant shrink-0"></span>
<span class="font-label-md text-label-md text-on-surface font-semibold truncate">Otros Egresos</span>
</div>
<div class="flex items-center gap-space-md shrink-0">
<span class="font-label-sm text-label-sm text-on-surface-variant">13.1%</span>
<span class="font-label-md text-label-md font-bold text-on-surface">$380.50</span>
</div>
</div>
</div>
</div>
</div>
<!-- Section 4: AI Financial Intelligence & Consumer Behavior Patterns -->
<section class="bg-surface-container-lowest rounded-3xl p-space-lg md:p-space-xl shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] mb-space-xl relative overflow-hidden">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm mb-space-lg">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-2xl bg-secondary-container flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">psychology</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Diagnóstico y Patrones de Consumo por IA</h2>
<span class="inline-flex items-center gap-1 bg-primary text-on-primary font-label-sm text-[10px] px-2 py-0.5 rounded-full font-bold">
              Modelo Predictivo v2.4
            </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">Recomendaciones prescriptivas generadas en base a tu comportamiento bancario recurrente</p>
</div>
</div>
<button class="text-primary hover:text-primary-container font-label-lg text-label-lg font-bold flex items-center gap-1 w-fit" type="button">
<span>Configurar Reglas IA</span>
<span class="material-symbols-outlined text-[18px]">tune</span>
</button>
</div>
<!-- 3 Actionable AI Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-lg">
<!-- Insight 1: Alerta -->
<div class="bg-surface-container-low rounded-2xl p-space-lg flex flex-col justify-between transition-all hover:translate-y-[-2px] hover:shadow-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="bg-tertiary-fixed text-on-tertiary-fixed-variant px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">warning</span>
              Alerta Moderada
            </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Fin de Semana</span>
</div>
<h3 class="font-headline-sm text-[17px] leading-snug font-bold text-on-surface">Pico de Gasto en Ocio</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Tus salidas a restaurantes y ocio aumentaron un <strong class="text-tertiary font-semibold">+15%</strong> este último fin de semana respecto al promedio del mes anterior.
          </p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Impacto: +$84 USD</span>
<button class="text-tertiary font-label-sm text-label-sm font-bold hover:underline flex items-center gap-0.5" type="button">
            Fijar Tope Semanal <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</button>
</div>
</div>
<!-- Insight 2: Logro -->
<div class="bg-surface-container-low rounded-2xl p-space-lg flex flex-col justify-between transition-all hover:translate-y-[-2px] hover:shadow-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="bg-secondary-fixed text-on-secondary-fixed px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span>
              Logro Financiero
            </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Hogar</span>
</div>
<h3 class="font-headline-sm text-[17px] leading-snug font-bold text-on-surface">Eficiencia en Servicios Públicos</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Tu facturación en servicios domésticos disminuyó un <strong class="text-primary font-semibold">-8.4%</strong> gracias a la optimización energética aplicada durante mayo.
          </p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<span class="font-label-sm text-label-sm text-primary font-bold">Ahorro: $62.30 USD</span>
<span class="font-label-sm text-label-sm text-on-surface-variant font-medium">Meta cumplida</span>
</div>
</div>
<!-- Insight 3: Oportunidad de Inversión -->
<div class="bg-surface-container-low rounded-2xl p-space-lg flex flex-col justify-between transition-all hover:translate-y-[-2px] hover:shadow-md">
<div class="flex flex-col gap-space-sm">
<div class="flex items-center justify-between">
<span class="bg-secondary-container text-on-secondary-container px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">savings</span>
              Recomendación Proactiva
            </span>
<span class="font-label-sm text-label-sm text-primary font-bold">Inversión</span>
</div>
<h3 class="font-headline-sm text-[17px] leading-snug font-bold text-on-surface">Excedente Líquido no Asignado</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Tienes un saldo ocioso recurrente de <strong class="text-on-surface font-bold">~$400 USD</strong>. Transferirlo a Fondos Indexados de bajo coste generaría <strong class="text-primary font-semibold">~$32 USD/mes</strong> adicionales.
          </p>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant">Rendimiento est. 8.1%</span>
<button class="text-primary font-label-sm text-label-sm font-bold hover:underline flex items-center gap-0.5" type="button">
            Automatizar Traspaso <span class="material-symbols-outlined text-[14px]">arrow_forward</span>
</button>
</div>
</div>
</div>
</section>
<!-- Section 5: Historical Comparative Matrix (Last 6 Months Table) -->
<section class="bg-surface-container-lowest rounded-3xl p-space-lg md:p-space-xl shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col gap-space-md">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm">
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Matriz Comparativa Semestral</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Evolución detallada de entradas, salidas y capacidad de acumulación mes a mes.</p>
</div>
<div class="flex items-center gap-space-sm">
<button class="flex items-center gap-1 px-space-md py-1.5 rounded-xl bg-surface-container-low hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors" type="button">
<span class="material-symbols-outlined text-[18px]">table_view</span>
<span>Descargar en CSV</span>
</button>
<button class="p-1.5 rounded-xl bg-surface-container-low hover:bg-surface-container-high text-on-surface transition-colors" title="Imprimir informe" type="button">
<span class="material-symbols-outlined text-[18px]">print</span>
</button>
</div>
</div>
<!-- Data Table Container -->
<div class="w-full overflow-x-auto rounded-2xl bg-surface-container-low/40">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-surface-container-low text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-space-md px-space-lg font-bold">Mes</th>
<th class="py-space-md px-space-md font-bold">Ingresos Totales</th>
<th class="py-space-md px-space-md font-bold">Gastos Totales</th>
<th class="py-space-md px-space-md font-bold">Ahorro Neto</th>
<th class="py-space-md px-space-md font-bold">Tasa de Ahorro</th>
<th class="py-space-md px-space-md font-bold">Var. vs Mes Previo</th>
<th class="py-space-md px-space-lg font-bold text-right">Diagnóstico</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-high text-body-sm">
<!-- Row 1: Mayo 2025 (En Curso) -->
<tr class="hover:bg-surface-container-lowest transition-colors bg-surface-container-lowest/70">
<td class="py-space-md px-space-lg font-label-lg text-label-lg font-bold text-on-surface flex items-center gap-2">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
              Mayo 2025 <span class="bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-[10px] px-1.5 py-0.5 rounded-md font-semibold">En curso</span>
</td>
<td class="py-space-md px-space-md font-semibold text-on-surface">
<span class="px-2 py-0.5 rounded-md bg-secondary-fixed/30 text-primary font-bold">$6,800.00</span>
</td>
<td class="py-space-md px-space-md text-on-surface font-semibold">
              $2,800.00 <span class="text-primary font-label-sm text-[11px] font-bold">(-2.7%)</span>
</td>
<td class="py-space-md px-space-md font-extrabold text-primary">
              +$4,000.00 USD
            </td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<span class="font-bold text-on-surface text-[13px] w-9">58.8%</span>
<div class="w-20 bg-surface-container rounded-full h-1.5">
<div class="bg-primary rounded-full h-1.5" style="width: 58.8%"></div>
</div>
</div>
</td>
<td class="py-space-md px-space-md font-bold text-primary">
              +15.2%
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="inline-block bg-secondary-fixed text-on-secondary-fixed px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold">
                Excelente
              </span>
</td>
</tr>
<!-- Row 2: Abril 2025 -->
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="py-space-md px-space-lg font-label-lg text-label-lg font-semibold text-on-surface">
              Abril 2025
            </td>
<td class="py-space-md px-space-md font-semibold text-on-surface">
<span class="px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-semibold">$6,350.00</span>
</td>
<td class="py-space-md px-space-md text-on-surface">
              $2,880.00 <span class="text-primary font-label-sm text-[11px] font-bold">(-14.0%)</span>
</td>
<td class="py-space-md px-space-md font-bold text-primary">
              +$3,470.00 USD
            </td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<span class="font-bold text-on-surface text-[13px] w-9">54.6%</span>
<div class="w-20 bg-surface-container rounded-full h-1.5">
<div class="bg-primary rounded-full h-1.5" style="width: 54.6%"></div>
</div>
</div>
</td>
<td class="py-space-md px-space-md font-bold text-primary">
              +30.9%
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="inline-block bg-secondary-fixed text-on-secondary-fixed px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold">
                Superávit Alto
              </span>
</td>
</tr>
<!-- Row 3: Marzo 2025 -->
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="py-space-md px-space-lg font-label-lg text-label-lg font-semibold text-on-surface">
              Marzo 2025
            </td>
<td class="py-space-md px-space-md font-semibold text-on-surface">
<span class="px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-semibold">$6,000.00</span>
</td>
<td class="py-space-md px-space-md text-on-surface">
              $3,350.00 <span class="text-error font-label-sm text-[11px] font-bold">(+24.0%)</span>
</td>
<td class="py-space-md px-space-md font-bold text-on-surface">
              +$2,650.00 USD
            </td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<span class="font-bold text-on-surface text-[13px] w-9">44.1%</span>
<div class="w-20 bg-surface-container rounded-full h-1.5">
<div class="bg-primary/80 rounded-full h-1.5" style="width: 44.1%"></div>
</div>
</div>
</td>
<td class="py-space-md px-space-md font-bold text-error">
              -14.5%
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="inline-block bg-surface-container-high text-on-surface px-2.5 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                Controlado
              </span>
</td>
</tr>
<!-- Row 4: Febrero 2025 -->
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="py-space-md px-space-lg font-label-lg text-label-lg font-semibold text-on-surface">
              Febrero 2025
            </td>
<td class="py-space-md px-space-md font-semibold text-on-surface">
<span class="px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-semibold">$5,800.00</span>
</td>
<td class="py-space-md px-space-md text-on-surface">
              $2,700.00 <span class="text-primary font-label-sm text-[11px] font-bold">(-11.4%)</span>
</td>
<td class="py-space-md px-space-md font-bold text-primary">
              +$3,100.00 USD
            </td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<span class="font-bold text-on-surface text-[13px] w-9">53.4%</span>
<div class="w-20 bg-surface-container rounded-full h-1.5">
<div class="bg-primary rounded-full h-1.5" style="width: 53.4%"></div>
</div>
</div>
</td>
<td class="py-space-md px-space-md font-bold text-primary">
              +26.5%
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="inline-block bg-secondary-fixed text-on-secondary-fixed px-2.5 py-1 rounded-full font-label-sm text-label-sm font-bold">
                Óptimo
              </span>
</td>
</tr>
<!-- Row 5: Enero 2025 -->
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="py-space-md px-space-lg font-label-lg text-label-lg font-semibold text-on-surface">
              Enero 2025
            </td>
<td class="py-space-md px-space-md font-semibold text-on-surface">
<span class="px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-semibold">$5,500.00</span>
</td>
<td class="py-space-md px-space-md text-on-surface">
              $3,050.00 <span class="text-error font-label-sm text-[11px] font-bold">(+6.1%)</span>
</td>
<td class="py-space-md px-space-md font-bold text-on-surface">
              +$2,450.00 USD
            </td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<span class="font-bold text-on-surface text-[13px] w-9">44.5%</span>
<div class="w-20 bg-surface-container rounded-full h-1.5">
<div class="bg-primary/80 rounded-full h-1.5" style="width: 44.5%"></div>
</div>
</div>
</td>
<td class="py-space-md px-space-md font-bold text-error">
              -4.0%
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="inline-block bg-surface-container-high text-on-surface px-2.5 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                Estable
              </span>
</td>
</tr>
<!-- Row 6: Diciembre 2024 -->
<tr class="hover:bg-surface-container-lowest transition-colors">
<td class="py-space-md px-space-lg font-label-lg text-label-lg font-semibold text-on-surface">
              Diciembre 2024
            </td>
<td class="py-space-md px-space-md font-semibold text-on-surface">
<span class="px-2 py-0.5 rounded-md bg-surface-container text-on-surface font-semibold">$5,400.00</span>
</td>
<td class="py-space-md px-space-md text-on-surface">
              $2,850.00 <span class="text-on-surface-variant font-label-sm text-[11px]">(Base)</span>
</td>
<td class="py-space-md px-space-md font-bold text-on-surface">
              +$2,550.00 USD
            </td>
<td class="py-space-md px-space-md">
<div class="flex items-center gap-2">
<span class="font-bold text-on-surface text-[13px] w-9">47.2%</span>
<div class="w-20 bg-surface-container rounded-full h-1.5">
<div class="bg-primary/80 rounded-full h-1.5" style="width: 47.2%"></div>
</div>
</div>
</td>
<td class="py-space-md px-space-md font-semibold text-on-surface-variant">
              ---
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="inline-block bg-surface-container-high text-on-surface px-2.5 py-1 rounded-full font-label-sm text-label-sm font-semibold">
                Estable
              </span>
</td>
</tr>
</tbody>
<!-- Table Summary Footer -->
<tfoot class="bg-surface-container font-label-lg text-label-lg font-bold text-on-surface">
<tr>
<td class="py-space-md px-space-lg">
              Acumulado Semestre
            </td>
<td class="py-space-md px-space-md text-primary">
              $35,850.00 USD
            </td>
<td class="py-space-md px-space-md">
              $17,580.00 USD
            </td>
<td class="py-space-md px-space-md text-primary font-extrabold">
              +$18,270.00 USD
            </td>
<td class="py-space-md px-space-md">
              50.9% Promedio
            </td>
<td class="py-space-md px-space-md text-primary">
              +14.8% Crecimiento
            </td>
<td class="py-space-md px-space-lg text-right">
<span class="bg-primary text-on-primary px-3 py-1 rounded-full font-label-sm text-[11px] font-bold">
                Balance Superior
              </span>
</td>
</tr>
</tfoot>
</table>
</div>
<!-- Supplementary Informative Footnote -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between text-on-surface-variant font-label-sm text-label-sm gap-2 pt-2">
<span class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px] text-primary">lock</span>
        Datos protegidos bajo certificación SOC2 Tipo II con conciliación bancaria automatizada.
      </span>
<span>Cálculos auditados y ajustados por inflación subyacente de referencia.</span>
</div>
</section>
</div>
@endsection
