@extends('layouts.app')

@section('title', 'Cuentas Bancarias | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-16">

@if (session('status'))
<div class="mb-space-lg flex items-center gap-space-sm rounded-xl bg-secondary-container text-on-secondary-container px-space-md py-space-sm font-label-lg text-label-lg"><span class="material-symbols-outlined text-[20px]">check_circle</span>{{ session('status') }}</div>
@endif
<!-- SECCIÓN 1: CABECERA Y BREADCRUMBS -->
<header class="flex flex-col gap-space-md mb-space-xl">
<!-- Breadcrumb & Status badge -->
<div class="flex flex-wrap items-center justify-between gap-space-sm">
<nav class="flex items-center gap-space-xs font-label-md text-label-md text-on-surface-variant">
<a class="hover:text-primary transition-colors" href="{{ route('dashboard') }}">Dashboard</a>
<span class="material-symbols-outlined text-[16px]">chevron_right</span>
<span class="text-on-surface font-semibold">Cuentas Bancarias</span>
</nav>

</div>
<!-- Título Principal y Acciones -->
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-space-md">
<div class="flex flex-col max-w-3xl">
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight font-extrabold">
          Cuentas Bancarias
        </h1>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
          Registra y administra tus cuentas bancarias, ahorros, tarjetas y efectivo. Sus saldos se actualizan con cada transacción.
        </p>
</div>
<!-- Action Buttons -->
<div class="flex flex-wrap items-center gap-space-sm">
<button class="flex items-center gap-space-xs px-space-lg py-2.5 rounded-xl bg-primary hover:bg-primary-container text-on-primary transition-all shadow-[0_4px_16px_rgba(0,105,72,0.28)] font-label-lg text-label-lg hover:-translate-y-0.5 active:translate-y-0 cursor-pointer" id="openAccountBtn" type="button"><span class="material-symbols-outlined text-[20px]">add_circle</span><span>Nueva Cuenta</span></button>
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
<span class="font-headline-lg text-headline-lg text-on-surface font-black mt-1">${{ number_format($patrimonio, 2) }} <span class="font-label-md text-label-md text-on-surface-variant font-normal">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-on-secondary-container shadow-inner">
<span class="material-symbols-outlined text-[26px]">account_balance_wallet</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-md mt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[15px]">trending_up</span>
<span>Saldo total de tus cuentas</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">{{ $nCuentas }} {{ $nCuentas === 1 ? 'cuenta registrada' : 'cuentas registradas' }}</span>
</div>
</div>
<!-- KPI 2: Cuentas Sincronizadas -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-primary-fixed/20 blur-xl pointer-events-none group-hover:bg-primary-fixed/35 transition-all"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Cuentas Registradas</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-black mt-1">{{ $nCuentas }} {{ $nCuentas === 1 ? 'Cuenta' : 'Cuentas' }} <span class="font-label-md text-label-md text-on-surface-variant font-normal">en total</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-high flex items-center justify-center text-primary shadow-inner">
<span class="material-symbols-outlined text-[26px]">sync_saved_locally</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-md mt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="w-2 h-2 rounded-full bg-primary"></span>
<span>Registro manual</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">{{ $resumenTipos }}</span>
</div>
</div>
<!-- KPI 3: Protocolo de Seguridad -->
<div class="bg-surface-container-lowest rounded-2xl p-space-lg shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04)] flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -bottom-6 w-32 h-32 rounded-full bg-tertiary-fixed/20 blur-xl pointer-events-none group-hover:bg-tertiary-fixed/35 transition-all"></div>
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Flujo Neto del Mes</span>
<span class="font-headline-lg text-headline-lg text-on-surface font-black mt-1">{{ $flujoMes >= 0 ? '+' : '-' }}${{ number_format(abs($flujoMes), 2) }} <span class="font-label-md text-label-md text-tertiary font-bold">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-low flex items-center justify-center text-tertiary shadow-inner">
<span class="material-symbols-outlined text-[26px]">swap_vert</span>
</div>
</div>
<div class="flex items-center justify-between pt-space-md mt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-surface-container text-on-surface-variant font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[14px] text-tertiary">calendar_month</span>
<span>Ingresos menos gastos</span>
</div>
<span class="font-label-sm text-label-sm text-on-surface-variant">{{ $nMovimientosMes }} {{ $nMovimientosMes === 1 ? 'movimiento' : 'movimientos' }} este mes</span>
</div>
</div>
</section>
<!-- SECCIÓN 3: BARRA DE FILTROS Y BÚSQUEDA -->
<section class="bg-surface-container-lowest rounded-2xl p-space-md shadow-[0_2px_12px_rgba(15,23,42,0.03)] flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-space-md mb-space-lg">
<!-- Filtros de Pestañas Rápidas -->
<div class="flex items-center gap-1.5 overflow-x-auto pb-1 lg:pb-0" id="filterTabs">
<button class="px-space-md py-2 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-sm transition-all whitespace-nowrap active-filter" data-filter="all">
        Todas las Cuentas ({{ $nCuentas }})
      </button>
<button class="px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap" data-filter="bank">
        Bancarias ({{ $nBancarias }})
      </button>
<button class="px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap" data-filter="credit">
        Tarjetas de Crédito ({{ $nTarjetas }})
      </button>
<button class="px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap" data-filter="cash">
        Efectivo ({{ $nEfectivo }})
      </button>
</div>
<!-- Buscador y Estado API -->
<div class="flex flex-col sm:flex-row items-center gap-space-sm">
<div class="relative w-full sm:w-80">
<span class="material-symbols-outlined text-on-surface-variant absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">search</span>
<input class="w-full pl-10 pr-4 py-2 bg-surface-container-low rounded-xl font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all" id="searchInput" placeholder="Buscar por nombre o tipo de cuenta..." type="text"/>
</div>
</div>
</section>
<!-- SECCIÓN 4: GRID PRINCIPAL DE TARJETAS DE CUENTAS -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-space-lg mb-space-xl" id="accountsGrid">
@foreach ($cuentas as $cuenta)
@php $info = $tipos[$cuenta->type] ?? $tipos['checking']; @endphp
<article class="account-card bg-surface-container-lowest rounded-3xl p-space-lg shadow-[0_4px_24px_-2px_rgba(15,23,42,0.04)] hover:shadow-[0_8px_30px_rgba(15,23,42,0.08)] transition-all flex flex-col justify-between gap-space-md group" data-category="{{ $info['group'] }}" data-search="{{ \Illuminate\Support\Str::lower($cuenta->name.' '.$info['label'].' '.$cuenta->currency) }}">
<div>
<!-- Card Top Bar -->
<div class="flex items-start justify-between gap-3">
<div class="flex items-center gap-space-sm">
<div class="w-12 h-12 rounded-2xl bg-surface-container-highest flex items-center justify-center text-primary shadow-sm font-black text-xl">
<span class="material-symbols-outlined text-[28px]">{{ $info['icon'] }}</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">{{ $cuenta->name }}</h3>
<span class="px-2 py-0.5 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-[11px] font-semibold">{{ $info['label'] }}</span>
</div>
<span class="font-body-sm text-body-sm text-on-surface-variant">{{ $cuenta->currency }} · {{ $cuenta->transactions_count }} {{ $cuenta->transactions_count === 1 ? 'movimiento' : 'movimientos' }}</span>
</div>
</div>

</div>
<!-- Metric Section -->
<div class="mt-space-lg p-space-md rounded-2xl bg-surface-container-low/70 flex flex-col gap-space-sm">
<div class="flex items-baseline justify-between">
<span class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-wider font-semibold">Saldo actual</span>

</div>
<div class="flex items-baseline gap-2">
<span class="font-headline-lg text-headline-lg text-on-surface font-black tracking-tight">{{ $cuenta->balance < 0 ? '-' : '' }}${{ number_format(abs($cuenta->balance), 2) }}</span>
<span class="font-label-md text-label-md text-on-surface-variant font-bold">{{ $cuenta->currency }}</span>
</div>
<div class="grid grid-cols-2 gap-2 pt-2 border-t border-surface-variant/40 font-label-sm text-label-sm text-on-surface-variant">
<div>Ingresos del mes: <strong class="text-on-surface font-semibold">+${{ number_format((float) $cuenta->ingresos_mes, 2) }}</strong></div>
<div>Gastos del mes: <strong class="text-on-surface font-semibold">-${{ number_format((float) $cuenta->gastos_mes, 2) }}</strong></div>
</div>
</div>
</div>
<!-- Card Bottom Actions & Last Sync -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-space-sm pt-space-sm border-t border-surface-container">
<div class="flex items-center gap-1.5 text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[16px] text-primary">schedule</span>
<span>{{ $cuenta->ultimo_movimiento ? 'Último movimiento: '.\Illuminate\Support\Carbon::parse($cuenta->ultimo_movimiento)->locale('es')->diffForHumans() : 'Sin movimientos todavía' }}</span>
</div>
<div class="flex items-center gap-2">
<button class="p-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Editar cuenta" type="button" data-id="{{ $cuenta->id }}" data-name="{{ $cuenta->name }}" data-type="{{ $cuenta->type }}" data-balance="{{ $cuenta->balance }}" data-currency="{{ $cuenta->currency }}" data-js="edit-account"><span class="material-symbols-outlined text-[18px]">edit</span></button>
<form action="{{ route('accounts.destroy', $cuenta) }}" class="inline-flex" method="POST" data-js="delete-account" data-name="{{ $cuenta->name }}" data-count="{{ $cuenta->transactions_count }}">
@csrf
@method('DELETE')
<button class="p-2 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface-variant hover:text-on-surface transition-colors" title="Eliminar cuenta" type="submit"><span class="material-symbols-outlined text-[18px]">delete</span></button>
</form>
<a href="{{ route('transactions.index', ['account' => $cuenta->id, 'period' => 'all']) }}" class="px-space-md py-2 rounded-xl bg-secondary-container hover:bg-secondary-fixed text-on-secondary-container font-label-md text-label-md transition-colors flex items-center gap-1.5"><span class="material-symbols-outlined text-[16px]">receipt_long</span><span>Ver movimientos</span></a>
</div>
</div>
</article>
@endforeach
<!-- Tarjeta para agregar una cuenta -->
<article class="col-span-1 lg:col-span-2 rounded-3xl p-space-xl bg-surface-container-lowest/80 border-2 border-dashed border-outline-variant/60 hover:border-primary transition-all flex flex-col md:flex-row items-center justify-between gap-space-lg text-center md:text-left group cursor-pointer hover:shadow-md">
<div class="flex flex-col md:flex-row items-center gap-space-lg">
<div class="w-16 h-16 rounded-2xl bg-secondary-container flex items-center justify-center text-on-secondary-container group-hover:scale-110 group-hover:bg-primary group-hover:text-on-primary transition-all shadow-sm">
<span class="material-symbols-outlined text-[32px]">add_card</span>
</div>
<div class="flex flex-col max-w-xl">
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
            {{ $cuentas->isEmpty() ? 'Crea tu primera cuenta' : 'Agregar otra cuenta' }}
          </h3>
<p class="font-body-md text-body-md text-on-surface-variant mt-1">
            Registra cuentas bancarias, de ahorro, tarjetas de crédito o efectivo para organizar tus transacciones y ver tu saldo total.
          </p>
</div>
</div>
<button class="px-space-xl py-3 rounded-xl bg-primary hover:bg-primary-container text-on-primary font-label-lg text-label-lg shadow-[0_4px_16px_rgba(0,105,72,0.24)] flex items-center gap-2 whitespace-nowrap active:scale-95 transition-all" id="openAccountBtn2" type="button"><span class="material-symbols-outlined text-[20px]">add</span><span>Nueva Cuenta</span></button>
</article>
</section>
</div>
<!-- Ventana para crear o editar una cuenta -->
<div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-inverse-surface/40 backdrop-blur-sm hidden transition-opacity duration-300" id="accountModal">
<div class="relative w-full max-w-xl bg-surface-container-lowest rounded-3xl shadow-[0_20px_50px_rgba(19,27,46,0.2)] overflow-hidden flex flex-col max-h-[90vh]">
<!-- Modal Header -->
<div class="px-space-xl pt-space-lg pb-space-sm flex items-center justify-between border-b border-surface-container-low">
<div class="flex items-center gap-space-sm">
<div class="w-10 h-10 rounded-2xl bg-secondary-container flex items-center justify-center text-primary">
<span class="material-symbols-outlined text-[22px]">account_balance</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface font-bold" id="accModalTitle">Nueva cuenta</h2>
<span class="font-label-sm text-label-sm text-on-surface-variant">Los datos de la cuenta que usarás en tus transacciones</span>
</div>
</div>
<button class="w-9 h-9 rounded-full flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors" id="closeAccountBtn" type="button">
<span class="material-symbols-outlined text-[20px]">close</span>
</button>
</div>

<form action="{{ route('accounts.store') }}" class="p-space-xl overflow-y-auto flex flex-col gap-space-md" id="accountForm" method="POST">
@csrf
<input id="accMethod" name="_method" type="hidden" value="PUT" disabled>
<input id="accMode" name="_mode" type="hidden" value="{{ old('_mode', 'create') }}">
<input id="accId" name="_id" type="hidden" value="{{ old('_id') }}">
@if ($errors->any())
<div class="rounded-xl bg-error-container text-on-error-container px-space-md py-space-sm font-label-md text-label-md space-y-1">
@foreach ($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach
</div>
@endif
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Nombre de la cuenta</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]">badge</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" id="accName" name="name" value="{{ old('name') }}" maxlength="80" placeholder="Ej. Cuenta de nómina, Tarjeta Visa, Efectivo..." required type="text"/>
</div>
</div>
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Tipo de cuenta</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">account_balance</span>
<select class="w-full appearance-none pl-11 pr-8 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="accType" name="type" required>
@foreach ($tipos as $clave => $info)
<option value="{{ $clave }}" @selected(old('type', 'checking') === $clave)>{{ $info['label'] }}</option>
@endforeach
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Moneda</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">currency_exchange</span>
<select class="w-full appearance-none pl-11 pr-8 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="accCurrency" name="currency" required>
@foreach ($monedas as $moneda)
<option value="{{ $moneda }}" @selected(old('currency', 'USD') === $moneda)>{{ $moneda }}</option>
@endforeach
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
</div>
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Saldo actual</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]">attach_money</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" id="accBalance" name="balance" value="{{ old('balance', '0.00') }}" step="0.01" placeholder="0.00" required type="number"/>
</div>
</div>
<!-- Modal Footer Actions -->
<div class="flex items-center justify-end gap-space-sm pt-space-sm border-t border-surface-container-low mt-2">
<button class="px-space-md py-2.5 rounded-xl font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors" id="cancelAccountBtn" type="button">
            Cancelar
          </button>
<button class="px-space-lg py-2.5 rounded-xl font-label-lg text-label-lg bg-primary hover:bg-primary-container text-on-primary shadow-[0_6px_16px_rgba(0,105,72,0.25)] transition-all" id="txSubmit" id="accSubmit" type="submit"><span class="inline-flex items-center gap-2"><span class="material-symbols-outlined text-[18px] hidden animate-spin" id="accSubmitIcon">progress_activity</span><span id="accSubmitText">Guardar cuenta</span></span></button>
</div>
</form>
</div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // 1. Filtro por pestañas
    const tabs = document.querySelectorAll('#filterTabs button');
    const cards = document.querySelectorAll('.account-card');

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        tabs.forEach(t => {
          t.className = "px-space-md py-2 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high font-label-md text-label-md transition-all whitespace-nowrap";
        });
        tab.className = "px-space-md py-2 rounded-xl bg-primary text-on-primary font-label-md text-label-md shadow-sm transition-all whitespace-nowrap active-filter";
        const filterVal = tab.getAttribute('data-filter');
        cards.forEach(card => {
          card.style.display = (filterVal === 'all' || card.getAttribute('data-category') === filterVal) ? 'flex' : 'none';
        });
      });
    });

    // 2. Búsqueda por texto
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
      searchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase().trim();
        cards.forEach(card => {
          const searchData = (card.getAttribute('data-search') || '').toLowerCase();
          card.style.display = searchData.includes(query) ? 'flex' : 'none';
        });
      });
    }

    // 3. Ventana para crear / editar una cuenta
    const modal = document.getElementById('accountModal');
    const form = document.getElementById('accountForm');
    const methodInput = document.getElementById('accMethod');
    const modeInput = document.getElementById('accMode');
    const idInput = document.getElementById('accId');
    const title = document.getElementById('accModalTitle');
    const urlGuardar = "{{ route('accounts.store') }}";
    const urlEditar = "{{ route('accounts.update', ['account' => '__ID__']) }}";

    function modoCrear() {
      form.action = urlGuardar;
      methodInput.disabled = true;
      modeInput.value = 'create';
      idInput.value = '';
      title.textContent = 'Nueva cuenta';
    }
    function modoEditar(id) {
      form.action = urlEditar.replace('__ID__', id);
      methodInput.disabled = false;
      modeInput.value = 'edit';
      idInput.value = id;
      title.textContent = 'Editar cuenta';
    }
    function abrir() { modal.classList.remove('hidden'); }
    function cerrar() { modal.classList.add('hidden'); }

    function nuevaCuenta() {
      modoCrear();
      document.getElementById('accName').value = '';
      document.getElementById('accType').value = 'checking';
      document.getElementById('accCurrency').value = 'USD';
      document.getElementById('accBalance').value = '0.00';
      abrir();
      document.getElementById('accName').focus();
    }

    ['openAccountBtn', 'openAccountBtn2'].forEach((id) => {
      const btn = document.getElementById(id);
      if (btn) btn.addEventListener('click', nuevaCuenta);
    });
    document.getElementById('closeAccountBtn').addEventListener('click', cerrar);
    document.getElementById('cancelAccountBtn').addEventListener('click', cerrar);
    modal.addEventListener('click', (e) => { if (e.target === modal) cerrar(); });
    document.addEventListener('keydown', (e) => { if (e.key === 'Escape') cerrar(); });

    document.querySelectorAll('[data-js="edit-account"]').forEach((btn) => {
      btn.addEventListener('click', () => {
        modoEditar(btn.dataset.id);
        document.getElementById('accName').value = btn.dataset.name;
        document.getElementById('accType').value = btn.dataset.type;
        document.getElementById('accCurrency').value = btn.dataset.currency;
        document.getElementById('accBalance').value = btn.dataset.balance;
        abrir();
      });
    });

    // 4. Confirmar antes de eliminar
    document.querySelectorAll('[data-js="delete-account"]').forEach((f) => {
      f.addEventListener('submit', (e) => {
        const n = parseInt(f.dataset.count, 10) || 0;
        const extra = n > 0 ? ' También se borrarán sus ' + n + ' transacciones.' : '';
        if (!confirm('¿Eliminar la cuenta «' + f.dataset.name + '»?' + extra + ' Esta acción no se puede deshacer.')) {
          e.preventDefault();
        }
      });
    });

    // 5. Evitar doble envío
    let enviando = false;
    form.addEventListener('submit', (e) => {
      if (enviando) { e.preventDefault(); return; }
      enviando = true;
      document.getElementById('accSubmitIcon').classList.remove('hidden');
      document.getElementById('accSubmitText').textContent = 'Guardando...';
      const btn = document.getElementById('accSubmit');
      btn.classList.add('opacity-70', 'cursor-not-allowed');
      setTimeout(() => { btn.disabled = true; }, 0);
    });
    window.addEventListener('pageshow', (e) => {
      if (e.persisted) {
        enviando = false;
        const btn = document.getElementById('accSubmit');
        btn.disabled = false;
        btn.classList.remove('opacity-70', 'cursor-not-allowed');
        document.getElementById('accSubmitIcon').classList.add('hidden');
        document.getElementById('accSubmitText').textContent = 'Guardar cuenta';
      }
    });

    // 6. Si hubo errores al guardar, se vuelve a abrir la ventana con lo que se escribió
    @if ($errors->any() && old('_mode'))
    @if (old('_mode') === 'edit' && old('_id'))
    modoEditar("{{ old('_id') }}");
    @else
    modoCrear();
    @endif
    abrir();
    @endif
  });
</script>
@endsection
