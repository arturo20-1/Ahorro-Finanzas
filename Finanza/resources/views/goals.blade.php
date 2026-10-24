@extends('layouts.app')

@section('title', 'Metas de Ahorro | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full pb-16 space-y-space-xl">
<!-- 1. Header Section -->
<div class="flex flex-col lg:flex-row lg:items-end justify-between gap-space-lg pt-space-md">
<div class="flex flex-col space-y-space-xs max-w-3xl">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-md text-label-md">
<a class="hover:text-primary transition-colors" href="#">Dashboard</a>
<span class="material-symbols-outlined text-[14px]">chevron_right</span>
<span class="text-primary font-bold">Metas de Ahorro</span>
</div>
<div class="inline-flex items-center gap-space-xs px-3 py-1 rounded-full bg-secondary-container/60 text-on-secondary-container w-fit mt-1">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
<span class="font-label-sm text-label-sm uppercase tracking-wider font-extrabold">Motor de Ahorro Inteligente Activo • Automatización habilitada</span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight mt-1">
        Metas de Ahorro
      </h1>
<p class="font-body-md text-body-md text-on-surface-variant leading-relaxed">
        Define tus objetivos financieros, automatiza tus aportes periódicos y visualiza en tiempo real tu avance hacia la libertad económica.
      </p>
</div>
<!-- Header Actions -->
<div class="flex flex-wrap items-center gap-space-sm self-start lg:self-end">
<!-- Status Tabs Switcher -->
<div class="flex items-center bg-surface-container-high/80 p-1 rounded-xl shadow-inner">
<button class="px-space-md py-1.5 font-label-md text-label-md rounded-lg bg-surface-container-lowest text-primary font-bold shadow-sm transition-all flex items-center gap-1" type="button">
<span>En Curso</span>
<span class="px-1.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container text-[10px]">4</span>
</button>
<button class="px-space-md py-1.5 font-label-md text-label-md rounded-lg text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-1" type="button">
<span>Completadas</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container-lowest text-on-surface-variant text-[10px]">2</span>
</button>
<button class="px-space-md py-1.5 font-label-md text-label-md rounded-lg text-on-surface-variant hover:text-on-surface transition-colors flex items-center gap-1" type="button">
<span>Pausadas</span>
<span class="px-1.5 py-0.5 rounded-full bg-surface-container-lowest text-on-surface-variant text-[10px]">1</span>
</button>
</div>
<!-- Auto Rules Secondary Button -->
<button class="flex items-center gap-space-xs bg-surface-container-lowest hover:bg-surface-container text-on-surface px-space-md py-2 rounded-xl font-label-lg text-label-lg transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px] text-primary">sync</span>
<span>Reglas de Aporte Automático</span>
</button>
<!-- Primary Action CTA -->
<button class="flex items-center gap-space-xs bg-primary hover:bg-primary-container text-on-primary px-space-lg py-2 rounded-xl font-label-lg text-label-lg transition-all shadow-[0_4px_16px_rgba(0,105,72,0.25)] hover:shadow-none hover:translate-y-px" type="button">
<span class="material-symbols-outlined text-[20px]">add_circle</span>
<span>Nueva Meta de Ahorro</span>
</button>
</div>
</div>
<!-- 2. Resumen General de Ahorro (3 KPIs) -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-space-md">
<!-- Card KPI 1 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -top-6 w-28 h-28 bg-primary/5 rounded-full pointer-events-none group-hover:scale-110 transition-transform"></div>
<div>
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Patrimonio Ahorrado Total</span>
<div class="w-9 h-9 rounded-xl bg-secondary-container flex items-center justify-center text-primary shadow-sm">
<span class="material-symbols-outlined text-[20px]">shield</span>
</div>
</div>
<div class="font-display text-display text-on-surface font-extrabold tracking-tight">
          $10,250<span class="text-headline-md font-semibold text-on-surface-variant">.00</span> <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">USD</span>
</div>
</div>
<div class="mt-space-md pt-space-sm flex items-center justify-between">
<div class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-secondary-container/70 text-on-secondary-container font-label-sm text-label-sm font-bold">
<span class="material-symbols-outlined text-[16px]">trending_up</span>
          +$650.00 aportados este mes
        </div>
<span class="material-symbols-outlined text-outline-variant text-[20px]">lock</span>
</div>
</div>
<!-- Card KPI 2 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-6 -top-6 w-28 h-28 bg-tertiary-fixed/30 rounded-full pointer-events-none group-hover:scale-110 transition-transform"></div>
<div>
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Objetivo Global Combinado</span>
<div class="w-9 h-9 rounded-xl bg-tertiary-fixed flex items-center justify-center text-tertiary shadow-sm">
<span class="material-symbols-outlined text-[20px]">flag</span>
</div>
</div>
<div class="font-display text-display text-on-surface font-extrabold tracking-tight">
          $14,000<span class="text-headline-md font-semibold text-on-surface-variant">.00</span> <span class="font-label-sm text-label-sm text-on-surface-variant font-normal">USD</span>
</div>
</div>
<div class="mt-space-md pt-space-sm flex flex-col text-on-surface-variant font-body-sm text-body-sm">
<span class="font-semibold text-on-surface">Planificado en 4 metas activas</span>
<span class="text-label-sm text-on-surface-variant">Faltan $3,750.00 para la culminación final</span>
</div>
</div>
<!-- Card KPI 3 -->
<div class="bg-surface-container-lowest p-space-lg rounded-2xl shadow-sm flex flex-col justify-between relative overflow-hidden group">
<div class="absolute -right-8 -top-8 w-32 h-32 bg-primary/10 rounded-full pointer-events-none group-hover:scale-110 transition-transform"></div>
<div>
<div class="flex items-center justify-between mb-space-sm">
<span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant font-bold">Progreso General del Portafolio</span>
<div class="w-9 h-9 rounded-xl bg-primary flex items-center justify-center text-on-primary shadow-sm">
<span class="material-symbols-outlined text-[20px]">auto_graph</span>
</div>
</div>
<div class="flex items-baseline gap-space-xs">
<span class="font-display text-display text-primary font-extrabold">73.2%</span>
<span class="font-label-lg text-label-lg text-on-surface font-semibold">Completado</span>
</div>
</div>
<!-- General Progress Bar -->
<div class="mt-space-md space-y-space-xs">
<div class="w-full h-3 bg-surface-container-high rounded-full overflow-hidden p-0.5">
<div class="h-full bg-primary rounded-full transition-all duration-1000 shadow-sm" style="width: 73.2%"></div>
</div>
<div class="flex items-center justify-between font-label-sm text-label-sm pt-1">
<span class="text-primary font-bold flex items-center gap-1">
<span class="material-symbols-outlined text-[14px]">speed</span>
            Ritmo óptimo (+4.8% sobre proyección)
          </span>
<span class="text-on-surface-variant">Meta: Nov 2025</span>
</div>
</div>
</div>
</div>
<!-- 3. Control & Filter Bar -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-space-md bg-surface-container-lowest p-space-md rounded-2xl shadow-sm">
<!-- Filter Pills -->
<div class="flex items-center gap-space-xs overflow-x-auto pb-1 md:pb-0 scrollbar-none">
<button class="px-space-md py-1.5 rounded-xl font-label-md text-label-md bg-primary text-on-primary whitespace-nowrap shadow-sm" type="button">
        Todas las Metas (4)
      </button>
<button class="px-space-md py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-low text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all whitespace-nowrap" type="button">
        Fondo de Respaldo
      </button>
<button class="px-space-md py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-low text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all whitespace-nowrap" type="button">
        Viajes &amp; Ocio
      </button>
<button class="px-space-md py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-low text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all whitespace-nowrap" type="button">
        Patrimonio &amp; Vivienda
      </button>
<button class="px-space-md py-1.5 rounded-xl font-label-md text-label-md bg-surface-container-low text-on-surface-variant hover:text-on-surface hover:bg-surface-container transition-all whitespace-nowrap" type="button">
        Tecnología
      </button>
</div>
<!-- Search & Ordering -->
<div class="flex items-center gap-space-sm w-full md:w-auto">
<div class="flex items-center bg-surface-container-low px-space-md py-1.5 rounded-xl flex-1 md:w-64 gap-space-xs">
<span class="material-symbols-outlined text-on-surface-variant text-[18px]">search</span>
<input class="bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none w-full" placeholder="Buscar objetivo por nombre..." type="text"/>
</div>
<div class="relative">
<select class="appearance-none bg-surface-container-low text-on-surface font-label-md text-label-md px-space-md py-2 pr-8 rounded-xl focus:outline-none cursor-pointer">
<option>Ordenar por: Mayor cercanía</option>
<option>Ordenar por: Fecha límite</option>
<option>Ordenar por: Mayor monto</option>
</select>
<span class="material-symbols-outlined text-on-surface-variant text-[18px] absolute right-2.5 top-2.5 pointer-events-none">expand_more</span>
</div>
</div>
</div>
<!-- 4. Cuadrícula de Tarjetas de Metas -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-space-lg">
<!-- Meta 1: Fondo de Emergencia -->
<div class="bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
<div class="space-y-space-md">
<!-- Top Tags & Icon -->
<div class="flex items-start justify-between">
<div class="w-12 h-12 rounded-2xl bg-secondary-container text-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[26px]">shield</span>
</div>
<div class="flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-error-container text-on-error-container font-label-sm text-label-sm font-bold uppercase tracking-wider">
              Prioridad Alta
            </span>
<span class="px-2.5 py-1 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-label-sm font-bold">
              En camino
            </span>
</div>
</div>
<!-- Info -->
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
            Fondo de Emergencia
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            Respaldo financiero para 6 meses de gastos fijos y básicos.
          </p>
</div>
<!-- Balance Metrics -->
<div class="p-space-md bg-surface-container-low rounded-2xl flex items-baseline justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Acumulado</span>
<span class="font-headline-md text-headline-md font-extrabold text-on-surface">$7,800<span class="text-body-md font-semibold text-on-surface-variant">.00</span></span>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Meta Final</span>
<span class="font-body-lg text-body-lg font-bold text-on-surface-variant">$10,000.00</span>
</div>
</div>
<!-- Progress Track -->
<div class="space-y-1.5">
<div class="flex justify-between items-center font-label-sm text-label-sm">
<span class="font-extrabold text-primary">78.0% completado</span>
<span class="text-on-surface-variant font-semibold">Faltan $2,200.00</span>
</div>
<div class="w-full h-3 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full transition-all duration-700" style="width: 78%"></div>
</div>
</div>
<!-- Badges & AI estimates -->
<div class="space-y-space-xs pt-1">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm p-2 rounded-xl bg-surface-container/60">
<span class="material-symbols-outlined text-[18px] text-primary">autorenew</span>
<span>Aporte automático de <strong class="text-on-surface font-semibold">$200.00 / quincena</strong> (Próx: 30 Mayo)</span>
</div>
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm px-2">
<span class="material-symbols-outlined text-[16px] text-tertiary">pace</span>
<span>A ritmo actual: Meta alcanzada en <strong>5.5 meses (Nov 2025)</strong></span>
</div>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
<button class="flex-1 py-2 px-space-md rounded-xl bg-secondary-container text-on-secondary-container hover:bg-primary hover:text-on-primary font-label-md text-label-md font-bold transition-all flex items-center justify-center gap-1 shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Abonar Fondos</span>
</button>
<button class="p-2 rounded-xl bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" title="Ajustar Meta" type="button">
<span class="material-symbols-outlined text-[20px]">tune</span>
</button>
</div>
</div>
<!-- Meta 2: Viaje a Japón -->
<div class="bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
<div class="space-y-space-md">
<!-- Top Tags & Icon -->
<div class="flex items-start justify-between">
<div class="w-12 h-12 rounded-2xl bg-tertiary-fixed text-tertiary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[26px]">flight_takeoff</span>
</div>
<div class="flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-tertiary-fixed/60 text-on-tertiary-fixed-variant font-label-sm text-label-sm font-bold uppercase tracking-wider">
              Objetivo Agosto 2025
            </span>
<span class="px-2.5 py-1 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-label-sm font-bold">
              Ritmo Óptimo
            </span>
</div>
</div>
<!-- Info -->
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
            Viaje a Japón
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            Boletos aéreos, hospedaje ryokan y pase Shinkansen Tokio-Kioto.
          </p>
</div>
<!-- Balance Metrics -->
<div class="p-space-md bg-surface-container-low rounded-2xl flex items-baseline justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Acumulado</span>
<span class="font-headline-md text-headline-md font-extrabold text-on-surface">$2,450<span class="text-body-md font-semibold text-on-surface-variant">.00</span></span>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Meta Final</span>
<span class="font-body-lg text-body-lg font-bold text-on-surface-variant">$4,000.00</span>
</div>
</div>
<!-- Progress Track -->
<div class="space-y-1.5">
<div class="flex justify-between items-center font-label-sm text-label-sm">
<span class="font-extrabold text-primary">61.2% completado</span>
<span class="text-on-surface-variant font-semibold">Faltan $1,550.00</span>
</div>
<div class="w-full h-3 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-secondary rounded-full transition-all duration-700" style="width: 61.2%"></div>
</div>
</div>
<!-- Badges & AI estimates -->
<div class="space-y-space-xs pt-1">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm p-2 rounded-xl bg-surface-container/60">
<span class="material-symbols-outlined text-[18px] text-tertiary">calendar_month</span>
<span>Aporte mensual de <strong class="text-on-surface font-semibold">$350.00</strong> desde Nómina</span>
</div>
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm px-2">
<span class="material-symbols-outlined text-[16px] text-primary">verified</span>
<span>Meta prevista: Ago 2025 — <strong class="text-primary font-bold">+2 semanas adelantado</strong></span>
</div>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
<button class="flex-1 py-2 px-space-md rounded-xl bg-secondary-container text-on-secondary-container hover:bg-primary hover:text-on-primary font-label-md text-label-md font-bold transition-all flex items-center justify-center gap-1 shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Abonar Fondos</span>
</button>
<button class="p-2 rounded-xl bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" title="Ajustar Meta" type="button">
<span class="material-symbols-outlined text-[20px]">tune</span>
</button>
</div>
</div>
<!-- Meta 3: Entrada para Apartamento -->
<div class="bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
<div class="space-y-space-md">
<!-- Top Tags & Icon -->
<div class="flex items-start justify-between">
<div class="w-12 h-12 rounded-2xl bg-surface-container-high text-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[26px]">apartment</span>
</div>
<div class="flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-high text-on-surface font-label-sm text-label-sm font-bold uppercase tracking-wider">
              Largo Plazo
            </span>
<span class="px-2.5 py-1 rounded-full bg-secondary-container/80 text-on-secondary-container font-label-sm text-label-sm font-bold">
              Activa
            </span>
</div>
</div>
<!-- Info -->
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
            Inicial Apartamento Propio
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            Ahorro de capital e inversión en bienes raíces con rendimiento compuesto.
          </p>
</div>
<!-- Balance Metrics -->
<div class="p-space-md bg-surface-container-low rounded-2xl flex items-baseline justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Acumulado</span>
<span class="font-headline-md text-headline-md font-extrabold text-on-surface">$15,600<span class="text-body-md font-semibold text-on-surface-variant">.00</span></span>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Meta Final</span>
<span class="font-body-lg text-body-lg font-bold text-on-surface-variant">$25,000.00</span>
</div>
</div>
<!-- Progress Track -->
<div class="space-y-1.5">
<div class="flex justify-between items-center font-label-sm text-label-sm">
<span class="font-extrabold text-primary">62.4% completado</span>
<span class="text-on-surface-variant font-semibold">Faltan $9,400.00</span>
</div>
<div class="w-full h-3 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary rounded-full transition-all duration-700" style="width: 62.4%"></div>
</div>
</div>
<!-- Badges & AI estimates -->
<div class="space-y-space-xs pt-1">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm p-2 rounded-xl bg-surface-container/60">
<span class="material-symbols-outlined text-[18px] text-primary">trending_up</span>
<span>Rendimientos reinvertidos automáticamente (Fondo indexado)</span>
</div>
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm px-2">
<span class="material-symbols-outlined text-[16px] text-on-surface-variant">event</span>
<span>Proyección estimada: <strong>Mayo 2027</strong></span>
</div>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
<button class="flex-1 py-2 px-space-md rounded-xl bg-secondary-container text-on-secondary-container hover:bg-primary hover:text-on-primary font-label-md text-label-md font-bold transition-all flex items-center justify-center gap-1 shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Abonar Fondos</span>
</button>
<button class="p-2 rounded-xl bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" title="Ajustar Meta" type="button">
<span class="material-symbols-outlined text-[20px]">tune</span>
</button>
</div>
</div>
<!-- Meta 4: Renovación MacBook Pro & Estudio -->
<div class="bg-surface-container-lowest rounded-3xl p-space-lg shadow-sm hover:shadow-md transition-all flex flex-col justify-between group relative overflow-hidden">
<div class="space-y-space-md">
<!-- Top Tags & Icon -->
<div class="flex items-start justify-between">
<div class="w-12 h-12 rounded-2xl bg-surface-container-highest text-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[26px]">laptop_mac</span>
</div>
<div class="flex items-center gap-1.5">
<span class="px-2.5 py-1 rounded-full bg-surface-container-highest text-on-surface font-label-sm text-label-sm font-bold uppercase tracking-wider">
              Corto Plazo
            </span>
<span class="px-2.5 py-1 rounded-full bg-secondary-container text-primary font-label-sm text-label-sm font-bold">
              Casi lista
            </span>
</div>
</div>
<!-- Info -->
<div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
            Equipo de Trabajo &amp; Tech
          </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant mt-0.5">
            MacBook Pro M4 Max + Monitor 4K para estación de trabajo profesional.
          </p>
</div>
<!-- Balance Metrics -->
<div class="p-space-md bg-surface-container-low rounded-2xl flex items-baseline justify-between">
<div>
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Acumulado</span>
<span class="font-headline-md text-headline-md font-extrabold text-on-surface">$2,850<span class="text-body-md font-semibold text-on-surface-variant">.00</span></span>
</div>
<div class="text-right">
<span class="font-label-sm text-label-sm text-on-surface-variant block uppercase font-bold">Meta Final</span>
<span class="font-body-lg text-body-lg font-bold text-on-surface-variant">$3,200.00</span>
</div>
</div>
<!-- Progress Track -->
<div class="space-y-1.5">
<div class="flex justify-between items-center font-label-sm text-label-sm">
<span class="font-extrabold text-primary flex items-center gap-1">
<span>89.0%</span>
<span class="px-1.5 py-0.5 rounded bg-primary/10 text-primary text-[10px]">¡A solo $350.00!</span>
</span>
<span class="text-on-surface-variant font-semibold">Faltan $350.00</span>
</div>
<div class="w-full h-3 bg-surface-container rounded-full overflow-hidden">
<div class="h-full bg-primary-container rounded-full transition-all duration-700" style="width: 89%"></div>
</div>
</div>
<!-- Badges & AI estimates -->
<div class="space-y-space-xs pt-1">
<div class="flex items-center gap-space-xs text-on-surface-variant font-label-sm text-label-sm p-2 rounded-xl bg-surface-container/60">
<span class="material-symbols-outlined text-[18px] text-on-surface-variant">touch_app</span>
<span>Aporte manual recurrente</span>
</div>
<div class="flex items-center gap-space-xs text-on-surface font-label-sm text-label-sm px-2">
<span class="material-symbols-outlined text-[16px] text-primary">done_all</span>
<span>Se completará en la <strong>próxima quincena</strong></span>
</div>
</div>
</div>
<!-- Action Buttons -->
<div class="flex items-center gap-space-sm pt-space-lg mt-space-md">
<button class="flex-1 py-2 px-space-md rounded-xl bg-secondary-container text-on-secondary-container hover:bg-primary hover:text-on-primary font-label-md text-label-md font-bold transition-all flex items-center justify-center gap-1 shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">add</span>
<span>Abonar Fondos</span>
</button>
<button class="p-2 rounded-xl bg-surface-container text-on-surface-variant hover:text-on-surface hover:bg-surface-container-high transition-colors" title="Ajustar Meta" type="button">
<span class="material-symbols-outlined text-[20px]">tune</span>
</button>
</div>
</div>
<!-- Meta 5: Card Crear Nueva Meta -->
<div class="border-2 border-dashed border-outline-variant/60 hover:border-primary rounded-3xl p-space-lg flex flex-col justify-between items-center text-center group cursor-pointer transition-all bg-surface-container-low/40 hover:bg-surface-container-lowest">
<div class="flex flex-col items-center my-auto py-6 space-y-space-sm">
<div class="w-16 h-16 rounded-2xl bg-surface-container-lowest group-hover:bg-primary text-primary group-hover:text-on-primary flex items-center justify-center transition-all shadow-sm group-hover:scale-110">
<span class="material-symbols-outlined text-[32px]">add</span>
</div>
<h3 class="font-headline-sm text-headline-sm text-on-surface font-bold group-hover:text-primary transition-colors">
          Crear Nuevo Objetivo
        </h3>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs">
          Establece metas para vacaciones, vehículo, retiro o inversiones con cálculo automático de esfuerzo mensual.
        </p>
</div>
<button class="w-full py-2.5 px-space-md rounded-xl bg-surface-container-highest group-hover:bg-primary text-on-surface group-hover:text-on-primary font-label-lg text-label-lg font-bold transition-all flex items-center justify-center gap-2" type="button">
<span>Comenzar configuración</span>
<span class="material-symbols-outlined text-[18px]">arrow_forward</span>
</button>
</div>
</div>
<!-- 5. Banner de Recomendaciones e Inteligencia Artificial (IA de Ahorro) -->
<div class="bg-gradient-to-r from-primary via-primary-container to-secondary text-on-primary rounded-3xl p-space-lg md:p-space-xl shadow-xl relative overflow-hidden">
<!-- Decorative background ambient glow -->
<div class="absolute -right-16 -bottom-16 w-80 h-80 bg-inverse-primary/20 rounded-full blur-3xl pointer-events-none"></div>
<div class="absolute left-1/3 -top-20 w-64 h-64 bg-tertiary-fixed/15 rounded-full blur-2xl pointer-events-none"></div>
<div class="relative z-10 flex flex-col lg:flex-row items-start lg:items-center justify-between gap-space-lg">
<div class="flex items-start gap-space-md max-w-3xl">
<div class="w-12 h-12 rounded-2xl bg-on-primary/15 backdrop-blur-md flex items-center justify-center shrink-0 shadow-inner">
<span class="material-symbols-outlined text-[28px] text-primary-fixed" style="font-variation-settings: 'FILL' 1;">auto_awesome</span>
</div>
<div class="space-y-space-xs">
<div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-on-primary/10 text-primary-fixed font-label-sm text-label-sm font-extrabold uppercase tracking-wider backdrop-blur-sm">
<span>Diagnóstico Predictivo de IA</span>
</div>
<h2 class="font-headline-md text-headline-md text-on-primary font-bold">
            Optimiza tu velocidad de ahorro este mes
          </h2>
<p class="font-body-md text-body-md text-on-primary-container leading-relaxed">
            Si rediriges el <strong class="text-on-primary">10% de tu excedente</strong> proyectado en Presupuestos (<strong class="text-on-primary">$380.00 USD</strong>) directamente al <strong class="text-primary-fixed font-bold">Fondo de Emergencia</strong>, alcanzarás tu meta <strong class="text-on-primary underline decoration-primary-fixed">2 semanas antes</strong> de lo previsto y asegurarás tu respaldo financiero sin afectar tu estilo de vida.
          </p>
</div>
</div>
<!-- Action Buttons inside AI Banner -->
<div class="flex flex-col sm:flex-row lg:flex-col xl:flex-row items-stretch sm:items-center gap-space-sm shrink-0 w-full lg:w-auto">
<button class="px-space-lg py-3 rounded-xl bg-surface-container-lowest text-primary hover:bg-surface-container-low font-label-lg text-label-lg font-bold transition-all shadow-md flex items-center justify-center gap-2" type="button">
<span class="material-symbols-outlined text-[20px]">bolt</span>
<span>Aplicar transferencia ($380.00)</span>
</button>
<button class="px-space-md py-3 rounded-xl bg-on-primary/10 hover:bg-on-primary/20 text-on-primary font-label-md text-label-md font-semibold backdrop-blur-sm transition-all flex items-center justify-center gap-1" type="button">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span>Regla de redondeo</span>
</button>
<button class="px-space-sm py-2 text-on-primary/70 hover:text-on-primary font-label-sm text-label-sm transition-colors text-center" type="button">
          Descartar
        </button>
</div>
</div>
</div>
</div>
@endsection
