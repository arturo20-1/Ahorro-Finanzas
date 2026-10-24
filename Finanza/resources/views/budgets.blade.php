@extends('layouts.app')

@section('title', 'Presupuestos Inteligentes | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-16">
<!-- Top Breadcrumb & Status Pill -->
<div class="flex items-center justify-between py-space-sm mb-space-xs">
<div class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant">
<span>Dashboard</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-primary font-bold">Presupuestos Inteligentes</span>
</div>
<div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container/60 text-on-secondary-container font-label-sm text-label-sm">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span>Motor Predictivo IA Activo • v2.4</span>
</div>
</div>
<!-- Header de Sección -->
<header class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md mb-space-lg">
<div class="flex flex-col max-w-2xl">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Presupuestos Inteligentes</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
        Asigna límites de gasto por categoría y mantén el control visual con nuestro sistema de alertas predictivas de IA.
      </p>
</div>
<div class="flex flex-wrap items-center gap-space-sm">
<!-- Selector de Período -->
<div class="relative inline-block">
<button class="flex items-center gap-space-xs bg-surface-container-lowest text-on-surface hover:bg-surface-container-low px-space-md py-2.5 rounded-xl font-label-lg text-label-lg shadow-sm transition-all" id="periodSelectorBtn">
<span class="material-symbols-outlined text-primary text-[20px]">calendar_month</span>
<span>Mayo 2025 (Mes en curso)</span>
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">expand_more</span>
</button>
</div>
<!-- Botón Secundario Reajuste IA -->
<button class="flex items-center gap-space-xs bg-surface-container-lowest hover:bg-surface-container text-on-surface px-space-md py-2.5 rounded-xl font-label-lg text-label-lg shadow-sm transition-all">
<span class="material-symbols-outlined text-tertiary text-[20px]">auto_fix_high</span>
<span class="hidden sm:inline">Reajuste Automático IA</span>
</button>
<!-- Botón Primario Crear Presupuesto -->
<button class="flex items-center gap-space-xs bg-primary hover:bg-primary-container text-on-primary px-space-lg py-2.5 rounded-xl font-label-lg text-label-lg shadow-md transition-all shadow-primary/20">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>Crear Presupuesto</span>
</button>
</div>
</header>
<!-- Resumen General del Mes (KPIs Superiores) -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-space-xl">
<!-- KPI 1 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-6 -top-6 w-24 h-24 rounded-full bg-primary/5 pointer-events-none"></div>
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Presupuesto Total Asignado</span>
<div class="w-10 h-10 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">account_balance_wallet</span>
</div>
</div>
<div class="font-display-mobile text-display-mobile text-on-surface font-extrabold tracking-tight">$3,500.00 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></div>
</div>
<div class="flex items-center gap-1.5 mt-space-md text-on-surface-variant font-body-sm text-body-sm">
<span class="material-symbols-outlined text-[16px] text-primary">pie_chart</span>
<span>Planificado para <strong>8 categorías activas</strong> • 24 días transcurridos</span>
</div>
</div>
<!-- KPI 2 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden">
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Consumido a la Fecha</span>
<span class="px-2.5 py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm">82.5% del global</span>
</div>
<div class="font-display-mobile text-display-mobile text-on-surface font-extrabold tracking-tight">$2,890.50 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></div>
</div>
<div class="mt-space-md flex flex-col gap-1.5">
<div class="flex justify-between items-center font-label-sm text-label-sm text-on-surface-variant">
<span>Ritmo actual: 77.4% tiempo transcurrido</span>
<span class="text-tertiary font-bold">+5.1% sobre ritmo</span>
</div>
<div class="w-full h-2.5 rounded-full bg-surface-container-high overflow-hidden">
<div class="h-full bg-gradient-to-r from-primary via-secondary to-tertiary-container rounded-full" style="width: 82.5%;"></div>
</div>
</div>
</div>
<!-- KPI 3 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden">
<div class="absolute -right-6 -bottom-6 w-28 h-28 rounded-full bg-secondary-fixed/30 pointer-events-none"></div>
<div>
<div class="flex items-center justify-between mb-space-md">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Monto Restante Disponible</span>
<span class="px-2.5 py-1 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm">En margen seguro (+17.5%)</span>
</div>
<div class="font-display-mobile text-display-mobile text-primary font-extrabold tracking-tight">$609.50 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></div>
</div>
<div class="flex items-center justify-between mt-space-md pt-space-xs bg-surface-container-low/70 px-space-sm py-1.5 rounded-xl">
<div class="flex items-center gap-1.5">
<span class="material-symbols-outlined text-[18px] text-primary">speed</span>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite sugerido últimos 7 días:</span>
</div>
<span class="font-label-md text-label-md text-primary font-bold">$87.07 / día</span>
</div>
</div>
</section>
<!-- Barra de Filtros, Búsqueda y Modos de Vista -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md mb-space-lg">
<!-- Filtros de Estado Pills -->
<div class="flex items-center gap-1.5 overflow-x-auto pb-1 md:pb-0" id="filterPillsContainer">
<button class="filter-pill active px-3.5 py-1.5 rounded-xl font-label-md text-label-md bg-primary text-on-primary shadow-sm transition-all" data-filter="all">
        Todas las Categorías (8)
      </button>
<button class="filter-pill px-3.5 py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container transition-all" data-filter="healthy">
<span class="inline-block w-2 h-2 rounded-full bg-primary mr-1.5"></span>Saludables (5)
      </button>
<button class="filter-pill px-3.5 py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container transition-all" data-filter="warning">
<span class="inline-block w-2 h-2 rounded-full bg-tertiary mr-1.5"></span>En Precaución (2)
      </button>
<button class="filter-pill px-3.5 py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-lowest text-on-surface-variant hover:bg-surface-container transition-all" data-filter="exceeded">
<span class="inline-block w-2 h-2 rounded-full bg-error mr-1.5"></span>Excedidas (1)
      </button>
</div>
<!-- Búsqueda y Switch de Vista -->
<div class="flex items-center gap-space-sm self-end md:self-auto w-full md:w-auto">
<div class="relative flex-1 md:w-64">
<span class="material-symbols-outlined absolute left-3 top-2.5 text-on-surface-variant text-[18px]">search</span>
<input class="w-full bg-surface-container-lowest pl-9 pr-3 py-2 rounded-xl font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20 shadow-sm" id="categorySearchInput" placeholder="Filtrar categoría..." type="text"/>
</div>
<div class="flex items-center bg-surface-container-lowest p-1 rounded-xl shadow-sm">
<button class="p-1.5 rounded-lg bg-surface-container text-primary" id="viewGridBtn" title="Vista Cuadrícula">
<span class="material-symbols-outlined text-[20px]">grid_view</span>
</button>
<button class="p-1.5 rounded-lg text-on-surface-variant hover:text-on-surface" id="viewListBtn" title="Vista Tabla Resumen">
<span class="material-symbols-outlined text-[20px]">table_rows</span>
</button>
</div>
</div>
</div>
<!-- Grid de Tarjetas de Presupuestos por Categoría -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-gutter mb-space-xl" id="budgetsGrid">
<!-- Categoría 1 [ROJO - Excedido] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="ocio entretenimiento" data-status="exceeded">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-error-container/70 flex items-center justify-center text-error">
<span class="material-symbols-outlined text-[26px]">confirmation_number</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Ocio &amp; Entretenimiento</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">warning</span> Límite Excedido (102.5%)
          </span>
<span class="font-label-sm text-label-sm text-error font-bold">+$10.00</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-error">$410.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $400.00 USD</span>
</div>
<!-- Barra de Progreso Excedida -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm relative">
<div class="h-full bg-error rounded-full relative" style="width: 100%;">
<span class="absolute right-0 top-0 bottom-0 w-2 bg-on-error opacity-60 animate-pulse"></span>
</div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-error-container/30 text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-error text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            Has superado el límite por <strong>$10.00</strong> debido a <em>'Restaurante Bistro Gourmet'</em>. Sugerimos pausar salidas el fin de semana.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-error hover:text-on-error-container font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>14 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Categoría 2 [AMARILLO - Precaución] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="vivienda servicios" data-status="warning">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-tertiary-fixed/60 flex items-center justify-center text-tertiary">
<span class="material-symbols-outlined text-[26px]">home_work</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Vivienda &amp; Servicios</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px]">bolt</span> Alerta 91.6% Consumido
          </span>
<span class="font-label-sm text-label-sm text-tertiary font-bold">$100.00 rest.</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-tertiary">$1,100.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $1,200.00 USD</span>
</div>
<!-- Barra de Progreso Precaución -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm">
<div class="h-full bg-tertiary-container rounded-full" style="width: 91.6%;"></div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-tertiary-fixed/30 text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-tertiary text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            Te quedan <strong>$100.00</strong> para los próximos 7 días del mes. Facturas fijas ya cubiertas en tu totalidad.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-tertiary hover:text-on-tertiary-fixed-variant font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>4 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Categoría 3 [AMARILLO/CUIDADO - En seguimiento] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="alimentacion supermercado" data-status="warning">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-secondary-container/70 flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined text-[26px]">shopping_cart</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Alimentación &amp; Supermercado</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">trending_up</span> 65.0% Consumido (Ritmo Moderado)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold">$280.00 rest.</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-on-surface">$520.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $800.00 USD</span>
</div>
<!-- Barra de Progreso Transición -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm">
<div class="h-full bg-gradient-to-r from-primary to-secondary rounded-full" style="width: 65%;"></div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            Dispones de $280.00 ($40.00/día). Si mantienes el ritmo actual proyectado, ahorrarás <strong>$65.00</strong>.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-primary hover:text-primary-container font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>22 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Categoría 4 [VERDE - Saludable] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="transporte movilidad" data-status="healthy">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[26px]">directions_subway</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Transporte &amp; Movilidad</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Óptimo (60.0%)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold">$120.00 rest.</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-primary">$180.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $300.00 USD</span>
</div>
<!-- Barra de Progreso Saludable -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm">
<div class="h-full bg-primary rounded-full" style="width: 60%;"></div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            Te quedan $120.00 disponibles. Consumo un <strong>15% menor</strong> comparado con el mismo período de abril.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-primary hover:text-primary-container font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>9 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Categoría 5 [VERDE - Saludable] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="salud bienestar" data-status="healthy">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[26px]">favorite</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Salud &amp; Bienestar</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Óptimo (37.5%)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold">$125.00 rest.</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-primary">$75.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $200.00 USD</span>
</div>
<!-- Barra de Progreso Saludable -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm">
<div class="h-full bg-primary rounded-full" style="width: 37.5%;"></div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            Gasto bajo control. Excelente holgura para imprevistos médicos menores o suplementos de farmacia.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-primary hover:text-primary-container font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>3 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Categoría 6 [VERDE - Saludable] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="educacion cursos" data-status="healthy">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[26px]">school</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Educación &amp; Cursos</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Óptimo (50.0%)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold">$150.00 rest.</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-primary">$150.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $300.00 USD</span>
</div>
<!-- Barra de Progreso Saludable -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm">
<div class="h-full bg-primary rounded-full" style="width: 50%;"></div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            Suscripción a plataformas formativas al día sin cargos adicionales previstos para la quincena.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-primary hover:text-primary-container font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>2 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Categoría 7 [VERDE - Saludable] -->
<div class="budget-card bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between hover:shadow-md transition-all group" data-name="suscripciones digitales software" data-status="healthy">
<div>
<div class="flex items-start justify-between gap-space-xs mb-space-md">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-xl bg-primary-fixed/40 flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[26px]">devices</span>
</div>
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold leading-tight">Suscripciones Digitales</h3>
<span class="font-label-sm text-label-sm text-on-surface-variant">Límite mensual</span>
</div>
</div>
</div>
<div class="flex items-center justify-between mb-space-xs">
<span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-secondary-fixed/50 text-on-secondary-fixed font-label-sm text-label-sm font-semibold">
<span class="material-symbols-outlined text-[14px]">lock</span> Fijo (75.0%)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold">$50.00 rest.</span>
</div>
<div class="flex items-baseline gap-1 my-space-xs">
<span class="font-headline-md text-headline-md font-extrabold text-primary">$150.00</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">/ $200.00 USD</span>
</div>
<!-- Barra de Progreso Saludable -->
<div class="w-full h-3 rounded-full bg-surface-container-high overflow-hidden my-space-sm">
<div class="h-full bg-primary rounded-full" style="width: 75%;"></div>
</div>
<!-- Alerta IA -->
<div class="p-space-sm rounded-xl bg-surface-container-low text-on-surface font-body-sm text-body-sm mt-space-md flex gap-2">
<span class="material-symbols-outlined text-primary text-[18px] shrink-0 mt-0.5">smart_toy</span>
<p class="leading-snug text-xs">
            3 servicios renovados automáticamente este mes. Próxima deducción programada el 2 de junio.
          </p>
</div>
</div>
<!-- Acciones -->
<div class="flex items-center justify-between pt-space-md mt-space-md border-t border-surface-container-high/60">
<button class="font-label-md text-label-md text-primary hover:text-primary-container font-bold flex items-center gap-1 transition-colors">
<span>Ajustar Límite</span>
<span class="material-symbols-outlined text-[16px]">tune</span>
</button>
<button class="font-label-md text-label-md text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-0.5">
<span>5 Movimientos</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
<!-- Tarjeta para Agregar Nueva Categoría -->
<div class="budget-card bg-surface-container-low/40 rounded-2xl p-space-lg flex flex-col items-center justify-center text-center hover:bg-surface-container-low hover:border-primary/40 transition-all cursor-pointer group min-h-[340px]" data-name="nueva categoria" data-status="all">
<div class="w-16 h-16 rounded-2xl bg-surface-container-lowest text-primary shadow-sm flex items-center justify-center mb-space-md group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-[32px]">add</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold mb-1">Añadir Nueva Categoría</h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-[200px] mb-space-lg leading-relaxed">
        Fija límites preventivos a tus gastos hormiga, vacaciones o compras especiales.
      </p>
<span class="inline-flex items-center gap-1 font-label-md text-label-md text-primary font-bold group-hover:underline">
        Comenzar configuración <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
</span>
</div>
</div>
<!-- Vista Alternativa en Tabla (Oculta por defecto para Toggle) -->
<div class="hidden bg-surface-container-lowest rounded-2xl shadow-sm p-space-lg mb-space-xl overflow-x-auto" id="budgetsTableContainer">
<table class="w-full text-left font-body-sm text-body-sm">
<thead>
<tr class="text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider border-b border-surface-container-high pb-space-sm">
<th class="py-space-sm px-space-md">Categoría</th>
<th class="py-space-sm px-space-md">Estado</th>
<th class="py-space-sm px-space-md">Consumo / Techo</th>
<th class="py-space-sm px-space-md">Progreso</th>
<th class="py-space-sm px-space-md">Restante</th>
<th class="py-space-sm px-space-md text-right">Acción</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-high/60">
<tr class="hover:bg-surface-container-low/50">
<td class="py-space-md px-space-md font-bold text-on-surface flex items-center gap-space-sm">
<span class="w-8 h-8 rounded-lg bg-error-container/60 text-error flex items-center justify-center material-symbols-outlined text-[18px]">confirmation_number</span>
            Ocio &amp; Entretenimiento
          </td>
<td class="py-space-md px-space-md"><span class="px-2 py-0.5 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-bold">Excedido (102.5%)</span></td>
<td class="py-space-md px-space-md font-semibold text-error">$410.00 / $400.00</td>
<td class="py-space-md px-space-md w-48">
<div class="w-full h-2 rounded-full bg-surface-container-high"><div class="h-full bg-error rounded-full" style="width: 100%;"></div></div>
</td>
<td class="py-space-md px-space-md text-error font-bold">-$10.00</td>
<td class="py-space-md px-space-md text-right"><button class="text-primary font-label-md font-bold hover:underline">Gestionar</button></td>
</tr>
<tr class="hover:bg-surface-container-low/50">
<td class="py-space-md px-space-md font-bold text-on-surface flex items-center gap-space-sm">
<span class="w-8 h-8 rounded-lg bg-tertiary-fixed/60 text-tertiary flex items-center justify-center material-symbols-outlined text-[18px]">home_work</span>
            Vivienda &amp; Servicios
          </td>
<td class="py-space-md px-space-md"><span class="px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-label-sm font-bold">Precaución (91.6%)</span></td>
<td class="py-space-md px-space-md font-semibold text-tertiary">$1,100.00 / $1,200.00</td>
<td class="py-space-md px-space-md w-48">
<div class="w-full h-2 rounded-full bg-surface-container-high"><div class="h-full bg-tertiary-container rounded-full" style="width: 91.6%;"></div></div>
</td>
<td class="py-space-md px-space-md text-tertiary font-bold">$100.00</td>
<td class="py-space-md px-space-md text-right"><button class="text-primary font-label-md font-bold hover:underline">Gestionar</button></td>
</tr>
<tr class="hover:bg-surface-container-low/50">
<td class="py-space-md px-space-md font-bold text-on-surface flex items-center gap-space-sm">
<span class="w-8 h-8 rounded-lg bg-secondary-container/60 text-on-secondary-container flex items-center justify-center material-symbols-outlined text-[18px]">shopping_cart</span>
            Alimentación &amp; Supermercado
          </td>
<td class="py-space-md px-space-md"><span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">Moderado (65.0%)</span></td>
<td class="py-space-md px-space-md font-semibold text-on-surface">$520.00 / $800.00</td>
<td class="py-space-md px-space-md w-48">
<div class="w-full h-2 rounded-full bg-surface-container-high"><div class="h-full bg-primary rounded-full" style="width: 65%;"></div></div>
</td>
<td class="py-space-md px-space-md text-primary font-bold">$280.00</td>
<td class="py-space-md px-space-md text-right"><button class="text-primary font-label-md font-bold hover:underline">Gestionar</button></td>
</tr>
<tr class="hover:bg-surface-container-low/50">
<td class="py-space-md px-space-md font-bold text-on-surface flex items-center gap-space-sm">
<span class="w-8 h-8 rounded-lg bg-primary-fixed/40 text-primary flex items-center justify-center material-symbols-outlined text-[18px]">directions_subway</span>
            Transporte &amp; Movilidad
          </td>
<td class="py-space-md px-space-md"><span class="px-2 py-0.5 rounded-full bg-secondary-fixed text-on-secondary-fixed font-label-sm text-label-sm font-semibold">Óptimo (60.0%)</span></td>
<td class="py-space-md px-space-md font-semibold text-on-surface">$180.00 / $300.00</td>
<td class="py-space-md px-space-md w-48">
<div class="w-full h-2 rounded-full bg-surface-container-high"><div class="h-full bg-primary rounded-full" style="width: 60%;"></div></div>
</td>
<td class="py-space-md px-space-md text-primary font-bold">$120.00</td>
<td class="py-space-md px-space-md text-right"><button class="text-primary font-label-md font-bold hover:underline">Gestionar</button></td>
</tr>
</tbody>
</table>
</div>
<!-- Banner / Widget Inferior de Asistente Financiero IA -->
<section class="bg-gradient-to-r from-primary to-primary-container text-on-primary rounded-3xl p-space-xl shadow-xl shadow-primary/10 relative overflow-hidden">
<!-- Ambient Decor Shapes -->
<div class="absolute -right-12 -bottom-12 w-64 h-64 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
<div class="absolute top-0 right-1/4 w-32 h-32 rounded-full bg-primary-fixed/10 blur-xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-space-lg">
<div class="flex items-start gap-space-md max-w-3xl">
<div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center shrink-0 shadow-inner">
<span class="material-symbols-outlined text-white text-[32px]">auto_awesome</span>
</div>
<div>
<div class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full bg-white/20 text-white font-label-sm text-label-sm mb-2 backdrop-blur-sm">
<span>Diagnóstico Predictivo de Cierre de Mayo</span>
</div>
<h2 class="font-headline-sm text-headline-sm text-white font-bold leading-tight">
            Proyección de Ahorro: +$380.00 de excedente no gastado
          </h2>
<p class="font-body-md text-body-md text-on-primary/90 mt-1 leading-relaxed">
            Con tu ritmo actual de gasto en las 8 categorías, se proyecta un cierre de mes saludable. Puedes derivar automáticamente este excedente a tu Meta de Ahorro <strong>'Fondo de Emergencia'</strong> para maximizar rendimiento.
          </p>
</div>
</div>
<div class="flex flex-col sm:flex-row items-center gap-space-sm w-full lg:w-auto shrink-0">
<button class="w-full sm:w-auto bg-surface-container-lowest text-primary hover:bg-surface-bright px-space-lg py-3 rounded-xl font-label-lg text-label-lg shadow-md transition-all font-bold flex items-center justify-center gap-2">
<span class="material-symbols-outlined text-[20px]">sync_alt</span>
<span>Programar transferencia automática</span>
</button>
<button class="w-full sm:w-auto bg-white/10 hover:bg-white/20 text-white px-space-md py-3 rounded-xl font-label-lg text-label-lg transition-all text-center">
          Descartar por ahora
        </button>
</div>
</div>
</section>
</div>
<script>
  // Dynamic Filtering Logic
  const filterPills = document.querySelectorAll('.filter-pill');
  const budgetCards = document.querySelectorAll('.budget-card');
  const searchInput = document.getElementById('categorySearchInput');
  const viewGridBtn = document.getElementById('viewGridBtn');
  const viewListBtn = document.getElementById('viewListBtn');
  const gridContainer = document.getElementById('budgetsGrid');
  const tableContainer = document.getElementById('budgetsTableContainer');

  let currentFilter = 'all';
  let searchQuery = '';

  function applyFilters() {
    budgetCards.forEach(card => {
      const status = card.dataset.status;
      const name = card.dataset.name || '';
      
      const matchesFilter = (currentFilter === 'all') || (status === currentFilter) || (status === 'all');
      const matchesSearch = name.toLowerCase().includes(searchQuery.toLowerCase());

      if (matchesFilter && matchesSearch) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  filterPills.forEach(pill => {
    pill.addEventListener('click', () => {
      filterPills.forEach(p => {
        p.classList.remove('bg-primary', 'text-on-primary', 'shadow-sm');
        p.classList.add('bg-surface-container-lowest', 'text-on-surface-variant');
      });
      pill.classList.remove('bg-surface-container-lowest', 'text-on-surface-variant');
      pill.classList.add('bg-primary', 'text-on-primary', 'shadow-sm');

      currentFilter = pill.dataset.filter;
      applyFilters();
    });
  });

  searchInput.addEventListener('input', (e) => {
    searchQuery = e.target.value.trim();
    applyFilters();
  });

  // Toggle View Modes
  viewGridBtn.addEventListener('click', () => {
    gridContainer.classList.remove('hidden');
    tableContainer.classList.add('hidden');
    viewGridBtn.classList.add('bg-surface-container', 'text-primary');
    viewGridBtn.classList.remove('text-on-surface-variant');
    viewListBtn.classList.remove('bg-surface-container', 'text-primary');
    viewListBtn.classList.add('text-on-surface-variant');
  });

  viewListBtn.addEventListener('click', () => {
    gridContainer.classList.add('hidden');
    tableContainer.classList.remove('hidden');
    viewListBtn.classList.add('bg-surface-container', 'text-primary');
    viewListBtn.classList.remove('text-on-surface-variant');
    viewGridBtn.classList.remove('bg-surface-container', 'text-primary');
    viewGridBtn.classList.add('text-on-surface-variant');
  });
</script>
@endsection
