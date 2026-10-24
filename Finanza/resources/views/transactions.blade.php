@extends('layouts.app')

@section('title', 'Transacciones &amp; Gastos | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-16">
<!-- Decorative Ambient Glows -->
<div class="relative w-full">
<div class="absolute -top-10 right-20 w-96 h-96 bg-primary-fixed/30 rounded-full blur-3xl pointer-events-none -z-10"></div>
<div class="absolute top-48 left-1/3 w-80 h-80 bg-secondary-container/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
<!-- Header Section -->
<div class="flex flex-col lg:flex-row lg:items-center justify-between gap-space-md py-space-md">
<div class="flex flex-col">
<div class="flex items-center gap-space-xs mb-1">
<span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
            Sincronización en vivo
          </span>
<span class="font-label-sm text-label-sm text-outline">• Mayo 2025</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Gestión de Transacciones</h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-0.5">
          Registra, clasifica y analiza todos tus ingresos y egresos en tiempo real con precisión bancaria.
        </p>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm flex-wrap">
<!-- Export Dropdown Trigger -->
<div class="relative" id="exportMenuWrapper">
<button class="flex items-center gap-space-xs px-space-md py-2.5 bg-surface-container-lowest text-on-surface hover:bg-surface-container-low rounded-xl font-label-lg text-label-lg shadow-sm transition-all duration-200" id="exportBtn" type="button">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">file_download</span>
<span>Exportar</span>
<span class="material-symbols-outlined text-[16px] text-outline">expand_more</span>
</button>
<div class="hidden absolute right-0 mt-2 w-48 bg-surface-container-lowest rounded-xl shadow-xl p-1.5 z-30" id="exportMenu">
<button class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left hover:bg-surface-container-low text-on-surface font-body-sm text-body-sm transition-colors" type="button">
<span class="material-symbols-outlined text-[18px] text-tertiary">table_chart</span>
<span>Exportar como CSV</span>
</button>
<button class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-left hover:bg-surface-container-low text-on-surface font-body-sm text-body-sm transition-colors" type="button">
<span class="material-symbols-outlined text-[18px] text-error">picture_as_pdf</span>
<span>Informe PDF Detallado</span>
</button>
</div>
</div>
<!-- Primary Add Transaction Trigger -->
<button class="flex items-center gap-space-xs px-space-lg py-2.5 bg-primary hover:bg-primary-container text-on-primary rounded-xl font-label-lg text-label-lg shadow-[0_8px_20px_rgba(0,105,72,0.24)] transition-all duration-200 transform hover:-translate-y-0.5" id="openModalBtn" type="button">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>Nueva Transacción</span>
</button>
</div>
</div>
<!-- 3 Quick KPI Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md mt-space-md">
<!-- Income KPI -->
<div class="relative overflow-hidden bg-surface-container-lowest p-space-lg rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Ingresos (Filtrado)</span>
<span class="font-headline-lg text-headline-lg text-primary mt-1 font-extrabold">$6,450.00 <span class="font-label-md text-label-md font-semibold text-outline">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[24px]">arrow_downward_alt</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-3 bg-surface-container-low/60 -mx-space-lg -mb-space-lg px-space-lg py-2.5">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-bold">
<span class="material-symbols-outlined text-[14px]">trending_up</span>
            +8.2% vs mes anterior
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">14 depósitos</span>
</div>
</div>
<!-- Expense KPI -->
<div class="relative overflow-hidden bg-surface-container-lowest p-space-lg rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Gastos (Filtrado)</span>
<span class="font-headline-lg text-headline-lg text-error mt-1 font-extrabold">$2,890.50 <span class="font-label-md text-label-md font-semibold text-outline">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-error-container flex items-center justify-center text-error shadow-sm">
<span class="material-symbols-outlined text-[24px]">arrow_upward_alt</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-3 bg-surface-container-low/60 -mx-space-lg -mb-space-lg px-space-lg py-2.5">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-bold">
<span class="material-symbols-outlined text-[14px]">verified</span>
            -3.1% optimizado
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant">42 deducciones</span>
</div>
</div>
<!-- Net Flow KPI -->
<div class="relative overflow-hidden bg-surface-container-lowest p-space-lg rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Flujo Neto del Período</span>
<span class="font-headline-lg text-headline-lg text-on-surface mt-1 font-extrabold">+$3,559.50 <span class="font-label-md text-label-md font-semibold text-outline">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">shield</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-3 bg-surface-container-low/60 -mx-space-lg -mb-space-lg px-space-lg py-2.5">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary-container font-bold">
<span class="material-symbols-outlined text-[14px]">savings</span>
            Superávit (55.2% tasa ahorro)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold">Excelente</span>
</div>
</div>
</div>
<!-- Filter & Search Toolbar -->
<div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-[0_4px_20px_rgba(19,27,46,0.03)] mt-space-lg flex flex-col gap-space-sm">
<div class="flex flex-col lg:flex-row items-stretch lg:items-center gap-space-sm">
<!-- Search Field -->
<div class="relative flex-1">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]">search</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 transition-all" id="searchInput" placeholder="Buscar por comercio, concepto o etiqueta..." type="text"/>
</div>
<!-- Filter Selectors -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2 flex-shrink-0">
<!-- Type Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="typeFilter">
<option value="all">Todos los tipos</option>
<option value="income">Solo Ingresos</option>
<option value="expense">Solo Gastos</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">unfold_more</span>
</div>
<!-- Account Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="accountFilter">
<option value="all">Todas las Cuentas</option>
<option value="chase">Chase Nómina ••8912</option>
<option value="platinum">Débito Platinum ••4921</option>
<option value="stripe">Stripe Business</option>
<option value="cash">Efectivo / Billetera</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">account_balance_wallet</span>
</div>
<!-- Category Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="categoryFilter">
<option value="all">Todas Categorías</option>
<option value="nomina">Nómina &amp; Salario</option>
<option value="alimentacion">Alimentación</option>
<option value="vivienda">Vivienda &amp; Hogar</option>
<option value="servicios">Servicios Básicos</option>
<option value="ocio">Ocio &amp; Entretenimiento</option>
<option value="transporte">Transporte &amp; Viaje</option>
<option value="freelance">Freelance &amp; Ventas</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">category</span>
</div>
<!-- Date Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="dateFilter">
<option value="current">Este Mes (Mayo 2025)</option>
<option value="30days">Últimos 30 días</option>
<option value="year">Este Año (2025)</option>
<option value="custom">Rango Personalizado...</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">calendar_month</span>
</div>
</div>
<!-- Clear Filter Trigger -->
<button class="p-2.5 text-on-surface-variant hover:text-error hover:bg-error-container/40 rounded-xl transition-colors flex items-center justify-center" id="resetFiltersBtn" title="Limpiar filtros" type="button">
<span class="material-symbols-outlined text-[20px]">filter_alt_off</span>
</button>
</div>
<!-- Quick Category Pills -->
<div class="flex items-center gap-2 overflow-x-auto pt-1 pb-0.5 text-label-sm">
<span class="text-on-surface-variant text-label-sm whitespace-nowrap mr-1 font-semibold">Vistas Rápidas:</span>
<button class="px-3 py-1 rounded-full bg-primary text-on-primary font-label-sm whitespace-nowrap shadow-sm" type="button">Todos (142)</button>
<button class="px-3 py-1 rounded-full bg-surface-container-low hover:bg-surface-container-high text-on-surface-variant font-label-sm whitespace-nowrap transition-colors" type="button">Gastos Fijos</button>
<button class="px-3 py-1 rounded-full bg-surface-container-low hover:bg-surface-container-high text-on-surface-variant font-label-sm whitespace-nowrap transition-colors" type="button">Supermercados</button>
<button class="px-3 py-1 rounded-full bg-surface-container-low hover:bg-surface-container-high text-on-surface-variant font-label-sm whitespace-nowrap transition-colors" type="button">Suscripciones Digitales</button>
<button class="px-3 py-1 rounded-full bg-surface-container-low hover:bg-surface-container-high text-on-surface-variant font-label-sm whitespace-nowrap transition-colors" type="button">Transferencias</button>
<button class="px-3 py-1 rounded-full bg-surface-container-low hover:bg-surface-container-high text-on-surface-variant font-label-sm whitespace-nowrap transition-colors" type="button">Mayores a $500</button>
</div>
</div>
<!-- Main Transactions Table Card -->
<div class="bg-surface-container-lowest rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] mt-space-lg overflow-hidden flex flex-col">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse" id="transactionsTable">
<thead>
<tr class="bg-surface-container-low/70 text-on-surface-variant font-label-sm text-label-sm uppercase tracking-wider">
<th class="py-4 px-space-lg">Categoría &amp; Tipo</th>
<th class="py-4 px-space-md">Concepto / Establecimiento</th>
<th class="py-4 px-space-md">Cuenta / Método</th>
<th class="py-4 px-space-md">Fecha &amp; Hora</th>
<th class="py-4 px-space-md">Estado</th>
<th class="py-4 px-space-md text-right">Monto</th>
<th class="py-4 px-space-lg text-center">Acciones</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-low font-body-sm text-body-sm" id="tableBody">
<!-- Row 1: Salario Directo Chase -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-primary flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">payments</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Nómina</span>
<span class="font-label-sm text-label-sm text-primary">Ingreso Fijo</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">TechCorp Global Inc.</span>
<span class="font-label-sm text-label-sm text-outline">Pago Quincenal Nómina Directa #4892</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-primary">account_balance</span>
                  Chase •• 8912
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">28 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">09:30 AM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-primary font-bold">+$4,800.00</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 2: Renta Vivienda -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-container-highest text-inverse-surface flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">apartment</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Vivienda</span>
<span class="font-label-sm text-label-sm text-outline">Gasto Fijo</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Skyline Residences Group</span>
<span class="font-label-sm text-label-sm text-outline">Alquiler Residencial Mensual Apto 12B</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-primary">account_balance</span>
                  Chase •• 8912
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">27 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">08:00 AM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$950.00</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 3: Supermercado Alimentación -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-variant text-primary-container flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">shopping_cart</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Alimentación</span>
<span class="font-label-sm text-label-sm text-outline">Gasto Variable</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Whole Foods Market</span>
<span class="font-label-sm text-label-sm text-outline">Compra semanal víveres orgánicos</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-tertiary">credit_card</span>
                  Débito Plat. •• 4921
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">26 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">05:45 PM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$142.30</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 4: Freelance Stripe Ingreso -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-tertiary-fixed text-tertiary flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">monetization_on</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Freelance</span>
<span class="font-label-sm text-label-sm text-tertiary">Factura Externa</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Nordic Design Lab BV</span>
<span class="font-label-sm text-label-sm text-outline">Consultoría UX &amp; Design System Q2</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-tertiary">receipt</span>
                  Stripe Invoice
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">25 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">03:10 PM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-primary font-bold">+$1,650.00</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 5: Transporte Uber -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-tertiary-fixed-dim/40 text-on-tertiary-fixed-variant flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">directions_car</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Transporte</span>
<span class="font-label-sm text-label-sm text-outline">Movilidad Urbana</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Uber Rides Central</span>
<span class="font-label-sm text-label-sm text-outline">Trayecto Aeropuerto JFK a Distrito Financiero</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-tertiary">credit_card</span>
                  Débito Plat. •• 4921
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">24 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">11:15 AM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$78.50</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 6: Servicios Eléctricos / Pendiente -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-container-high text-primary flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">bolt</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Servicios</span>
<span class="font-label-sm text-label-sm text-tertiary">Facturación Mes</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">ConEdison Energía Renovable</span>
<span class="font-label-sm text-label-sm text-outline">Consumo eléctrico mayo residencial</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-primary">account_balance</span>
                  Chase •• 8912
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">23 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">07:20 PM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-tertiary-fixed text-on-tertiary-fixed-variant font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-tertiary"></span>
                  Pendiente
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$125.40</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 7: Suscripción Ocio Netflix -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-error-container text-error flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">movie</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Ocio &amp; Streaming</span>
<span class="font-label-sm text-label-sm text-outline">Recurrente</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Netflix Premium 4K</span>
<span class="font-label-sm text-label-sm text-outline">Suscripción plan familiar digital</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-tertiary">credit_card</span>
                  Débito Plat. •• 4921
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">21 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">01:00 AM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$22.99</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 8: Restaurante / Ocio -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-surface-variant text-primary-container flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">restaurant</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Alimentación</span>
<span class="font-label-sm text-label-sm text-outline">Cena Negocios</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Le Bernardin Bistro</span>
<span class="font-label-sm text-label-sm text-outline">Reunión con socios comerciales</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-tertiary">credit_card</span>
                  Débito Plat. •• 4921
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">19 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">09:40 PM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$189.00</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 9: Gasolina / Transporte -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-tertiary-fixed-dim/40 text-on-tertiary-fixed-variant flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">local_gas_station</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Transporte</span>
<span class="font-label-sm text-label-sm text-outline">Combustible</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Shell Petroleum Estación 04</span>
<span class="font-label-sm text-label-sm text-outline">Carga completa vehículo familiar</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-tertiary">payments</span>
                  Efectivo / Billetera
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">17 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">04:12 PM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-on-surface font-bold">-$65.00</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<!-- Row 10: Retorno Inversión / Ingreso -->
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-primary flex items-center justify-center flex-shrink-0 shadow-sm">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">insights</span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold">Inversiones</span>
<span class="font-label-sm text-label-sm text-primary">Dividendos</span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Vanguard S&amp;P 500 Index</span>
<span class="font-label-sm text-label-sm text-outline">Pago trimestral dividendos pasivos</span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-primary">account_balance</span>
                  Chase •• 8912
                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium">15 May 2025</span>
<span class="block text-outline font-label-sm text-label-sm">10:00 AM</span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Completado
                </span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm text-primary font-bold">+$320.00</span>
<span class="block text-outline font-label-sm text-label-sm">USD</span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination and Bottom Summary -->
<div class="px-space-lg py-4 bg-surface-container-low/40 flex flex-col sm:flex-row items-center justify-between gap-space-sm">
<span class="font-body-sm text-body-sm text-on-surface-variant">
          Mostrando <span class="font-semibold text-on-surface">1 - 10</span> de <span class="font-semibold text-on-surface">142</span> transacciones registradas
        </span>
<div class="flex items-center gap-1">
<button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest text-outline hover:text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1 shadow-sm opacity-60 cursor-not-allowed" type="button">
<span class="material-symbols-outlined text-[16px]">chevron_left</span>
<span>Anterior</span>
</button>
<button class="w-8 h-8 rounded-lg bg-primary text-on-primary font-label-md text-label-md flex items-center justify-center shadow-sm" type="button">1</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center transition-colors" type="button">2</button>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center transition-colors" type="button">3</button>
<span class="px-1 text-outline font-label-md">...</span>
<button class="w-8 h-8 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md flex items-center justify-center transition-colors" type="button">15</button>
<button class="px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1 shadow-sm" type="button">
<span>Siguiente</span>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
</button>
</div>
</div>
</div>
</div>
<!-- Modal Backdrop & Dialog for "Nueva Transacción" -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden transition-opacity duration-300" id="newTxModal">
<div class="relative w-full max-w-xl bg-surface-container-lowest rounded-3xl shadow-[0_20px_50px_rgba(19,27,46,0.2)] overflow-hidden flex flex-col max-h-[90vh]">
<!-- Modal Header -->
<div class="px-space-xl pt-space-lg pb-space-sm flex items-center justify-between border-b border-surface-container-low">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-2xl bg-secondary-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">add_card</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold">Registrar Transacción</h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">Ingresa los detalles para tu historial financiero</span>
</div>
</div>
<button class="w-9 h-9 rounded-full flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" id="closeModalBtn" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>
<!-- Modal Body (Scrollable if necessary) -->
<form class="p-space-xl overflow-y-auto flex flex-col gap-space-md" id="txForm">
<!-- Transaction Type Switcher Tabs -->
<div class="grid grid-cols-3 gap-1 bg-surface-container-low p-1.5 rounded-2xl">
<button class="type-tab-btn py-2 px-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-1.5 transition-all bg-surface-container-lowest text-error shadow-sm font-bold" data-type="gasto" type="button">
<span class="material-symbols-outlined text-[18px]">arrow_outward</span>
<span>Gasto</span>
</button>
<button class="type-tab-btn py-2 px-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:text-on-surface" data-type="ingreso" type="button">
<span class="material-symbols-outlined text-[18px]">arrow_downward</span>
<span>Ingreso</span>
</button>
<button class="type-tab-btn py-2 px-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:text-on-surface" data-type="transferencia" type="button">
<span class="material-symbols-outlined text-[18px]">sync_alt</span>
<span>Transferencia</span>
</button>
</div>
<!-- Prominent Amount Display & Input -->
<div class="flex flex-col items-center justify-center bg-surface-container-low/60 rounded-2xl p-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline mb-1">Importe de la Operación</span>
<div class="flex items-center justify-center gap-1 w-full">
<span class="font-display text-display text-outline font-bold">$</span>
<input class="w-48 bg-transparent text-center font-display text-display text-on-surface font-extrabold focus:outline-none placeholder:text-outline/40" min="0" placeholder="0.00" required="" step="0.01" type="number"/>
<span class="font-headline-sm text-headline-sm text-outline font-semibold">USD</span>
</div>
</div>
<!-- Description Field -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Concepto o Establecimiento</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]">storefront</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" placeholder="Ej. Whole Foods Market, Netflix, Uber..." required="" type="text"/>
</div>
</div>
<!-- Category & Account (2 Columns) -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<!-- Category Select -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Categoría</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">category</span>
<select class="w-full appearance-none pl-11 pr-8 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer">
<option value="alimentacion">Alimentación &amp; Supermercado</option>
<option value="vivienda">Vivienda &amp; Renta</option>
<option value="servicios">Servicios Básicos (Luz, Agua)</option>
<option value="transporte">Transporte &amp; Combustible</option>
<option value="ocio">Ocio, Restaurantes &amp; Viajes</option>
<option value="nomina">Nómina / Salario</option>
<option value="freelance">Freelance / Clientes</option>
<option value="inversion">Inversiones &amp; Dividendos</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
<!-- Account Select -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Cuenta / Origen</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">credit_card</span>
<select class="w-full appearance-none pl-11 pr-8 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer">
<option value="platinum">Tarjeta Débito Platinum ••4921</option>
<option value="chase">Cuenta Nómina Chase ••8912</option>
<option value="stripe">Stripe Business Balance</option>
<option value="cash">Efectivo / Billetera Física</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
</div>
<!-- Date & Time Row -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Fecha</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">today</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" type="date" value="2025-05-28"/>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Hora</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">schedule</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" type="time" value="14:30"/>
</div>
</div>
</div>
<!-- Recurrent Checkbox -->
<div class="flex items-center gap-3 pt-1">
<label class="relative flex items-center cursor-pointer">
<input class="w-5 h-5 rounded-md text-primary bg-surface-container-low focus:ring-primary/30" type="checkbox"/>
</label>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-semibold">Gasto Recurrente / Suscripción</span>
<span class="font-label-sm text-label-sm text-outline">Se repetirá automáticamente en tus proyecciones</span>
</div>
</div>
<!-- Modal Footer Actions -->
<div class="flex items-center justify-end gap-space-sm pt-space-sm border-t border-surface-container-low mt-2">
<button class="px-space-md py-2.5 rounded-xl font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors" id="cancelModalBtn" type="button">
            Cancelar
          </button>
<button class="px-space-lg py-2.5 rounded-xl font-label-lg text-label-lg bg-primary hover:bg-primary-container text-on-primary shadow-[0_6px_16px_rgba(0,105,72,0.25)] transition-all" type="submit">
            Guardar Transacción
          </button>
</div>
</form>
</div>
</div>
</div>
<script>
  // Export Menu Toggle
  const exportBtn = document.getElementById('exportBtn');
  const exportMenu = document.getElementById('exportMenu');
  exportBtn.addEventListener('click', (e) => {
    e.stopPropagation();
    exportMenu.classList.toggle('hidden');
  });
  document.addEventListener('click', () => {
    if (!exportMenu.classList.contains('hidden')) {
      exportMenu.classList.add('hidden');
    }
  });

  // Modal Open/Close Logic
  const openModalBtn = document.getElementById('openModalBtn');
  const closeModalBtn = document.getElementById('closeModalBtn');
  const cancelModalBtn = document.getElementById('cancelModalBtn');
  const newTxModal = document.getElementById('newTxModal');

  function openModal() {
    newTxModal.classList.remove('hidden');
  }
  function closeModal() {
    newTxModal.classList.add('hidden');
  }

  openModalBtn.addEventListener('click', openModal);
  closeModalBtn.addEventListener('click', closeModal);
  cancelModalBtn.addEventListener('click', closeModal);

  newTxModal.addEventListener('click', (e) => {
    if (e.target === newTxModal) closeModal();
  });

  // Type Switcher inside Modal
  const typeTabs = document.querySelectorAll('.type-tab-btn');
  typeTabs.forEach(tab => {
    tab.addEventListener('click', () => {
      typeTabs.forEach(t => {
        t.classList.remove('bg-surface-container-lowest', 'text-error', 'text-primary', 'text-tertiary', 'shadow-sm', 'font-bold');
        t.classList.add('text-on-surface-variant');
      });
      tab.classList.remove('text-on-surface-variant');
      tab.classList.add('bg-surface-container-lowest', 'shadow-sm', 'font-bold');
      const t = tab.getAttribute('data-type');
      if (t === 'gasto') tab.classList.add('text-error');
      else if (t === 'ingreso') tab.classList.add('text-primary');
      else tab.classList.add('text-tertiary');
    });
  });

  // Filter Reset Demo
  const resetBtn = document.getElementById('resetFiltersBtn');
  resetBtn.addEventListener('click', () => {
    document.getElementById('searchInput').value = '';
    document.getElementById('typeFilter').value = 'all';
    document.getElementById('accountFilter').value = 'all';
    document.getElementById('categoryFilter').value = 'all';
    document.getElementById('dateFilter').value = 'current';
  });

  // Form Submission
  const txForm = document.getElementById('txForm');
  txForm.addEventListener('submit', (e) => {
    e.preventDefault();
    closeModal();
  });
</script>
@endsection
