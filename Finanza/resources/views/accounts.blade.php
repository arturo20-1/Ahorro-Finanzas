@extends('layouts.app')

@section('title', 'Cuentas Bancarias | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-16">
<!-- ACTIVATION SCRIPT: SIDEBAR STATE ACCORDING TO USER PROMPT -->

<!-- SECCIÓN 1: CABECERA Y BREADCRUMBS -->
<header class="flex flex-col gap-space-md mb-space-xl">
<!-- Breadcrumb & Status badge -->
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<nav class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="#">Dashboard</a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-on-surface font-semibold">Cuentas Bancarias &amp; Sincronización</span>
</nav>
<!-- Badge de Estado Dinámico -->
<div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-secondary-container/60 shadow-sm">
<span class="relative flex h-2 w-2">
<span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
<span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
</span>
<span class="font-label-sm text-label-sm text-on-secondary-container tracking-tight">
          Sincronización Open Banking Activa • Latencia &lt; 40ms • AES-256
        </span>
</div>
</div>
<!-- Título Principal y Acciones -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-md">
<div class="flex flex-col max-w-3xl">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight font-extrabold">
          Cuentas Bancarias y Sincronización
        </h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
          Administra tus cuentas financieras, tarjetas y pasarelas con encriptación de grado bancario en tiempo real.
        </p>
</div>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-space-sm">
<button class="flex items-center gap-space-xs px-space-md py-2.5 rounded-xl bg-surface-container-lowest text-on-surface hover:bg-surface-container-high transition-all shadow-[0_2px_8px_rgba(15,23,42,0.04)] font-label-lg text-label-lg active:scale-95" id="syncAllBtn" type="button">
<span class="material-symbols-outlined text-[19px] transition-transform duration-700" id="syncAllIcon">sync</span>
<span>Sincronizar Todas Ahora</span>
</button>
<button class="flex items-center gap-space-xs px-space-lg py-2.5 rounded-xl bg-primary hover:bg-primary-container text-on-primary transition-all shadow-[0_4px_16px_rgba(0,105,72,0.28)] font-label-lg text-label-lg hover:-translate-y-0.5 active:translate-y-0 cursor-pointer" type="button">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>+ Vincular Nueva Cuenta</span>
</button>
</div>
</div>
</header>
<!-- SECCIÓN 2: RESUMEN MÉTRICO (3 KPIS SUPERIORES) -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-space-lg mb-space-xl">
<!-- KPI 1: Patrimonio en Cuentas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-secondary-container/20 blur-xl pointer-events-none group-hover:bg-secondary-container/35 transition-all"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Patrimonio en Cuentas</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-black mt-1">$24,580.00 <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shadow-inner">
<span class="material-symbols-outlined text-[26px]">account_balance_wallet</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-md mt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[15px]">trending_up</span>
<span>+12.4% vs mes anterior</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">3 instituciones conectadas</span>
</div>
</div>
<!-- KPI 2: Cuentas Sincronizadas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-primary-fixed/20 blur-xl pointer-events-none group-hover:bg-primary-fixed/35 transition-all"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Cuentas Sincronizadas</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-black mt-1">4 Conexiones <span class="font-label-md text-label-md text-on-surface-variant font-normal">Activas</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center text-primary shadow-inner">
<span class="material-symbols-outlined text-[26px]">sync_saved_locally</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-md mt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span>100% Operativo</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">2 Bancos • 1 Tarjeta • 1 Pasarela</span>
</div>
</div>
<!-- KPI 3: Protocolo de Seguridad -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-tertiary-fixed/20 blur-xl pointer-events-none group-hover:bg-tertiary-fixed/35 transition-all"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Protocolo de Seguridad</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-black mt-1">Grado Bancario <span class="font-label-md text-label-md text-tertiary font-bold">SOC2</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center text-tertiary shadow-inner">
<span class="material-symbols-outlined text-[26px]">security</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-md mt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px] text-tertiary">lock</span>
<span>AES-256 bits</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">Sync aut.: Hace 3 mins</span>
</div>
</div>
</section>
<!-- SECCIÓN 3: BARRA DE FILTROS Y BÚSQUEDA -->
<section class="bg-surface-container-lowest rounded-2xl p-space-md shadow-[0_2px_12px_rgba(15,23,42,0.03)] flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-space-md mb-space-lg">
<!-- Filtros de Pestañas Rápidas -->
<div class="flex items-center gap-1.5 overflow-x-auto pb-1 lg:pb-0" id="filterTabs">
<button class="px-space-md py-2 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-sm transition-all whitespace-nowrap active-filter" data-filter="all">
        Todas las Cuentas (4)
      </button>
<button class="px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap" data-filter="bank">
        Bancarias (2)
      </button>
<button class="px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap" data-filter="credit">
        Tarjetas de Crédito (1)
      </button>
<button class="px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap" data-filter="fintech">
        Pasarelas &amp; Fintech (1)
      </button>
</div>
<!-- Buscador y Estado API -->
<div class="flex flex-col sm:flex-row items-center gap-space-sm">
<div class="relative w-full sm:w-80">
<span class="material-symbols-outlined text-on-surface-variant absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low rounded-xl font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all" id="searchInput" placeholder="Buscar entidad, últimos 4 dígitos o tipo..." type="text"/>
</div>
<button class="w-full sm:w-auto flex items-center justify-center gap-1.5 px-3.5 py-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-secondary-container font-label-md text-label-md transition-colors whitespace-nowrap" id="checkApiBtn">
<span class="w-2 h-2 rounded-full bg-primary inline-block"></span>
<span>Estado API Open Banking</span>
</button>
</div>
</section>
<!-- SECCIÓN 4: GRID PRINCIPAL DE TARJETAS DE CUENTAS -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg mb-space-xl" id="accountsGrid">
<!-- TARJETA 1: CHASE BANK (Cuenta Corriente) -->
<article class="account-card bg-surface-container-lowest rounded-3xl p-space-lg shadow-[0_4px_24px_-2px_rgba(15,23,42,0.04)] hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)] transition-all flex flex-col justify-between gap-space-md group" data-category="bank" data-search="chase bank cuenta corriente 8912 ach">
<div>
<!-- Card Top Bar -->
<div class="flex items-start justify-between gap-3">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-2xl bg-surface-container-highest flex items-center justify-center text-primary shadow-sm font-black text-xl">
<span class="material-symbols-outlined text-[28px]">account_balance</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Chase Bank</h3>
<span class="px-2 py-0.5 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-[11px] font-semibold">ACH Activo</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Cuenta Corriente Principal •• 8912</span>
</div>
</div>
<div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
<span>En tiempo real</span>
</div>
</div>
<!-- Metric Section -->
<div class="mt-space-lg p-space-md rounded-2xl bg-surface-container-low/70 flex flex-col gap-space-sm">
<div class="flex items-baseline justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Saldo Actual Disponible</span>
<span class="font-label-sm text-label-sm text-secondary font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">verified</span> Conciliado
            </span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg text-on-surface font-black tracking-tight">$14,250.00</span>
<span class="font-label-md text-label-md text-on-surface-variant font-bold">USD</span>
</div>
<div class="grid grid-cols-2 gap-2 pt-2 border-t border-surface-variant/40 font-label-sm text-label-sm text-on-surface-variant">
<div>Disponible: <strong class="text-on-surface font-semibold">$14,250.00</strong></div>
<div>Retenido: <strong class="text-on-surface font-semibold">$0.00</strong></div>
</div>
</div>
</div>
<!-- Card Bottom Actions & Last Sync -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>Sincronizado hace 2 min</span>
</div>
<div class="flex items-center gap-2">
<button class="p-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Configurar Credenciales" type="button">
<span class="material-symbols-outlined text-[18px]">key</span>
</button>
<button class="px-space-md py-2 rounded-xl bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[16px]">refresh</span>
<span>Actualizar Saldo</span>
</button>
</div>
</div>
</article>
<!-- TARJETA 2: VISA PLATINUM INFINITE (Tarjeta de Crédito) -->
<article class="account-card bg-surface-container-lowest rounded-3xl p-space-lg shadow-[0_4px_24px_-2px_rgba(15,23,42,0.04)] hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)] transition-all flex flex-col justify-between gap-space-md group" data-category="credit" data-search="visa platinum infinite chase 4921 credito rotativo">
<div>
<!-- Card Top Bar -->
<div class="flex items-start justify-between gap-3">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary shadow-sm font-black text-xl">
<span class="material-symbols-outlined text-[28px]">credit_card</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Visa Platinum Infinite</h3>
<span class="px-2 py-0.5 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-[11px] font-semibold">Chase</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Línea de Crédito Rotativo •• 4921</span>
</div>
</div>
<div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span>Activa &amp; Conciliada</span>
</div>
</div>
<!-- Metric & Progress Section -->
<div class="mt-space-lg p-space-md rounded-2xl bg-surface-container-low/70 flex flex-col gap-space-sm">
<div class="flex items-baseline justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Saldo Utilizado</span>
<span class="font-label-sm text-label-sm text-on-surface font-semibold">
              Límite: $10,000.00 USD
            </span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg text-on-surface font-black tracking-tight">$2,890.50</span>
<span class="font-label-md text-label-md text-on-surface-variant font-bold">USD</span>
<span class="ml-auto font-label-sm text-label-sm text-secondary font-bold">28.9% utilizado</span>
</div>
<!-- Progress Bar de Uso de Crédito -->
<div class="w-full bg-surface-container rounded-full h-2 overflow-hidden my-1">
<div class="bg-primary h-2 rounded-full transition-all duration-500" style="width: 28.9%"></div>
</div>
<div class="grid grid-cols-2 gap-2 pt-2 border-t border-surface-variant/40 font-label-sm text-label-sm text-on-surface-variant">
<div>Disponible: <strong class="text-secondary font-bold">$7,109.50 USD</strong></div>
<div>Corte: <strong class="text-on-surface font-semibold">15 Jun</strong> • Pago: <strong class="text-on-surface font-semibold">02 Jul</strong></div>
</div>
</div>
</div>
<!-- Card Bottom Actions & Last Sync -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-primary">credit_score</span>
<span>Pago mínimo: $125.00</span>
</div>
<div class="flex items-center gap-2">
<button class="px-space-md py-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">
            Ver Extracto
          </button>
<button class="px-space-md py-2 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md shadow-sm transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[16px]">payments</span>
<span>Pagar Tarjeta</span>
</button>
</div>
</div>
</article>
<!-- TARJETA 3: STRIPE PAYMENTS (Pasarela Digital) -->
<article class="account-card bg-surface-container-lowest rounded-3xl p-space-lg shadow-[0_4px_24px_-2px_rgba(15,23,42,0.04)] hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)] transition-all flex flex-col justify-between gap-space-md group" data-category="fintech" data-search="stripe payments billing freelance facturacion 1044 webhook pasarela">
<div>
<!-- Card Top Bar -->
<div class="flex items-start justify-between gap-3">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary shadow-sm font-black text-xl">
<span class="material-symbols-outlined text-[28px]">token</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Stripe Billing</h3>
<span class="px-2 py-0.5 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-[11px] font-semibold">Fintech API</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Cobros Freelance &amp; Facturación •• 1044</span>
</div>
</div>
<div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span>API Webhook Conectado</span>
</div>
</div>
<!-- Metric Section -->
<div class="mt-space-lg p-space-md rounded-2xl bg-surface-container-low/70 flex flex-col gap-space-sm">
<div class="flex items-baseline justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Saldo Neto Disponible</span>
<span class="font-label-sm text-label-sm text-tertiary font-bold">
              +$420.00 por liquidar
            </span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg text-on-surface font-black tracking-tight">$3,250.00</span>
<span class="font-label-md text-label-md text-on-surface-variant font-bold">USD</span>
</div>
<div class="pt-2 border-t border-surface-variant/40 font-label-sm text-label-sm text-on-surface-variant flex items-center gap-1.5">
<span class="material-symbols-outlined text-[15px] text-primary">move_to_inbox</span>
<span>Payout programado: <strong class="text-on-surface font-semibold">Cada lunes</strong> → Chase •• 8912</span>
</div>
</div>
</div>
<!-- Card Bottom Actions & Last Sync -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-primary">bolt</span>
<span>Webhooks al 100% (200 OK)</span>
</div>
<div class="flex items-center gap-2">
<button class="px-space-md py-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">
            Gestionar API Keys
          </button>
<button class="px-space-md py-2 rounded-xl bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container font-label-md text-label-md transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[16px]">sync</span>
<span>Sincronizar Webhook</span>
</button>
</div>
</div>
</article>
<!-- TARJETA 4: VANGUARD WEALTH HYSA (Ahorro Rendimiento) -->
<article class="account-card bg-surface-container-lowest rounded-3xl p-space-lg shadow-[0_4px_24px_-2px_rgba(15,23,42,0.04)] hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)] transition-all flex flex-col justify-between gap-space-md group" data-category="bank" data-search="vanguard wealth high yield savings hysa 3380 rendimiento interes">
<div>
<!-- Card Top Bar -->
<div class="flex items-start justify-between gap-3">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-2xl bg-surface-container-high flex items-center justify-center text-primary shadow-sm font-black text-xl">
<span class="material-symbols-outlined text-[28px]">savings</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Vanguard Wealth</h3>
<span class="px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-[11px] font-bold">HYSA Ahorro</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">Cuenta Indexada &amp; Respaldo •• 3380</span>
</div>
</div>
<div class="flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-semibold">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span>APY 4.85% Activo</span>
</div>
</div>
<!-- Metric Section -->
<div class="mt-space-lg p-space-md rounded-2xl bg-surface-container-low/70 flex flex-col gap-space-sm">
<div class="flex items-baseline justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Saldo Disponible con Rendimientos</span>
<span class="font-label-sm text-label-sm text-primary font-bold">
              +$18.40 USD este mes
            </span>
</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg text-on-surface font-black tracking-tight">$4,189.50</span>
<span class="font-label-md text-label-md text-on-surface-variant font-bold">USD</span>
</div>
<div class="pt-2 border-t border-surface-variant/40 font-label-sm text-label-sm text-on-surface-variant flex items-center justify-between">
<span>Interés compuesto pagado fin de mes</span>
<span class="text-primary font-bold">Tasa Fija 2024</span>
</div>
</div>
</div>
<!-- Card Bottom Actions & Last Sync -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-tertiary">diamond</span>
<span>Fondo de Seguridad Blindado</span>
</div>
<div class="flex items-center gap-2">
<button class="px-space-md py-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface font-label-md text-label-md transition-colors" type="button">
            Ver Historial
          </button>
<button class="px-space-md py-2 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-md text-label-md shadow-sm transition-colors flex items-center gap-1.5" type="button">
<span class="material-symbols-outlined text-[16px]">add</span>
<span>Abonar Fondos</span>
</button>
</div>
</div>
</article>
<!-- TARJETA 5: ADD / CONNECT NEW ENTITY (ESTADO AGREGAR) -->
<article class="col-span-1 lg:col-span-2 rounded-3xl p-space-xl bg-surface-container-lowest/80 border-2 border-dashed border-outline-variant/60 hover:border-primary transition-all flex flex-col md:flex-row items-center justify-between gap-space-lg text-center md:text-left group cursor-pointer hover:shadow-md">
<div class="flex flex-col md:flex-row items-center gap-space-lg">
<div class="w-16 h-16 rounded-2xl bg-secondary-container flex items-center justify-center text-on-secondary-container group-hover:scale-110 group-hover:bg-primary group-hover:text-on-primary transition-all shadow-sm">
<span class="material-symbols-outlined text-[32px]">add_link</span>
</div>
<div class="flex flex-col max-w-xl">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
            Conectar Nueva Entidad Financiera
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
            Soporta más de 12,000 instituciones bancarias mediante Plaid, MX y Stripe Financial Connections con conciliación automática.
          </p>
</div>
</div>
<button class="px-space-xl py-3 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg shadow-[0_4px_16px_rgba(0,105,72,0.24)] flex items-center gap-2 whitespace-nowrap active:scale-95 transition-all" type="button">
<span class="material-symbols-outlined text-[20px]">assured_workload</span>
<span>Vincular Banco o Tarjeta</span>
</button>
</article>
</section>
<!-- SECCIÓN 5: BANNER INFERIOR DE CONFIANZA, SEGURIDAD & PROTOCOLOS -->
<section class="bg-surface-container-lowest rounded-3xl p-space-xl shadow-[0_4px_24px_rgba(15,23,42,0.03)] flex flex-col gap-space-lg relative overflow-hidden">
<!-- Fondo decorativo sutil con acentos -->
<div class="absolute -right-24 -top-24 w-96 h-96 rounded-full bg-secondary-container/20 blur-3xl pointer-events-none"></div>
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md border-b border-surface-container pb-space-lg">
<div class="flex items-center gap-space-md">
<div class="w-12 h-12 rounded-2xl bg-secondary-container flex items-center justify-center text-on-secondary-container shadow-sm">
<span class="material-symbols-outlined text-[28px]">verified_user</span>
</div>
<div>
<h2 class="font-headline-sm text-headline-sm text-on-surface font-extrabold tracking-tight">
            Seguridad Institucional de Grado Bancario y Privacidad Garantizada
          </h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Tus activos y credenciales gozan de las salvaguardas tecnológicas más rigurosas del ecosistema financiero global.
          </p>
</div>
</div>
<div class="flex items-center gap-3">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-bold">Verificado por:</span>
<span class="px-2.5 py-1 rounded-lg bg-surface-container-low font-label-sm text-label-sm font-black text-on-surface">SOC2 TIPO II</span>
<span class="px-2.5 py-1 rounded-lg bg-surface-container-low font-label-sm text-label-sm font-black text-on-surface">ISO 27001</span>
</div>
</div>
<!-- Tres Columnas Explicativas -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-xl pt-space-xs">
<!-- Columna 1: Encriptación -->
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-surface-container-high flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">lock</span>
</div>
<h4 class="font-label-lg text-label-lg text-on-surface font-bold">Encriptación Extremo a Extremo</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Todos los datos viajan bajo túneles TLS 1.3 con cifrado simétrico AES-256 bits, garantizando inviolabilidad de cada registro en tránsito y reposo.
        </p>
</div>
<!-- Columna 2: Cero Almacenamiento -->
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container">
<span class="material-symbols-outlined text-[22px]">shield</span>
</div>
<h4 class="font-label-lg text-label-lg text-on-surface font-bold">Credenciales Cero-Almacenamiento (OAuth 2.0)</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Tus contraseñas bancarias nunca tocan nuestros servidores. La autenticación se realiza de forma directa mediante tokens seguros tokenizados.
        </p>
</div>
<!-- Columna 3: Auditoría -->
<div class="flex flex-col gap-2">
<div class="w-10 h-10 rounded-xl bg-tertiary-fixed flex items-center justify-center text-on-tertiary-fixed">
<span class="material-symbols-outlined text-[22px]">gavel</span>
</div>
<h4 class="font-label-lg text-label-lg text-on-surface font-bold">Auditoría SOC2 Tipo II &amp; ISO 27001</h4>
<p class="font-body-sm text-body-sm text-on-surface-variant leading-relaxed">
          Infraestructura auditada y certificada anualmente por firmas independientes de ciberseguridad financiera internacional.
        </p>
</div>
</div>
<!-- Enlaces de Transparencia y Revocación -->
<div class="flex flex-wrap items-center justify-between gap-space-md pt-space-md border-t border-surface-container font-label-md text-label-md text-on-surface-variant">
<div class="flex items-center gap-space-lg">
<a class="flex items-center gap-1 hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[16px]">verified</span>
<span>Ver Certificado de Seguridad</span>
</a>
<a class="flex items-center gap-1 hover:text-primary transition-colors" href="#">
<span class="material-symbols-outlined text-[16px]">visibility</span>
<span>Auditoría de Acceso en Vivo</span>
</a>
</div>
<a class="text-error hover:underline flex items-center gap-1 transition-colors font-semibold" href="#">
<span class="material-symbols-outlined text-[16px]">link_off</span>
<span>Revocar Conexiones Bancarias en 1 clic</span>
</a>
</div>
</section>
</div>
<!-- SCRIPT DE MICRO-INTERACCIONES (Búsqueda, Filtros y Sincronización) -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // 1. FILTRADO RÁPIDO POR PESTAÑAS
    const tabs = document.querySelectorAll('#filterTabs button');
    const cards = document.querySelectorAll('.account-card');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        // Reset classes
        tabs.forEach(t => {
          t.className = "px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap";
        });
        // Set active tab
        tab.className = "px-space-md py-2 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-sm transition-all whitespace-nowrap active-filter";
        
        const filterVal = tab.getAttribute('data-filter');
        cards.forEach(card => {
          if (filterVal === 'all' || card.getAttribute('data-category') === filterVal) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });

    // 2. BÚSQUEDA DINÁMICA POR TEXTO
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        cards.forEach(card => {
          const searchData = (card.getAttribute('data-search') || '').toLowerCase();
          if (searchData.includes(query)) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    }

    // 3. MICRO-INTERACCIÓN DEL BOTÓN SINCRONIZAR TODAS
    const syncBtn = document.getElementById('syncAllBtn');
    const syncIcon = document.getElementById('syncAllIcon');
    if (syncBtn && syncIcon) {
      syncBtn.addEventListener('click', () => {
        syncIcon.classList.add('rotate-180');
        const originalText = syncBtn.querySelector('span:last-child').textContent;
        syncBtn.querySelector('span:last-child').textContent = "Sincronizando cuentas...";
        
        setTimeout(() => {
          syncIcon.classList.remove('rotate-180');
          syncBtn.querySelector('span:last-child').textContent = "¡Cuentas Actualizadas!";
          setTimeout(() => {
            syncBtn.querySelector('span:last-child').textContent = originalText;
          }, 2000);
        }, 1200);
      });
    }

    // 4. BOTÓN ESTADO API OPEN BANKING
    const checkApiBtn = document.getElementById('checkApiBtn');
    if (checkApiBtn) {
      checkApiBtn.addEventListener('click', () => {
        alert("Diagnóstico de Enlace Bancario:\n• Red Plaid: Operativo (Ping: 22ms)\n• MX DataLink: Operativo (Ping: 31ms)\n• Stripe Financial Connections: Operativo (Ping: 18ms)\n\nEncriptación AES-256 activa. 100% de conexiones sanas.");
      });
    }
  });
</script>
@endsection
