<?php $__env->startSection('title', 'Transacciones &amp; Gastos | Finanzas &amp; Ahorro'); ?>

<?php $__env->startSection('content'); ?>
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
<?php if(session('status')): ?>
<div class="mt-space-md flex items-center gap-space-sm rounded-xl bg-secondary-container text-on-secondary-container px-space-md py-space-sm font-label-lg text-label-lg"><span class="material-symbols-outlined text-[20px]">check_circle</span><?php echo e(session('status')); ?></div>
<?php endif; ?>
<!-- 3 Quick KPI Summary Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md mt-space-md">
<!-- Income KPI -->
<div class="relative overflow-hidden bg-surface-container-lowest p-space-lg rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Ingresos (Filtrado)</span>
<span class="font-headline-lg text-headline-lg text-primary mt-1 font-extrabold">$<?php echo e(number_format($ingresos, 2)); ?> <span class="font-label-md text-label-md font-semibold text-outline">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-secondary-container flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[24px]">arrow_downward_alt</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-3 bg-surface-container-low/60 -mx-space-lg -mb-space-lg px-space-lg py-2.5">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-bold">
<span class="material-symbols-outlined text-[14px]">trending_up</span>
            Ingresos del período
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant"><?php echo e($nIngresos); ?> <?php echo e($nIngresos === 1 ? 'ingreso' : 'ingresos'); ?></span>
</div>
</div>
<!-- Expense KPI -->
<div class="relative overflow-hidden bg-surface-container-lowest p-space-lg rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Gastos (Filtrado)</span>
<span class="font-headline-lg text-headline-lg text-error mt-1 font-extrabold">$<?php echo e(number_format($gastos, 2)); ?> <span class="font-label-md text-label-md font-semibold text-outline">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-error-container flex items-center justify-center text-error shadow-sm">
<span class="material-symbols-outlined text-[24px]">arrow_upward_alt</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-3 bg-surface-container-low/60 -mx-space-lg -mb-space-lg px-space-lg py-2.5">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-primary font-bold">
<span class="material-symbols-outlined text-[14px]">verified</span>
            Gastos del período
          </span>
<span class="font-label-sm text-label-sm text-on-surface-variant"><?php echo e($nGastos); ?> <?php echo e($nGastos === 1 ? 'gasto' : 'gastos'); ?></span>
</div>
</div>
<!-- Net Flow KPI -->
<div class="relative overflow-hidden bg-surface-container-lowest p-space-lg rounded-2xl shadow-[0_4px_24px_rgba(19,27,46,0.04)] flex flex-col justify-between">
<div class="flex items-start justify-between">
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Flujo Neto del Período</span>
<span class="font-headline-lg text-headline-lg text-on-surface mt-1 font-extrabold"><?php echo e($neto >= 0 ? '+' : '-'); ?>$<?php echo e(number_format(abs($neto), 2)); ?> <span class="font-label-md text-label-md font-semibold text-outline">USD</span></span>
</div>
<div class="w-12 h-12 rounded-xl bg-surface-container-highest flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[24px]" style="font-variation-settings: 'FILL' 1;">shield</span>
</div>
</div>
<div class="mt-4 flex items-center justify-between pt-3 bg-surface-container-low/60 -mx-space-lg -mb-space-lg px-space-lg py-2.5">
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm text-tertiary-container font-bold">
<span class="material-symbols-outlined text-[14px]">savings</span>
            <?php echo e($neto >= 0 ? 'Superávit' : 'Déficit'); ?> (<?php echo e(number_format($tasa, 1)); ?>% tasa de ahorro)
          </span>
<span class="font-label-sm text-label-sm text-primary font-bold"><?php echo e($tasa >= 50 ? 'Excelente' : ($tasa >= 20 ? 'Buen ritmo' : ($tasa >= 0 ? 'Ajustado' : 'Revisa tus gastos'))); ?></span>
</div>
</div>
</div>
<!-- Filter & Search Toolbar -->
<div class="bg-surface-container-lowest rounded-2xl p-space-md shadow-[0_4px_20px_rgba(19,27,46,0.03)] mt-space-lg flex flex-col gap-space-sm">
<form action="<?php echo e(route('transactions.index')); ?>" class="flex flex-col lg:flex-row items-stretch lg:items-center gap-space-sm" method="GET">
<!-- Search Field -->
<div class="relative flex-1">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]">search</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 transition-all" id="searchInput" name="q" value="<?php echo e($busqueda); ?>" placeholder="Buscar por comercio, concepto o etiqueta..." type="text"/>
</div>
<!-- Filter Selectors -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-2 flex-shrink-0">
<!-- Type Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="typeFilter" name="type" onchange="this.form.submit()">
<option value="">Todos los tipos</option>
<option value="income" <?php if($tipo === 'income'): echo 'selected'; endif; ?>>Solo Ingresos</option>
<option value="expense" <?php if($tipo === 'expense'): echo 'selected'; endif; ?>>Solo Gastos</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">unfold_more</span>
</div>
<!-- Account Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="accountFilter" name="account" onchange="this.form.submit()">
<option value="">Todas las Cuentas</option>
<?php $__currentLoopData = $cuentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuenta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cuenta->id); ?>" <?php if($cuentaId === $cuenta->id): echo 'selected'; endif; ?>><?php echo e($cuenta->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">account_balance_wallet</span>
</div>
<!-- Category Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="categoryFilter" name="category" onchange="this.form.submit()">
<option value="">Todas Categorías</option>
<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cat->id); ?>" <?php if($categoriaId === $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">category</span>
</div>
<!-- Date Filter -->
<div class="relative">
<select class="w-full appearance-none bg-surface-container-low text-on-surface pl-3 pr-8 py-2.5 rounded-xl font-label-md text-label-md focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="dateFilter" name="period" onchange="this.form.submit()">
<option value="month" <?php if($periodo === 'month'): echo 'selected'; endif; ?>>Este Mes (<?php echo e(now()->locale('es')->translatedFormat('F Y')); ?>)</option>
<option value="30days" <?php if($periodo === '30days'): echo 'selected'; endif; ?>>Últimos 30 días</option>
<option value="year" <?php if($periodo === 'year'): echo 'selected'; endif; ?>>Este Año (<?php echo e(now()->year); ?>)</option>
<option value="all" <?php if($periodo === 'all'): echo 'selected'; endif; ?>>Todo el historial</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">calendar_month</span>
</div>
</div>
<!-- Clear Filter Trigger -->
<a href="<?php echo e(route('transactions.index')); ?>" class="p-2.5 text-on-surface-variant hover:text-error hover:bg-error-container/40 rounded-xl transition-colors flex items-center justify-center" title="Limpiar filtros">
<span class="material-symbols-outlined text-[20px]">filter_alt_off</span>
</a>
</form>

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
<th class="py-4 px-space-md">Fecha</th>
<th class="py-4 px-space-md text-right">Monto</th>
<th class="py-4 px-space-lg text-center">Acciones</th>
</tr>
</thead>
<tbody class="divide-y divide-surface-container-low font-body-sm text-body-sm" id="tableBody">
<?php $__empty_1 = true; $__currentLoopData = $transacciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<tr class="hover:bg-surface-container-low/40 transition-colors group">
<td class="py-4 px-space-lg">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-primary flex items-center justify-center flex-shrink-0 shadow-sm" <?php if($tx->category->color): ?> style="background-color: <?php echo e($tx->category->color); ?>22; color: <?php echo e($tx->category->color); ?>;" <?php endif; ?>>
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;"><?php echo e($tx->category->icon ?: 'category'); ?></span>
</div>
<div class="flex flex-col">
<span class="font-label-md text-label-md text-on-surface font-bold"><?php echo e($tx->category->name); ?></span>
<span class="font-label-sm text-label-sm <?php echo e($tx->type === 'income' ? 'text-primary' : 'text-on-surface-variant'); ?>"><?php echo e($tx->type === 'income' ? 'Ingreso' : 'Gasto'); ?></span>
</div>
</div>
</td>
<td class="py-4 px-space-md">
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-semibold"><?php echo e($tx->description); ?></span>
<span class="font-label-sm text-label-sm text-outline">Registrada <?php echo e($tx->created_at->locale('es')->diffForHumans()); ?></span>
</div>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-surface-container text-on-surface-variant font-label-sm text-label-sm">
<span class="material-symbols-outlined text-[15px] text-primary">account_balance</span>
                  <?php echo e($tx->account->name); ?>

                </span>
</td>
<td class="py-4 px-space-md whitespace-nowrap">
<span class="text-on-surface font-medium"><?php echo e($tx->transaction_date->locale('es')->translatedFormat('d M Y')); ?></span>
</td>
<td class="py-4 px-space-md text-right whitespace-nowrap">
<span class="font-headline-sm text-headline-sm <?php echo e($tx->type === 'income' ? 'text-primary' : 'text-on-surface'); ?> font-bold"><?php echo e($tx->type === 'income' ? '+' : '-'); ?>$<?php echo e(number_format($tx->amount, 2)); ?></span>
<span class="block text-outline font-label-sm text-label-sm"><?php echo e($tx->account->currency); ?></span>
</td>
<td class="py-4 px-space-lg text-center whitespace-nowrap">
<button class="w-8 h-8 rounded-lg flex items-center justify-center text-outline hover:text-on-surface hover:bg-surface-container-high transition-colors mx-auto" type="button">
<span class="material-symbols-outlined text-[20px]">more_horiz</span>
</button>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
<tr><td class="py-16 px-space-lg text-center" colspan="6"><div class="flex flex-col items-center gap-space-xs text-on-surface-variant"><span class="material-symbols-outlined text-[40px] text-outline">receipt_long</span><span class="font-label-lg text-label-lg font-semibold text-on-surface">No hay transacciones para estos filtros</span><span class="font-body-sm text-body-sm">Registra una con el botón "Registrar Transacción" o cambia el período.</span></div></td></tr>
<?php endif; ?>
</tbody>
</table>
</div>
<!-- Pagination and Bottom Summary -->
<div class="px-space-lg py-4 bg-surface-container-low/40 flex flex-col sm:flex-row items-center justify-between gap-space-sm">
<span class="font-body-sm text-body-sm text-on-surface-variant">
<?php if($transacciones->total() > 0): ?>
Mostrando <span class="font-semibold text-on-surface"><?php echo e($transacciones->firstItem()); ?> - <?php echo e($transacciones->lastItem()); ?></span> de <span class="font-semibold text-on-surface"><?php echo e($transacciones->total()); ?></span> transacciones
<?php else: ?>
Sin transacciones para mostrar
<?php endif; ?>
</span>
<?php if($transacciones->hasPages()): ?>
<div class="flex items-center gap-1">
<?php if($transacciones->onFirstPage()): ?>
<span class="px-3 py-1.5 rounded-lg bg-surface-container-lowest text-outline font-label-md text-label-md flex items-center gap-1 shadow-sm opacity-60 cursor-not-allowed"><span class="material-symbols-outlined text-[16px]">chevron_left</span><span>Anterior</span></span>
<?php else: ?>
<a class="px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1 shadow-sm" href="<?php echo e($transacciones->previousPageUrl()); ?>"><span class="material-symbols-outlined text-[16px]">chevron_left</span><span>Anterior</span></a>
<?php endif; ?>
<span class="px-3 font-label-md text-label-md text-on-surface-variant">Página <?php echo e($transacciones->currentPage()); ?> de <?php echo e($transacciones->lastPage()); ?></span>
<?php if($transacciones->hasMorePages()): ?>
<a class="px-3 py-1.5 rounded-lg bg-surface-container-lowest hover:bg-surface-container-high text-on-surface font-label-md text-label-md transition-colors flex items-center gap-1 shadow-sm" href="<?php echo e($transacciones->nextPageUrl()); ?>"><span>Siguiente</span><span class="material-symbols-outlined text-[16px]">chevron_right</span></a>
<?php else: ?>
<span class="px-3 py-1.5 rounded-lg bg-surface-container-lowest text-outline font-label-md text-label-md flex items-center gap-1 shadow-sm opacity-60 cursor-not-allowed"><span>Siguiente</span><span class="material-symbols-outlined text-[16px]">chevron_right</span></span>
<?php endif; ?>
</div>
<?php endif; ?>
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
<form action="<?php echo e(route('transactions.store')); ?>" method="POST" class="p-space-xl overflow-y-auto flex flex-col gap-space-md" id="txForm">
<?php echo csrf_field(); ?>
<input id="txType" name="type" type="hidden" value="<?php echo e(old('type', 'expense')); ?>">
<input name="submission_token" type="hidden" value="<?php echo e(\Illuminate\Support\Str::uuid()); ?>">
<?php if($errors->any()): ?>
<div class="rounded-xl bg-error-container text-on-error-container px-space-md py-space-sm font-label-md text-label-md space-y-1">
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p><?php echo e($error); ?></p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php if($cuentas->isEmpty()): ?>
<div class="rounded-xl bg-tertiary-container/30 text-on-surface px-space-md py-space-sm font-label-md text-label-md flex items-center gap-2"><span class="material-symbols-outlined text-[18px]">info</span><span>Aún no tienes cuentas. <a class="font-bold underline" href="<?php echo e(route('accounts.index')); ?>">Crea una</a> para poder registrar transacciones.</span></div>
<?php endif; ?>
<!-- Transaction Type Switcher Tabs -->
<div class="grid grid-cols-2 gap-1 bg-surface-container-low p-1.5 rounded-2xl">
<button class="type-tab-btn py-2 px-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-1.5 transition-all bg-surface-container-lowest text-error shadow-sm font-bold" data-type="expense" type="button">
<span class="material-symbols-outlined text-[18px]">arrow_outward</span>
<span>Gasto</span>
</button>
<button class="type-tab-btn py-2 px-3 rounded-xl font-label-lg text-label-lg flex items-center justify-center gap-1.5 transition-all text-on-surface-variant hover:text-on-surface" data-type="income" type="button">
<span class="material-symbols-outlined text-[18px]">arrow_downward</span>
<span>Ingreso</span>
</button>

</div>
<!-- Prominent Amount Display & Input -->
<div class="flex flex-col items-center justify-center bg-surface-container-low/60 rounded-2xl p-space-md">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-outline mb-1">Importe de la Operación</span>
<div class="flex items-center justify-center gap-1 w-full">
<span class="font-display text-display text-outline font-bold">$</span>
<input class="w-48 bg-transparent text-center font-display text-display text-on-surface font-extrabold focus:outline-none placeholder:text-outline/40" name="amount" value="<?php echo e(old('amount')); ?>" min="0.01" max="9999999999.99" placeholder="0.00" required="" step="0.01" type="number"/>
<span class="font-headline-sm text-headline-sm text-outline font-semibold">USD</span>
</div>
</div>
<!-- Description Field -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Concepto o Establecimiento</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[20px]">storefront</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface placeholder:text-outline font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" name="description" value="<?php echo e(old('description')); ?>" maxlength="255" placeholder="Ej. Whole Foods Market, Netflix, Uber..." required="" type="text"/>
</div>
</div>
<!-- Category & Account (2 Columns) -->
<div class="grid grid-cols-1 sm:grid-cols-2 gap-space-sm">
<!-- Category Select -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Categoría</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">category</span>
<select class="w-full appearance-none pl-11 pr-8 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" id="txCategory" name="category_id" required>
<?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cat->id); ?>" data-type="<?php echo e($cat->type); ?>" <?php if((int) old('category_id') === $cat->id): echo 'selected'; endif; ?>><?php echo e($cat->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
<!-- Account Select -->
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Cuenta / Origen</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">credit_card</span>
<select class="w-full appearance-none pl-11 pr-8 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40 cursor-pointer" name="account_id" required>
<?php $__currentLoopData = $cuentas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuenta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<option value="<?php echo e($cuenta->id); ?>" <?php if((int) old('account_id') === $cuenta->id): echo 'selected'; endif; ?>><?php echo e($cuenta->name); ?> (<?php echo e($cuenta->currency); ?>)</option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<span class="material-symbols-outlined text-outline absolute right-2.5 top-1/2 -translate-y-1/2 text-[18px] pointer-events-none">expand_more</span>
</div>
</div>
</div>
<!-- Date & Time Row -->
<div class="grid grid-cols-1 gap-space-sm">
<div class="flex flex-col gap-1.5">
<label class="font-label-md text-label-md text-on-surface font-semibold">Fecha</label>
<div class="relative">
<span class="material-symbols-outlined text-outline absolute left-3.5 top-1/2 -translate-y-1/2 text-[18px]">today</span>
<input class="w-full pl-11 pr-4 py-2.5 bg-surface-container-low text-on-surface font-body-sm text-body-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/40" name="transaction_date" type="date" required max="<?php echo e(now()->toDateString()); ?>" value="<?php echo e(old('transaction_date', now()->toDateString())); ?>"/>
</div>
</div>

</div>
<!-- Modal Footer Actions -->
<div class="flex items-center justify-end gap-space-sm pt-space-sm border-t border-surface-container-low mt-2">
<button class="px-space-md py-2.5 rounded-xl font-label-lg text-label-lg text-on-surface-variant hover:text-on-surface hover:bg-surface-container-low transition-colors" id="cancelModalBtn" type="button">
            Cancelar
          </button>
<button class="px-space-lg py-2.5 rounded-xl font-label-lg text-label-lg bg-primary hover:bg-primary-container text-on-primary shadow-[0_6px_16px_rgba(0,105,72,0.25)] transition-all" id="txSubmit" type="submit" <?php if($cuentas->isEmpty()): echo 'disabled'; endif; ?>><span class="inline-flex items-center gap-2"><span class="material-symbols-outlined text-[18px] hidden animate-spin" id="txSubmitIcon">progress_activity</span><span id="txSubmitText">Guardar Transacción</span></span></button>
</div>
</form>
</div>
</div>
</div>
<script>
  // Menú de exportar
  const exportBtn = document.getElementById('exportBtn');
  const exportMenu = document.getElementById('exportMenu');
  exportBtn.addEventListener('click', (e) => { e.stopPropagation(); exportMenu.classList.toggle('hidden'); });
  document.addEventListener('click', () => { if (!exportMenu.classList.contains('hidden')) exportMenu.classList.add('hidden'); });

  // Ventana para registrar una transacción
  const newTxModal = document.getElementById('newTxModal');
  function openModal() { newTxModal.classList.remove('hidden'); }
  function closeModal() { newTxModal.classList.add('hidden'); }
  document.getElementById('openModalBtn').addEventListener('click', openModal);
  document.getElementById('closeModalBtn').addEventListener('click', closeModal);
  document.getElementById('cancelModalBtn').addEventListener('click', closeModal);
  newTxModal.addEventListener('click', (e) => { if (e.target === newTxModal) closeModal(); });

  // Tipo (gasto / ingreso): cambia el color de la pestaña y muestra solo las categorías de ese tipo
  const typeTabs = document.querySelectorAll('.type-tab-btn');
  const txType = document.getElementById('txType');
  const txCategory = document.getElementById('txCategory');

  function filtrarCategorias(tipo) {
    let elegida = txCategory.options[txCategory.selectedIndex];
    Array.from(txCategory.options).forEach((op) => {
      const coincide = op.dataset.type === tipo;
      op.hidden = !coincide;
      op.disabled = !coincide;
    });
    if (!elegida || elegida.disabled) {
      const primera = Array.from(txCategory.options).find((op) => !op.disabled);
      if (primera) txCategory.value = primera.value;
    }
  }

  typeTabs.forEach((tab) => {
    tab.addEventListener('click', () => {
      typeTabs.forEach((t) => {
        t.classList.remove('bg-surface-container-lowest', 'text-error', 'text-primary', 'shadow-sm', 'font-bold');
        t.classList.add('text-on-surface-variant');
      });
      tab.classList.remove('text-on-surface-variant');
      tab.classList.add('bg-surface-container-lowest', 'shadow-sm', 'font-bold');
      const tipo = tab.getAttribute('data-type');
      tab.classList.add(tipo === 'expense' ? 'text-error' : 'text-primary');
      txType.value = tipo;
      filtrarCategorias(tipo);
    });
  });

  const inicial = Array.from(typeTabs).find((t) => t.dataset.type === txType.value) || typeTabs[0];
  inicial.click();

  // Evita enviar el formulario dos veces (por ejemplo, si se pulsa el botón varias veces)
  const txForm = document.getElementById('txForm');
  const txSubmit = document.getElementById('txSubmit');
  let enviando = false;

  function restablecerBoton() {
    enviando = false;
    txSubmit.disabled = false;
    txSubmit.classList.remove('opacity-70', 'cursor-not-allowed');
    document.getElementById('txSubmitIcon').classList.add('hidden');
    document.getElementById('txSubmitText').textContent = 'Guardar Transacción';
  }

  txForm.addEventListener('submit', (e) => {
    if (enviando) { e.preventDefault(); return; }
    enviando = true;
    document.getElementById('txSubmitIcon').classList.remove('hidden');
    document.getElementById('txSubmitText').textContent = 'Guardando...';
    txSubmit.classList.add('opacity-70', 'cursor-not-allowed');
    setTimeout(() => { txSubmit.disabled = true; }, 0);
  });

  // Si se vuelve a esta página con el botón "atrás", el botón debe quedar activo otra vez
  window.addEventListener('pageshow', (e) => { if (e.persisted) restablecerBoton(); });

  // Se abre sola si hubo errores al guardar, o si se llegó desde el botón de la barra superior
  <?php if($errors->any()): ?>
  openModal();
  <?php endif; ?>
  if (new URLSearchParams(window.location.search).has('nueva')) openModal();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\User_uts\Documents\GitHub\Ahorro-Finanzas\Finanza\resources\views/transactions.blade.php ENDPATH**/ ?>