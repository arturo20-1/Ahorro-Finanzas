<!DOCTYPE html>
<html lang="es">
<head>
<script>(function(){try{var t=localStorage.getItem('theme');var d=t?t==='dark':window.matchMedia('(prefers-color-scheme: dark)').matches;document.documentElement.classList.toggle('dark',d);}catch(e){}})();</script>
<link href="{{ asset('images/logo.png') }}" rel="icon" type="image/png">
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>@yield('title', 'Finanzas &amp; Ahorro')</title>
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<style>@layer base{html,body{margin:0;padding:0;}body{overscroll-behavior:none;}main>:first-child{margin-top:0!important;}main>:last-child{margin-bottom:0!important;}}::-webkit-scrollbar{display:none;}</style>
<script src="https://cdn.tailwindcss.com"></script>
<script id="tailwind-config">tailwind.config={darkMode:"class",theme:{extend:{colors:{"on-error-container":"rgb(var(--c-on-error-container) / <alpha-value>)","on-primary-container":"rgb(var(--c-on-primary-container) / <alpha-value>)","inverse-primary":"rgb(var(--c-inverse-primary) / <alpha-value>)","outline-variant":"rgb(var(--c-outline-variant) / <alpha-value>)","surface-tint":"rgb(var(--c-surface-tint) / <alpha-value>)","surface-bright":"rgb(var(--c-surface-bright) / <alpha-value>)","surface-dim":"rgb(var(--c-surface-dim) / <alpha-value>)","surface-variant":"rgb(var(--c-surface-variant) / <alpha-value>)","on-secondary-fixed":"rgb(var(--c-on-secondary-fixed) / <alpha-value>)","primary-container":"rgb(var(--c-primary-container) / <alpha-value>)","surface-container-lowest":"rgb(var(--c-surface-container-lowest) / <alpha-value>)","on-secondary-container":"rgb(var(--c-on-secondary-container) / <alpha-value>)","on-primary-fixed":"rgb(var(--c-on-primary-fixed) / <alpha-value>)","secondary-fixed-dim":"rgb(var(--c-secondary-fixed-dim) / <alpha-value>)","on-background":"rgb(var(--c-on-background) / <alpha-value>)","tertiary-fixed-dim":"rgb(var(--c-tertiary-fixed-dim) / <alpha-value>)","surface":"rgb(var(--c-surface) / <alpha-value>)","primary-fixed":"rgb(var(--c-primary-fixed) / <alpha-value>)","on-surface-variant":"rgb(var(--c-on-surface-variant) / <alpha-value>)","primary-fixed-dim":"rgb(var(--c-primary-fixed-dim) / <alpha-value>)","surface-container-low":"rgb(var(--c-surface-container-low) / <alpha-value>)","on-secondary":"rgb(var(--c-on-secondary) / <alpha-value>)","surface-container-high":"rgb(var(--c-surface-container-high) / <alpha-value>)","on-tertiary-fixed":"rgb(var(--c-on-tertiary-fixed) / <alpha-value>)","secondary":"rgb(var(--c-secondary) / <alpha-value>)","tertiary-fixed":"rgb(var(--c-tertiary-fixed) / <alpha-value>)","on-tertiary-fixed-variant":"rgb(var(--c-on-tertiary-fixed-variant) / <alpha-value>)","on-primary":"rgb(var(--c-on-primary) / <alpha-value>)","error":"rgb(var(--c-error) / <alpha-value>)","background":"rgb(var(--c-background) / <alpha-value>)","on-tertiary":"rgb(var(--c-on-tertiary) / <alpha-value>)","error-container":"rgb(var(--c-error-container) / <alpha-value>)","primary":"rgb(var(--c-primary) / <alpha-value>)","on-tertiary-container":"rgb(var(--c-on-tertiary-container) / <alpha-value>)","surface-container-highest":"rgb(var(--c-surface-container-highest) / <alpha-value>)","on-error":"rgb(var(--c-on-error) / <alpha-value>)","on-primary-fixed-variant":"rgb(var(--c-on-primary-fixed-variant) / <alpha-value>)","surface-container":"rgb(var(--c-surface-container) / <alpha-value>)","outline":"rgb(var(--c-outline) / <alpha-value>)","tertiary":"rgb(var(--c-tertiary) / <alpha-value>)","inverse-on-surface":"rgb(var(--c-inverse-on-surface) / <alpha-value>)","secondary-fixed":"rgb(var(--c-secondary-fixed) / <alpha-value>)","secondary-container":"rgb(var(--c-secondary-container) / <alpha-value>)","tertiary-container":"rgb(var(--c-tertiary-container) / <alpha-value>)","inverse-surface":"rgb(var(--c-inverse-surface) / <alpha-value>)","on-surface":"rgb(var(--c-on-surface) / <alpha-value>)","on-secondary-fixed-variant":"rgb(var(--c-on-secondary-fixed-variant) / <alpha-value>)"},borderRadius:{DEFAULT:"0.25rem",lg:"0.5rem",xl:"0.75rem",full:"9999px"},spacing:{"space-xs":"0.25rem",margin:"2rem",gutter:"1.5rem","space-lg":"1.5rem","space-xl":"2.5rem","space-sm":"0.5rem","space-md":"1rem"},fontFamily:{"body-md":["Manrope"],display:["Manrope"],"label-sm":["Manrope"],"headline-sm":["Manrope"],"label-md":["Manrope"],"headline-lg":["Manrope"],"label-lg":["Manrope"],"body-sm":["Manrope"],"display-mobile":["Manrope"],"headline-lg-mobile":["Manrope"],"headline-md":["Manrope"],"body-lg":["Manrope"]},fontSize:{"body-md":["16px",{lineHeight:"24px",fontWeight:"400"}],display:["48px",{lineHeight:"56px",letterSpacing:"-0.03em",fontWeight:"800"}],"label-sm":["11px",{lineHeight:"14px",letterSpacing:"0.04em",fontWeight:"700"}],"headline-sm":["20px",{lineHeight:"28px",fontWeight:"600"}],"label-md":["12px",{lineHeight:"16px",letterSpacing:"0.02em",fontWeight:"600"}],"headline-lg":["32px",{lineHeight:"40px",letterSpacing:"-0.02em",fontWeight:"700"}],"label-lg":["14px",{lineHeight:"20px",letterSpacing:"0.01em",fontWeight:"600"}],"body-sm":["14px",{lineHeight:"20px",fontWeight:"400"}],"display-mobile":["32px",{lineHeight:"40px",letterSpacing:"-0.02em",fontWeight:"800"}],"headline-lg-mobile":["24px",{lineHeight:"32px",letterSpacing:"-0.01em",fontWeight:"700"}],"headline-md":["24px",{lineHeight:"32px",letterSpacing:"-0.01em",fontWeight:"600"}],"body-lg":["18px",{lineHeight:"28px",fontWeight:"400"}]}}}};</script>
<style>
:root{--c-on-error-container:147 0 10;--c-on-primary-container:245 255 247;--c-inverse-primary:104 219 169;--c-outline-variant:188 202 192;--c-surface-tint:0 108 74;--c-surface-bright:250 248 255;--c-surface-dim:210 217 244;--c-surface-variant:218 226 253;--c-on-secondary-fixed:0 33 23;--c-primary-container:0 133 93;--c-surface-container-lowest:255 255 255;--c-on-secondary-container:48 109 88;--c-on-primary-fixed:0 33 20;--c-secondary-fixed-dim:149 211 186;--c-on-background:19 27 46;--c-tertiary-fixed-dim:255 183 125;--c-surface:250 248 255;--c-primary-fixed:133 248 196;--c-on-surface-variant:61 74 66;--c-primary-fixed-dim:104 219 169;--c-surface-container-low:242 243 255;--c-on-secondary:255 255 255;--c-surface-container-high:226 231 255;--c-on-tertiary-fixed:47 21 0;--c-secondary:43 105 84;--c-tertiary-fixed:255 220 195;--c-on-tertiary-fixed-variant:110 57 0;--c-on-primary:255 255 255;--c-error:186 26 26;--c-background:250 248 255;--c-on-tertiary:255 255 255;--c-error-container:255 218 214;--c-primary:0 105 72;--c-on-tertiary-container:255 251 255;--c-surface-container-highest:218 226 253;--c-on-error:255 255 255;--c-on-primary-fixed-variant:0 81 55;--c-surface-container:234 237 255;--c-outline:109 122 114;--c-tertiary:141 75 0;--c-inverse-on-surface:238 240 255;--c-secondary-fixed:176 240 214;--c-secondary-container:173 237 211;--c-tertiary-container:177 95 0;--c-inverse-surface:40 48 68;--c-on-surface:19 27 46;--c-on-secondary-fixed-variant:11 81 61;}
.dark{--c-background:14 21 18;--c-on-background:221 228 223;--c-surface:14 21 18;--c-surface-dim:14 21 18;--c-surface-bright:52 59 55;--c-surface-variant:63 73 67;--c-surface-tint:104 219 169;--c-surface-container-lowest:9 15 13;--c-surface-container-low:22 29 26;--c-surface-container:26 33 30;--c-surface-container-high:36 43 40;--c-surface-container-highest:47 54 51;--c-on-surface:221 228 223;--c-on-surface-variant:191 201 193;--c-outline:137 147 139;--c-outline-variant:63 73 67;--c-inverse-surface:221 228 223;--c-inverse-on-surface:43 50 47;--c-inverse-primary:0 108 74;--c-primary:104 219 169;--c-on-primary:0 56 38;--c-primary-container:10 143 100;--c-on-primary-container:245 255 247;--c-primary-fixed:15 61 46;--c-primary-fixed-dim:104 219 169;--c-on-primary-fixed:183 245 216;--c-on-primary-fixed-variant:133 248 196;--c-secondary:149 211 186;--c-on-secondary:0 56 42;--c-secondary-container:33 79 63;--c-on-secondary-container:176 240 214;--c-secondary-fixed:29 63 51;--c-secondary-fixed-dim:149 211 186;--c-on-secondary-fixed:213 247 232;--c-on-secondary-fixed-variant:176 240 214;--c-tertiary:255 183 125;--c-on-tertiary:76 39 0;--c-tertiary-container:110 57 0;--c-on-tertiary-container:255 220 195;--c-tertiary-fixed:67 39 12;--c-tertiary-fixed-dim:255 183 125;--c-on-tertiary-fixed:255 227 208;--c-on-tertiary-fixed-variant:255 220 195;--c-error:255 180 171;--c-on-error:105 0 5;--c-error-container:147 0 10;--c-on-error-container:255 218 214; color-scheme:dark;}
html{scroll-behavior:smooth;}
::selection{background:rgb(var(--c-primary) / .25);}
:focus-visible{outline:2px solid rgb(var(--c-primary));outline-offset:2px;border-radius:8px;}
body::before{content:"";position:fixed;inset:0;z-index:-1;pointer-events:none;background:radial-gradient(900px 420px at 85% -10%,rgb(var(--c-primary) / .10),transparent 60%),radial-gradient(700px 420px at 0% 100%,rgb(var(--c-tertiary) / .06),transparent 60%);}
/* colores fijos de las graficas SVG, adaptados al modo oscuro */
.dark [fill="#006948"]{fill:rgb(var(--c-primary));}
.dark [fill="#00855d"]{fill:rgb(var(--c-primary-container));}
.dark [fill="#ba1a1a"]{fill:rgb(var(--c-error));}
.dark [fill="#8d4b00"]{fill:rgb(var(--c-tertiary));}
.dark [fill="#ffdad6"]{fill:rgb(var(--c-error-container));}
.dark [stroke="#bccac0"]{stroke:rgb(var(--c-outline-variant));}
.dark [stroke="#006948"]{stroke:rgb(var(--c-primary));}
.dark [stroke="#2b6954"]{stroke:rgb(var(--c-secondary));}
.dark [stroke="#8d4b00"]{stroke:rgb(var(--c-tertiary));}
.dark [stroke="#6d7a72"]{stroke:rgb(var(--c-outline));}
.dark [stroke="#00855d"]{stroke:rgb(var(--c-primary-container));}
/* animaciones */
@keyframes fadeUp{from{opacity:0;transform:translateY(14px);}to{opacity:1;transform:none;}}
main>*>*{animation:fadeUp .55s cubic-bezier(.22,1,.36,1) backwards;}
main>*>*:nth-child(2){animation-delay:.06s;}main>*>*:nth-child(3){animation-delay:.12s;}
main>*>*:nth-child(4){animation-delay:.18s;}main>*>*:nth-child(5){animation-delay:.24s;}
main>*>*:nth-child(6){animation-delay:.30s;}main>*>*:nth-child(n+7){animation-delay:.36s;}
.card-lift{transition:transform .25s ease,box-shadow .25s ease;}
.card-lift:hover{transform:translateY(-3px);box-shadow:0 14px 30px -14px rgb(var(--c-primary) / .35);}
aside nav a{transition:transform .2s ease,background-color .2s ease,color .2s ease;}
aside nav a:hover{transform:translateX(3px);}
#theme-toggle .material-symbols-outlined{transition:transform .5s ease;}
#theme-toggle:hover .material-symbols-outlined{transform:rotate(25deg) scale(1.1);}
html.theme-anim *{transition:background-color .3s ease,color .3s ease,border-color .3s ease,fill .3s ease,stroke .3s ease !important;}
@media (prefers-reduced-motion:reduce){main>*>*{animation:none;}.card-lift:hover,aside nav a:hover{transform:none;}html{scroll-behavior:auto;}}
</style>
@stack('head')
</head>
<body class="bg-background font-body-md text-on-surface">
@php
    $menu = [
        ['ruta' => 'dashboard',          'patron' => 'dashboard',      'icono' => 'grid_view',       'texto' => 'Dashboard'],
        ['ruta' => 'transactions.index', 'patron' => 'transactions.*', 'icono' => 'receipt_long',    'texto' => 'Transacciones &amp; Gastos'],
        ['ruta' => 'budgets.index',      'patron' => 'budgets.*',      'icono' => 'pie_chart',       'texto' => 'Presupuestos Inteligentes'],
        ['ruta' => 'goals.index',        'patron' => 'goals.*',        'icono' => 'savings',         'texto' => 'Metas de Ahorro'],
        ['ruta' => 'analytics.index',    'patron' => 'analytics.*',    'icono' => 'monitoring',      'texto' => 'Reportes &amp; An&aacute;lisis'],
        ['ruta' => 'accounts.index',     'patron' => 'accounts.*',     'icono' => 'account_balance', 'texto' => 'Cuentas Bancarias'],
        ['ruta' => 'settings.index',     'patron' => 'settings.*',     'icono' => 'settings',        'texto' => 'Configuraci&oacute;n'],
    ];
@endphp
<div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-[45] hidden lg:hidden" id="sidebar-overlay"></div>
<aside class="fixed left-0 top-0 h-full w-72 bg-surface-container-lowest shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-50 flex flex-col justify-between -translate-x-full lg:translate-x-0 transition-transform duration-300" id="sidebar"><div class="flex flex-col"><div class="h-16 px-space-lg flex items-center gap-space-sm"><img alt="my money logo" class="h-10 w-auto object-contain" src="{{ asset('images/logo.png') }}"><div class="flex flex-col"><span class="font-label-sm text-label-sm text-primary tracking-wide uppercase">Finanzas &amp; Ahorro</span></div></div><nav class="flex flex-col px-space-md mt-space-md gap-space-xs">
@foreach ($menu as $item)
@php $activo = request()->routeIs($item['patron']); @endphp
<a href="{{ route($item['ruta']) }}" @if ($activo) aria-current="page" @endif class="flex items-center gap-space-sm px-space-md py-space-sm transition-all {{ $activo ? 'bg-primary text-on-primary font-label-lg rounded-xl shadow-[0_4px_12px_rgba(0,105,72,0.25)]' : 'rounded-xl text-on-surface-variant hover:bg-surface-container-high hover:text-on-surface' }}"><span class="material-symbols-outlined text-[20px]" @if ($activo) style="font-variation-settings: 'FILL' 1;" @endif>{{ $item['icono'] }}</span><span class="font-label-lg text-label-lg">{!! $item['texto'] !!}</span></a>
@endforeach
</nav></div><div class="p-space-md flex flex-col gap-space-sm"><div class="bg-surface-container-low rounded-xl p-space-sm flex items-center gap-space-sm"><div class="w-8 h-8 rounded-lg bg-secondary-container flex items-center justify-center"><span class="material-symbols-outlined text-on-secondary-container text-[18px]">verified_user</span></div><div class="flex flex-col"><span class="font-label-sm text-label-sm text-on-surface">Seguridad Bancaria</span><span class="font-label-sm text-label-sm text-on-surface-variant text-[10px]">SSL 256-bit • SOC2 Tipo II</span></div></div><div class="flex items-center justify-between px-space-sm py-space-xs text-on-surface-variant"><a class="flex items-center gap-space-xs hover:text-on-surface transition-colors" data-path="centro-ayuda" href="#"><span class="material-symbols-outlined text-[18px]">help_outline</span><span class="font-label-md text-label-md">Centro de Ayuda</span></a><span class="material-symbols-outlined text-[18px] cursor-pointer hover:text-on-surface">lock</span></div></div></aside>
<div class="lg:pl-72">
<header class="fixed top-0 left-0 lg:left-72 right-0 h-16 bg-surface-container-lowest/90 backdrop-blur-xl shadow-[0_1px_8px_rgba(0,0,0,0.04)] z-40 flex items-center justify-between px-space-lg"><div class="flex items-center gap-space-md"><button aria-label="Abrir menú" class="lg:hidden p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant" id="menu-btn" type="button"><span class="material-symbols-outlined text-[24px]">menu</span></button><img alt="my money logo" class="h-8 w-auto object-contain lg:hidden" src="{{ asset('images/logo.png') }}"><div class="hidden sm:flex items-center bg-surface-container-low px-space-md py-space-xs rounded-xl w-64 md:w-80 gap-space-xs"><span class="material-symbols-outlined text-on-surface-variant text-[20px]">search</span><input class="bg-transparent font-body-sm text-body-sm text-on-surface placeholder:text-on-surface-variant focus:outline-none w-full" placeholder="Buscar transacciones, cuentas..." type="text"></div></div><div class="flex items-center gap-space-md"><div class="hidden sm:flex items-center bg-surface-container-low p-1 rounded-xl"><button class="px-space-sm py-1 font-label-md text-label-md rounded-lg bg-surface-container-lowest text-on-surface shadow-[0_1px_4px_rgba(0,0,0,0.04)]" type="button">Este Mes</button><button class="px-space-sm py-1 font-label-md text-label-md rounded-lg text-on-surface-variant hover:text-on-surface transition-colors" type="button">Últimos 30 días</button><button class="px-space-sm py-1 font-label-md text-label-md rounded-lg text-on-surface-variant hover:text-on-surface transition-colors" type="button">Este Año</button></div><button class="flex items-center gap-space-xs bg-primary hover:bg-primary-container text-on-primary px-space-md py-space-xs rounded-xl font-label-lg text-label-lg transition-all shadow-[0_4px_12px_rgba(0,105,72,0.2)]" type="button"><span class="material-symbols-outlined text-[20px]">add</span><span class="hidden md:inline">Registrar Transacción</span></button><div class="relative flex items-center justify-center"><button class="p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-colors" type="button"><span class="material-symbols-outlined text-[22px]">notifications</span></button><span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-tertiary ring-2 ring-surface-container-lowest"></span></div><button aria-label="Cambiar entre modo claro y oscuro" class="p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-colors" id="theme-toggle" title="Modo claro / oscuro" type="button"><span class="material-symbols-outlined text-[22px] dark:hidden">dark_mode</span><span class="material-symbols-outlined text-[22px] hidden dark:inline">light_mode</span></button>
<form action="{{ route('logout') }}" class="flex items-center gap-space-xs pl-space-xs" method="POST">
@csrf
<div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center" title="{{ auth()->user()->name }}"><span class="material-symbols-outlined text-on-primary text-[18px]">person</span></div>
<span class="hidden md:inline font-label-md text-label-md text-on-surface">{{ \Illuminate\Support\Str::before(auth()->user()->name, ' ') }}</span>
<button class="p-space-xs rounded-xl hover:bg-surface-container-high text-on-surface-variant hover:text-on-surface transition-colors" title="Cerrar sesión" type="submit"><span class="material-symbols-outlined text-[22px]">logout</span></button>
</form></div></header>
<main class="relative pt-16 w-full px-space-lg min-h-screen">
@yield('content')
</main>
</div>
<script>
(function () {
  var root = document.documentElement;

  // Modo claro / oscuro
  var toggle = document.getElementById('theme-toggle');
  if (toggle) toggle.addEventListener('click', function () {
    root.classList.add('theme-anim');
    var dark = !root.classList.contains('dark');
    root.classList.toggle('dark', dark);
    try { localStorage.setItem('theme', dark ? 'dark' : 'light'); } catch (e) {}
    setTimeout(function () { root.classList.remove('theme-anim'); }, 400);
  });
  try {
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
      if (!localStorage.getItem('theme')) root.classList.toggle('dark', e.matches);
    });
  } catch (e) {}

  // Menú lateral en pantallas pequeñas
  var side = document.getElementById('sidebar'),
      overlay = document.getElementById('sidebar-overlay'),
      menuBtn = document.getElementById('menu-btn');
  function abrir() { side.classList.remove('-translate-x-full'); overlay.classList.remove('hidden'); }
  function cerrar() { side.classList.add('-translate-x-full'); overlay.classList.add('hidden'); }
  if (menuBtn) menuBtn.addEventListener('click', abrir);
  if (overlay) overlay.addEventListener('click', cerrar);
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') cerrar(); });

  // Atajo: "/" enfoca el buscador
  document.addEventListener('keydown', function (e) {
    var tag = (e.target.tagName || '').toLowerCase();
    if (e.key === '/' && tag !== 'input' && tag !== 'textarea' && tag !== 'select') {
      var buscador = document.querySelector('header input');
      if (buscador) { e.preventDefault(); buscador.focus(); }
    }
  });

  // Tarjetas con efecto al pasar el mouse
  document.querySelectorAll('main [class*="rounded-2xl"], main [class*="rounded-3xl"]').forEach(function (el) {
    if (el.offsetWidth > 0 && el.offsetWidth < 560 && el.offsetHeight < 460 && /shadow|border/.test(el.className)) {
      el.classList.add('card-lift');
    }
  });

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  // Cifras que cuentan desde cero
  document.querySelectorAll('main [class*="text-headline-lg"], main [class*="text-display"]').forEach(function (el) {
    var nodo = el.firstChild;
    if (!nodo || nodo.nodeType !== 3) return;
    var m = nodo.nodeValue.match(/^(\s*[$+\-]?\s*)(\d{1,3}(?:,\d{3})+(?:\.\d+)?|\d+(?:\.\d+)?)(\s*%?[^\d]*)$/);
    if (!m) return;
    var meta = parseFloat(m[2].replace(/,/g, '')),
        dec = (m[2].split('.')[1] || '').length,
        coma = m[2].indexOf(',') > -1,
        ini = performance.now(), dur = 900;
    function fmt(v) {
      var s = v.toFixed(dec);
      if (coma) { var p = s.split('.'); p[0] = p[0].replace(/\B(?=(\d{3})+(?!\d))/g, ','); s = p.join('.'); }
      return s;
    }
    function paso(t) {
      var k = Math.min(1, (t - ini) / dur), e = 1 - Math.pow(1 - k, 3);
      nodo.nodeValue = m[1] + fmt(meta * e) + m[3];
      if (k < 1) requestAnimationFrame(paso);
    }
    nodo.nodeValue = m[1] + fmt(0) + m[3];
    requestAnimationFrame(paso);
  });

  // Barras de progreso que se llenan
  document.querySelectorAll('main [style*="width"]').forEach(function (el) {
    var w = el.style.width;
    if (!w || w.slice(-1) !== '%' || w === '100%') return;
    el.style.width = '0%';
    el.style.transition = 'width 900ms cubic-bezier(.22,1,.36,1)';
    requestAnimationFrame(function () { requestAnimationFrame(function () { el.style.width = w; }); });
  });
})();
</script>
@stack('scripts')
</body>
</html>
