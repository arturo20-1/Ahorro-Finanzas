@extends('layouts.app')

@section('title', 'Configuraci&oacute;n | Finanzas &amp; Ahorro')

@section('content')
<div class="flex flex-col w-full">
<div class="flex flex-col gap-8 pb-20 max-w-7xl mx-auto w-full">
<!-- Breadcrumb & Main Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 pt-4">
<div class="flex flex-col gap-2.5">
<div class="flex flex-wrap items-center gap-3">
<div class="flex items-center gap-1.5 font-label-md text-label-md text-on-surface-variant">
<span class="">Dashboard</span>
<span class="material-symbols-outlined text-[16px] text-outline">chevron_right</span>
<span class="text-primary font-bold">Configuración de la Cuenta</span>
</div>
<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold shadow-sm">
<span class="w-2 h-2 rounded-full bg-primary animate-pulse"></span>
            Centro de Seguridad y Preferencias Activo • Cifrado AES-256
          </span>
</div>
<h1 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Configuración de la Cuenta</h1>
<p class="font-body-md text-body-md text-on-surface-variant max-w-2xl">
          Administra la información de tu perfil, preferencias de moneda, alertas de seguridad y notificaciones.
        </p>
</div>
<div class="flex items-center gap-3 self-start md:self-auto">
<button class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-surface-container text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface transition-all font-label-lg text-label-lg font-bold shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px]">cloud_download</span>
<span class="">Descargar Backup de Datos</span>
</button>
<button class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary text-on-primary hover:bg-primary-container transition-all font-label-lg text-label-lg font-bold shadow-md shadow-primary/20" type="button">
<span class="material-symbols-outlined text-[18px]">check_circle</span>
<span class="">Guardar Cambios</span>
</button>
</div>
</div>
<!-- Navigation Tabs -->
<div class="flex items-center gap-2 p-1.5 rounded-2xl bg-surface-container-low overflow-x-auto shadow-inner">
<a class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-surface-container-lowest text-primary font-label-lg text-label-lg font-bold shadow-sm whitespace-nowrap transition-all" href="#perfil">
<span class="material-symbols-outlined text-[20px]" style="font-variation-settings: 'FILL' 1;">person</span>
<span class="">Perfil de Usuario</span>
</a>
<a class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container whitespace-nowrap font-label-lg text-label-lg transition-all" href="#preferencias">
<span class="material-symbols-outlined text-[20px]">currency_exchange</span>
<span class="">Preferencias Financieras</span>
</a>
<a class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container whitespace-nowrap font-label-lg text-label-lg transition-all" href="#seguridad">
<span class="material-symbols-outlined text-[20px]">shield</span>
<span class="">Seguridad &amp; 2FA</span>
<span class="inline-flex items-center px-1.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-[10px] font-bold">Protegido</span>
</a>
<a class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container whitespace-nowrap font-label-lg text-label-lg transition-all" href="#notificaciones">
<span class="material-symbols-outlined text-[20px]">notifications_active</span>
<span class="">Notificaciones</span>
</a>
<a class="flex items-center gap-2.5 px-4 py-2.5 rounded-xl text-on-surface-variant hover:text-on-surface hover:bg-surface-container whitespace-nowrap font-label-lg text-label-lg transition-all ml-auto" href="#suscripcion">
<span class="material-symbols-outlined text-[20px] text-tertiary">workspace_premium</span>
<span class="">Suscripción &amp; Plan</span>
<span class="inline-flex items-center px-2 py-0.5 rounded-full bg-tertiary-fixed text-on-tertiary-fixed font-label-sm text-[10px] font-bold">Plan Pro Anual</span>
</a>
</div>
<!-- MAIN CONFIGURATION CONTENT -->
<div class="flex flex-col gap-8">
<!-- BLOQUE A: Perfil de Usuario -->
<section class="p-6 md:p-8 rounded-3xl bg-surface-container-lowest shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04),0_2px_6px_-1px_rgba(15,23,42,0.02)] flex flex-col gap-8" id="perfil">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-surface-container">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-2xl bg-secondary-container text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">badge</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Información Personal y Perfil Público</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Detalles visibles en tus transacciones colaborativas y reportes auditados.</p>
</div>
</div>
<span class="self-start md:self-auto px-3 py-1 rounded-full bg-surface-container font-label-sm text-label-sm text-on-surface-variant font-semibold">ID: USR-89240-VEN</span>
</div>
<!-- Avatar Area -->
<div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 p-6 rounded-2xl bg-surface-container-low">
<div class="relative group">
<div class="w-24 h-24 rounded-full bg-gradient-to-br from-primary via-primary-container to-secondary text-on-primary flex items-center justify-center font-headline-md text-headline-md font-extrabold shadow-lg shadow-primary/25 ring-4 ring-secondary-container">
              AG
            </div>
<div class="absolute bottom-0 right-0 w-7 h-7 rounded-full bg-primary text-on-primary flex items-center justify-center shadow-md">
<span class="material-symbols-outlined text-[16px]">verified</span>
</div>
</div>
<div class="flex flex-col gap-2 items-center sm:items-start text-center sm:text-left flex-1">
<div class="flex items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface">Arturo Gómez</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold">Verificado</span>
</div>
<p class="font-body-sm text-body-sm text-outline">JPG, PNG o WebP hasta 5MB. Recomendado 400x400 px.</p>
<div class="flex flex-wrap items-center gap-3 mt-2">
<button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-primary text-on-primary hover:bg-primary-container font-label-md text-label-md font-bold transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-[16px]">photo_camera</span>
<span class="">Cambiar Fotografía</span>
</button>
<button class="flex items-center gap-2 px-4 py-2 rounded-xl bg-surface-container text-on-surface-variant hover:text-error hover:bg-error-container font-label-md text-label-md font-bold transition-all" type="button">
<span class="material-symbols-outlined text-[16px]">delete</span>
<span class="">Eliminar foto</span>
</button>
</div>
</div>
</div>
<!-- Personal Info Form -->
<form class="grid grid-cols-1 md:grid-cols-2 gap-6">
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">person</span>
<span class="">Nombre Completo</span>
</label>
<div class="flex items-center px-4 py-3 rounded-xl bg-surface-container-lowest shadow-sm hover:shadow transition-all focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)] bg-surface-container-low/60">
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="text" value="Arturo Gómez">
</div>
</div>
<div class="flex flex-col gap-2">
<div class="flex items-center justify-between">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">mail</span>
<span class="">Correo Electrónico</span>
</label>
<span class="inline-flex items-center gap-1 font-label-sm text-label-sm font-bold text-primary">
<span class="material-symbols-outlined text-[14px]">check_circle</span> Email Verificado
              </span>
</div>
<div class="flex items-center px-4 py-3 rounded-xl bg-surface-container-low/60 shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="email" value="arturo@ejemplo.com">
</div>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">call</span>
<span class="">Teléfono / WhatsApp</span>
</label>
<div class="flex items-center gap-2 px-4 py-3 rounded-xl bg-surface-container-low/60 shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<span class="font-body-md text-body-md text-on-surface-variant font-bold flex items-center gap-1">
<span class="">🇻🇪</span> +58
              </span>
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="text" value="412-9876543">
</div>
<span class="font-label-sm text-label-sm text-outline">Utilizado para alertas de transacciones sospechosas y 2FA.</span>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">work</span>
<span class="">Ocupación o Sector Financiero</span>
</label>
<div class="flex items-center px-4 py-3 rounded-xl bg-surface-container-low/60 shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="text" value="Consultoría Tecnológica &amp; FinTech">
</div>
</div>
<div class="flex flex-col gap-2 md:col-span-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">description</span>
<span class="">Biografía Financiera / Notas</span>
</label>
<div class="flex items-start px-4 py-3 rounded-xl bg-surface-container-low/60 shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<textarea class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium resize-none" rows="2">Gestión activa de portafolios personales y metas de ahorro a mediano plazo.</textarea>
</div>
</div>
</form>
<div class="flex justify-end pt-2">
<button class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg font-bold transition-all shadow-md shadow-primary/20" type="button">
<span class="material-symbols-outlined text-[18px]">save</span>
<span class="">Guardar Cambios de Perfil</span>
</button>
</div>
</section>
<!-- BLOQUE B: Preferencias Financieras & Regionales -->
<section class="p-6 md:p-8 rounded-3xl bg-surface-container-lowest shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04),0_2px_6px_-1px_rgba(15,23,42,0.02)] flex flex-col gap-8" id="preferencias">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-surface-container">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-2xl bg-secondary-container text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">account_balance_wallet</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Moneda, Cómputo Presupuestario y Región</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Configura las directrices analíticas y la conversión de divisas en tiempo real.</p>
</div>
</div>
<span class="self-start md:self-auto px-3 py-1 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold flex items-center gap-1.5">
<span class="material-symbols-outlined text-[16px]">sync</span>
            Tipo de Cambio Oficial Activo
          </span>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Moneda Principal -->
<div class="flex flex-col gap-2 p-5 rounded-2xl bg-surface-container-low/70">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center justify-between">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">attach_money</span>
                Moneda Principal del Sistema
              </span>
<span class="text-primary font-label-sm text-label-sm font-bold">Base Contable</span>
</label>
<div class="relative flex items-center mt-1">
<select class="w-full appearance-none px-4 py-3 rounded-xl bg-surface-container-lowest text-on-surface font-body-md text-body-md font-semibold shadow-sm outline-none cursor-pointer">
<option selected="">USD ($) - Dólar Estadounidense</option>
<option>EUR (€) - Euro</option>
<option>VES (Bs.) - Bolívar Digital</option>
<option>GBP (£) - Libra Esterlina</option>
<option>MXN ($) - Peso Mexicano</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-3 pointer-events-none text-[20px]">expand_more</span>
</div>
<p class="font-body-sm text-body-sm text-outline mt-1 leading-relaxed">
              Todas tus estadísticas, balances consolidados y gráficos se calcularán y consolidarán en esta divisa base.
            </p>
</div>
<!-- Moneda Secundaria -->
<div class="flex flex-col gap-2 p-5 rounded-2xl bg-surface-container-low/70">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center justify-between">
<span class="flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-tertiary">payments</span>
                Moneda Secundaria de Referencia
              </span>
<span class="text-tertiary font-label-sm text-label-sm font-bold">Conversión Dual</span>
</label>
<div class="relative flex items-center mt-1">
<select class="w-full appearance-none px-4 py-3 rounded-xl bg-surface-container-lowest text-on-surface font-body-md text-body-md font-semibold shadow-sm outline-none cursor-pointer">
<option selected="">VES (Bs.) - Tasa Oficial BCV</option>
<option>EUR (€) - Tasa Central BCE</option>
<option>USDT (₮) - Mercado P2P Cripto</option>
<option>COP ($) - Peso Colombiano</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-3 pointer-events-none text-[20px]">expand_more</span>
</div>
<p class="font-body-sm text-body-sm text-outline mt-1 leading-relaxed">
              Permite visualizar tarjetas auxiliares y recibos con contravalor actualizado automáticamente.
            </p>
</div>
<!-- Formato de Fecha y Hora -->
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">schedule</span>
<span class="">Formato de Fecha y Hora</span>
</label>
<div class="relative flex items-center">
<select class="w-full appearance-none px-4 py-3 rounded-xl bg-surface-container-low/60 text-on-surface font-body-md text-body-md font-medium shadow-sm outline-none cursor-pointer">
<option selected="">DD/MM/AAAA (ej. 28/05/2025) • Formato 12 horas (AM/PM)</option>
<option>AAAA-MM-DD (ej. 2025-05-28) • Formato 24 horas (ISO)</option>
<option>MM/DD/AAAA (ej. 05/28/2025) • Formato 12 horas (AM/PM)</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-3 pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
<!-- Separador de Miles -->
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-outline">pin</span>
<span class="">Separador de Miles y Decimales</span>
</label>
<div class="relative flex items-center">
<select class="w-full appearance-none px-4 py-3 rounded-xl bg-surface-container-low/60 text-on-surface font-body-md text-body-md font-medium shadow-sm outline-none cursor-pointer">
<option selected="">1,234.56 (Coma miles, punto decimal)</option>
<option>1.234,56 (Punto miles, coma decimal)</option>
<option>1 234,56 (Espacio miles, coma decimal)</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-3 pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
<!-- Inicio de Mes Financiero -->
<div class="flex flex-col gap-2 md:col-span-2 p-5 rounded-2xl bg-surface-container-low/70">
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
<div class="flex flex-col gap-1">
<span class="font-label-lg text-label-lg text-on-surface font-semibold flex items-center gap-2">
<span class="material-symbols-outlined text-[18px] text-primary">event_repeat</span>
                  Inicio de Ciclo Financiero y Presupuestos
                </span>
<p class="font-body-sm text-body-sm text-on-surface-variant">
                  Tus presupuestos mensuales y metas se reiniciarán y evaluarán a partir de esta fecha fija.
                </p>
</div>
<div class="relative min-w-[200px]">
<select class="w-full appearance-none px-4 py-2.5 rounded-xl bg-surface-container-lowest text-on-surface font-body-md text-body-md font-bold shadow-sm outline-none cursor-pointer">
<option selected="">Día 1 del mes</option>
<option>Día 5 del mes</option>
<option>Día 15 del mes (Quincena)</option>
<option>Día 25 del mes</option>
<option>Último día hábil del mes</option>
</select>
<span class="material-symbols-outlined text-outline absolute right-3 top-2.5 pointer-events-none text-[20px]">expand_more</span>
</div>
</div>
</div>
</div>
<!-- Toggle Switch Card -->
<div class="flex items-center justify-between p-4 px-5 rounded-2xl bg-secondary-container/40">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-secondary-container text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[22px]">trending_up</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Ajuste por Inflación Automático en Reportes</span>
<span class="font-body-sm text-body-sm text-on-surface-variant">Normaliza gráficas históricas de patrimonio según el IPC interanual.</span>
</div>
</div>
<label class="relative inline-flex items-center cursor-pointer">
<input checked="" class="sr-only peer" type="checkbox">
<div class="w-14 h-8 bg-surface-container rounded-full peer peer-checked:after:translate-x-6 peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary shadow-inner"></div>
</label>
</div>
<div class="flex justify-end pt-2">
<button class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg font-bold transition-all shadow-md shadow-primary/20" type="button">
<span class="material-symbols-outlined text-[18px]">tune</span>
<span class="">Actualizar Preferencias Financieras</span>
</button>
</div>
</section>
<!-- BLOQUE C: Seguridad, Accesos & 2FA -->
<section class="p-6 md:p-8 rounded-3xl bg-surface-container-lowest shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04),0_2px_6px_-1px_rgba(15,23,42,0.02)] flex flex-col gap-8" id="seguridad">
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 pb-6 border-b border-surface-container">
<div class="flex items-center gap-3">
<div class="w-12 h-12 rounded-2xl bg-secondary-container text-primary flex items-center justify-center">
<span class="material-symbols-outlined text-[26px]">lock</span>
</div>
<div class="flex flex-col">
<h2 class="font-headline-sm text-headline-sm text-on-surface">Seguridad de la Cuenta y Accesos</h2>
<p class="font-body-sm text-body-sm text-on-surface-variant">Protección perimetral de tus credenciales y dispositivos autorizados.</p>
</div>
</div>
<span class="self-start md:self-auto px-3.5 py-1.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold flex items-center gap-1.5 shadow-sm">
<span class="material-symbols-outlined text-[16px]">verified_user</span>
            Grado Bancario SOC2 Tipo II
          </span>
</div>
<!-- 1. Cambiar Contraseña -->
<div class="flex flex-col gap-4 p-6 rounded-2xl bg-surface-container-low/60">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-primary text-[20px]">key</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Cambiar Contraseña</span>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-5">
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold">Contraseña Actual</label>
<div class="flex items-center px-4 py-3 rounded-xl bg-surface-container-lowest shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="password" value="••••••••••••••••">
<span class="material-symbols-outlined text-outline cursor-pointer text-[18px] hover:text-on-surface">visibility</span>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold">Nueva Contraseña</label>
<div class="flex items-center px-4 py-3 rounded-xl bg-surface-container-lowest shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="password" value="K9$mP2#9zLq!4x">
<span class="material-symbols-outlined text-outline cursor-pointer text-[18px] hover:text-on-surface">visibility</span>
</div>
</div>
<div class="flex flex-col gap-2">
<label class="font-label-lg text-label-lg text-on-surface font-semibold">Confirmar Nueva Contraseña</label>
<div class="flex items-center px-4 py-3 rounded-xl bg-surface-container-lowest shadow-sm focus-within:shadow-[0_0_0_2px_rgba(0,105,72,0.3)]">
<input class="w-full bg-transparent border-none outline-none font-body-md text-body-md text-on-surface font-medium" type="password" value="K9$mP2#9zLq!4x">
<span class="material-symbols-outlined text-outline cursor-pointer text-[18px] hover:text-on-surface">visibility</span>
</div>
</div>
</div>
<!-- Password Strength Meter -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 p-4 rounded-xl bg-surface-container-lowest shadow-sm mt-1">
<div class="flex flex-col gap-1.5 flex-1 max-w-md">
<div class="flex items-center justify-between font-label-sm text-label-sm">
<span class="text-on-surface-variant font-semibold">Fuerza: <strong class="text-primary font-bold">Muy Segura</strong> (14 caracteres)</span>
<span class="text-primary font-bold">100%</span>
</div>
<div class="grid grid-cols-4 gap-1.5 h-2">
<div class="rounded-full bg-primary h-full"></div>
<div class="rounded-full bg-primary h-full"></div>
<div class="rounded-full bg-primary h-full"></div>
<div class="rounded-full bg-primary h-full"></div>
</div>
</div>
<button class="self-start sm:self-auto px-4 py-2 rounded-xl bg-surface-container-high hover:bg-surface-container text-on-surface font-label-md text-label-md font-bold transition-all shadow-sm" type="button">
              Actualizar Contraseña
            </button>
</div>
</div>
<!-- 2. Autenticación en Dos Pasos (2FA) -->
<div class="p-6 rounded-2xl bg-secondary-container/30 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
<div class="flex items-start gap-4">
<div class="w-12 h-12 rounded-2xl bg-primary text-on-primary flex items-center justify-center shrink-0 shadow-md shadow-primary/25">
<span class="material-symbols-outlined text-[24px]">phonelink_lock</span>
</div>
<div class="flex flex-col gap-1.5">
<div class="flex flex-wrap items-center gap-2">
<span class="font-headline-sm text-headline-sm text-on-surface">Autenticación en Dos Pasos (2FA)</span>
<span class="px-2.5 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-label-sm font-bold flex items-center gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                  Activado (Google Authenticator)
                </span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant max-w-xl">
                Se requiere un código dinámico de 6 dígitos de tu app de autenticación para iniciar sesión o autorizar transferencias de alto valor.
              </p>
</div>
</div>
<div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 shrink-0 w-full md:w-auto">
<button class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-surface-container-lowest text-on-surface font-label-md text-label-md font-bold hover:bg-surface-container transition-all shadow-sm" type="button">
<span class="material-symbols-outlined text-[18px] text-tertiary">key_vertical</span>
<span class="">Códigos de Respaldo (8 disp.)</span>
</button>
<button class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-primary text-on-primary font-label-md text-label-md font-bold hover:bg-primary-container transition-all shadow-md shadow-primary/20" type="button">
<span class="material-symbols-outlined text-[18px]">usb</span>
<span class="">Configurar Llave FIDO / YubiKey</span>
</button>
</div>
</div>
<!-- 3. Sesiones Activas y Dispositivos -->
<div class="flex flex-col gap-4">
<div class="flex items-center justify-between">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-outline text-[20px]">devices</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Sesiones Activas y Dispositivos</span>
</div>
<button class="text-error font-label-md text-label-md font-bold hover:underline flex items-center gap-1" type="button">
<span class="material-symbols-outlined text-[16px]">logout</span>
              Cerrar Todas las Demás Sesiones
            </button>
</div>
<div class="flex flex-col gap-3">
<!-- Dispositivo 1 -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-2xl bg-surface-container-low">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-xl bg-surface-container-lowest text-primary flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[22px]">laptop_mac</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">MacBook Pro 16" (M3 Max)</span>
<span class="px-2 py-0.5 rounded-full bg-secondary-container text-on-secondary-container font-label-sm text-[10px] font-bold animate-pulse">Sesión Actual</span>
</div>
<span class="font-body-sm text-body-sm text-outline">Chrome v124 • Caracas, Venezuela • IP: 190.205.112.44</span>
</div>
</div>
<div class="flex items-center gap-2 self-end sm:self-auto">
<span class="font-label-sm text-label-sm text-primary font-bold">En Línea Ahora</span>
</div>
</div>
<!-- Dispositivo 2 -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-2xl bg-surface-container-low">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface-variant flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[22px]">smartphone</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">iPhone 15 Pro Max</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-[10px] font-semibold">App my money iOS</span>
</div>
<span class="font-body-sm text-body-sm text-outline">iOS 17.5 • Caracas, Venezuela • IP: 190.205.88.19</span>
</div>
</div>
<div class="flex items-center gap-3 self-end sm:self-auto">
<span class="font-label-sm text-label-sm text-outline">Activo hace 12 min</span>
<button class="p-1.5 rounded-lg hover:bg-surface-container-high text-on-surface-variant transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">close</span>
</button>
</div>
</div>
<!-- Dispositivo 3 -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-4 rounded-2xl bg-surface-container-low">
<div class="flex items-center gap-4">
<div class="w-10 h-10 rounded-xl bg-surface-container-lowest text-on-surface-variant flex items-center justify-center shadow-sm">
<span class="material-symbols-outlined text-[22px]">tablet_mac</span>
</div>
<div class="flex flex-col">
<div class="flex items-center gap-2">
<span class="font-label-lg text-label-lg text-on-surface font-bold">iPad Air</span>
<span class="px-2 py-0.5 rounded-full bg-surface-container text-on-surface-variant font-label-sm text-[10px] font-semibold">Safari Móvil</span>
</div>
<span class="font-body-sm text-body-sm text-outline">iPadOS 17.4 • Caracas, Venezuela • IP: 190.205.22.10</span>
</div>
</div>
<div class="flex items-center gap-3 self-end sm:self-auto">
<span class="font-label-sm text-label-sm text-outline">Activo hace 2 días</span>
<button class="px-3 py-1 rounded-lg bg-surface-container-high hover:bg-error-container hover:text-error text-on-surface-variant font-label-sm text-label-sm font-bold transition-all" type="button">
                  Cerrar Sesión
                </button>
</div>
</div>
</div>
</div>
</section>
<!-- Pie de Sección, Zona de Privacidad y Eliminación -->
<section class="p-6 md:p-8 rounded-3xl bg-surface-container-lowest shadow-[0_4px_20px_-2px_rgba(15,23,42,0.04),0_2px_6px_-1px_rgba(15,23,42,0.02)] flex flex-col sm:flex-row sm:items-center justify-between gap-6">
<div class="flex flex-col gap-1">
<div class="flex items-center gap-2">
<span class="material-symbols-outlined text-outline text-[20px]">privacy_tip</span>
<span class="font-headline-sm text-headline-sm text-on-surface">Privacidad, Exportación &amp; Zona de Peligro</span>
</div>
<p class="font-body-sm text-body-sm text-on-surface-variant">
            Cumplimiento estricto GDPR y revocación definitiva de permisos financieros.
          </p>
</div>
<div class="flex flex-wrap items-center gap-4">
<button class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-surface-container-low hover:bg-surface-container text-on-surface font-label-md text-label-md font-bold transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">download_for_offline</span>
<span class="">Descargar Copia de Mis Datos (GDPR)</span>
</button>
<button class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-error-container/60 hover:bg-error-container text-error font-label-md text-label-md font-bold transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">delete_forever</span>
<span class="">Desactivar o Eliminar Cuenta</span>
</button>
</div>
</section>
</div>
<!-- Barra Flotante de Confirmación Global -->
<div class="sticky bottom-6 z-30 flex items-center justify-between p-4 px-6 rounded-2xl bg-surface-container-lowest/90 backdrop-blur-xl shadow-[0_12px_28px_-6px_rgba(0,105,72,0.15),0_4px_12px_rgba(0,0,0,0.08)]">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full bg-secondary-container text-primary flex items-center justify-center font-bold">
<span class="material-symbols-outlined text-[18px]">info</span>
</div>
<div class="flex flex-col">
<span class="font-label-lg text-label-lg text-on-surface font-bold">Cambios pendientes detectados</span>
<span class="font-body-sm text-body-sm text-outline hidden sm:inline">Última sincronización guardada hace 4 minutos.</span>
</div>
</div>
<div class="flex items-center gap-3">
<button class="px-4 py-2 rounded-xl bg-surface-container-low text-on-surface-variant hover:text-on-surface font-label-lg text-label-lg font-bold transition-all" type="button">
          Descartar
        </button>
<button class="flex items-center gap-2 px-5 py-2.5 rounded-xl bg-primary text-on-primary hover:bg-primary-container font-label-lg text-label-lg font-bold shadow-md shadow-primary/25 transition-all" type="button">
<span class="material-symbols-outlined text-[18px]">done_all</span>
<span class="">Guardar Todos los Cambios</span>
</button>
</div>
</div>
</div>
</div>
@endsection
