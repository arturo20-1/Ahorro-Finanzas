<!DOCTYPE html><html lang="es" style=""><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>my money - Finanzas Personales y Metas de Ahorro</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
    tailwind.config = {
      darkMode: "class",
      theme: {
        extend: {
          colors: {
            primary: "#059669",
            "primary-dark": "#064e3b",
            "primary-deep": "#065f46",
            "primary-light": "#10b981",
            "primary-subtle": "#ecfdf5",
            surface: "#faf8ff",
            "surface-dim": "#f0f4f2",
            "surface-lowest": "#ffffff"
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'Manrope', 'sans-serif'],
            manrope: ['Manrope', 'sans-serif']
          }
        }
      }
    }
  </script>
<style>
    /* Efecto de capas diagonales facetadas tipo la imagen de referencia */
    .facet-bg {
      background: linear-gradient(135deg, #064e3b 0%, #065f46 50%, #047857 100%);
      position: relative;
      overflow: hidden;
    }
    
    .facet-layer-1 {
      position: absolute;
      top: -15%;
      left: -20%;
      width: 140%;
      height: 140%;
      background: linear-gradient(125deg, rgba(16, 185, 129, 0.4) 0%, rgba(5, 150, 105, 0.8) 50%, rgba(6, 78, 59, 0.95) 100%);
      transform: rotate(-18deg) skewX(-12deg);
      box-shadow: 12px 16px 35px rgba(0, 0, 0, 0.35);
      pointer-events: none;
    }

    .facet-layer-2 {
      position: absolute;
      top: 15%;
      left: -25%;
      width: 130%;
      height: 120%;
      background: linear-gradient(145deg, rgba(52, 211, 153, 0.35) 0%, rgba(16, 185, 129, 0.6) 45%, rgba(6, 95, 70, 0.9) 100%);
      transform: rotate(26deg) skewX(8deg);
      box-shadow: -10px 14px 30px rgba(0, 0, 0, 0.28);
      pointer-events: none;
    }

    .facet-layer-3 {
      position: absolute;
      bottom: -15%;
      right: -25%;
      width: 110%;
      height: 80%;
      background: linear-gradient(135deg, rgba(110, 231, 183, 0.25) 0%, rgba(5, 150, 105, 0.75) 70%, rgba(4, 120, 87, 0.95) 100%);
      transform: rotate(-30deg);
      box-shadow: -8px -10px 30px rgba(0, 0, 0, 0.25);
      pointer-events: none;
    }

    /* Pestaña saliente que encaja en el panel blanco (como en la imagen 2) */
    .tab-notch-pill {
      box-shadow: 8px 0 20px -3px rgba(0, 0, 0, 0.15);
    }
  </style>
</head>
<body class="bg-[#e9eff1] text-slate-800 antialiased selection:bg-emerald-600 selection:text-white min-h-screen flex items-center justify-center p-3 sm:p-6 lg:p-10 font-sans relative overflow-x-hidden">
<!-- Fondos sutiles de ambiente -->
<div class="fixed -top-40 -right-40 w-[30rem] h-[30rem] bg-emerald-200/50 rounded-full blur-3xl pointer-events-none"></div>
<div class="fixed -bottom-40 -left-40 w-[30rem] h-[30rem] bg-teal-200/50 rounded-full blur-3xl pointer-events-none"></div>
<!-- Contenedor Tarjeta Flotante Principal (Estructura Horizontal estilo IMAGE_2) -->
<main class="w-full max-w-4xl relative z-10 my-auto">
<div class="relative w-full bg-white rounded-[2rem] sm:rounded-[2.5rem] shadow-[0_25px_60px_-15px_rgba(6,78,59,0.25)] border border-white/60 overflow-hidden flex flex-col md:flex-row min-h-[580px]">
<!-- LADO IZQUIERDO: Silueta y capas geométricas facetadas esmeralda (Reemplaza fucsia de IMAGE_2 por esmeralda) -->
<div class="relative md:w-5/12 facet-bg p-8 sm:p-10 flex flex-col justify-between text-white overflow-hidden min-h-[260px] md:min-h-full">
<!-- Capas poligonales 3D superpuestas -->
<div class="facet-layer-1"></div>
<div class="facet-layer-2"></div>
<div class="facet-layer-3"></div>
<!-- Encabezado con Logo Oficial de my money https://lh3.googleusercontent.com/aida/AEtjO1VZSZnvrybuGL91b7myTtOgAkIrJM6m-hJwku1qINiVecXdKmMWGMtGDlJ9x7a4OriQMfb9YpoPducCSOlp7qy2nBCr_tFsGqBxCX4V3JnuYkqUsg5wKsWUt8sgYSku1xypXeIPosjzlsnByhOV7MNMPryfsXbwJOpZ_uLtE-BB6jgLQqHXc72mVU144z12IQ-FxaWGSsnP8xuM7O4Wz2Ft5FY6Ws5rD4kzqAQBFHGicB-tfOgZPL8K8yRa -->
<div class="relative z-10 flex items-center gap-3">
<div class="w-12 h-12 rounded-2xl bg-white/15 backdrop-blur-md p-1.5 shadow-inner border border-white/20 flex items-center justify-center flex-shrink-0">
<img alt="my money logo oficial" class="w-full h-full object-contain filter drop-shadow" src="https://lh3.googleusercontent.com/aida/AEtjO1VZSZnvrybuGL91b7myTtOgAkIrJM6m-hJwku1qINiVecXdKmMWGMtGDlJ9x7a4OriQMfb9YpoPducCSOlp7qy2nBCr_tFsGqBxCX4V3JnuYkqUsg5wKsWUt8sgYSku1xypXeIPosjzlsnByhOV7MNMPryfsXbwJOpZ_uLtE-BB6jgLQqHXc72mVU144z12IQ-FxaWGSsnP8xuM7O4Wz2Ft5FY6Ws5rD4kzqAQBFHGicB-tfOgZPL8K8yRa">
</div>
<div>
<h1 class="text-xl font-extrabold tracking-tight text-white leading-tight font-manrope">Finanzas</h1>
<p class="text-[10px] tracking-wider uppercase font-semibold text-emerald-200 leading-none">Finanzas Personales</p>
</div>
</div>
<!-- Pestañas Interactivas Laterales (Réplica idéntica de estructura IMAGE_2 con pestaña encajada al panel blanco) -->
<div class="relative z-20 my-auto py-6 flex flex-col items-end -mr-8 sm:-mr-10">
<!-- Botón / Pestaña LOGIN -->
<div class="relative w-full flex justify-end">
<button class="group relative z-20 flex items-center justify-center font-bold tracking-wider text-xs sm:text-sm uppercase transition-all duration-300 py-3.5 px-8 rounded-l-full bg-white text-emerald-800 shadow-[-8px_4px_16px_rgba(0,0,0,0.18)] translate-x-1" id="btnTabLogin" type="button"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm text-emerald-600">login</span> INICIAR SESIÓN</span></button>
</div>
<!-- Botón / Pestaña SIGN UP (Crear cuenta) -->
<div class="relative w-full flex justify-end mt-2">
<button class="group relative z-10 flex items-center justify-center font-bold tracking-wider text-xs sm:text-sm uppercase transition-all duration-300 py-3 px-8 rounded-l-full text-white/80 hover:text-white hover:bg-white/10" id="btnTabRegister" type="button"><span class="flex items-center gap-2"><span class="material-symbols-outlined text-sm opacity-70">person_add</span> REGISTRARSE</span></button>
</div>
</div>
<!-- Respaldo de seguridad institucional inferior -->
<div class="relative z-10 flex items-center justify-between text-[11px] text-emerald-100/80 pt-2 border-t border-white/15">
<span class="flex items-center gap-1.5 font-medium">
<span class="material-symbols-outlined text-xs text-emerald-300">verified_user</span>
            Metas de Ahorro
          </span>
<span class="flex items-center gap-1 font-semibold text-emerald-200">Cifrado SSL 256-bit <span class="material-symbols-outlined text-[13px]">lock</span></span>
</div>
</div>
<!-- LADO DERECHO: Formulario Limpio estilo minimalista con Avatar Circular, Underline Inputs & Acciones -->
<div class="md:w-7/12 bg-white p-8 sm:p-12 lg:p-14 flex flex-col justify-between relative">
<div>
<!-- Avatar Icono Circular Superior con Gradiente Esmeralda (como en IMAGE_2) -->
<div class="flex flex-col items-center justify-center mb-6 text-center">
<div class="relative mb-2.5">
<div class="w-16 h-16 sm:w-20 sm:h-20 rounded-full bg-gradient-to-tr from-emerald-800 via-emerald-600 to-teal-400 p-[3px] shadow-[0_10px_25px_-5px_rgba(5,150,105,0.4)] flex items-center justify-center">
<div class="w-full h-full rounded-full bg-gradient-to-b from-emerald-600 to-emerald-800 flex items-center justify-center text-white">
<span class="material-symbols-outlined text-3xl sm:text-4xl" id="mainAvatarIcon" style="font-variation-settings: &quot;FILL&quot; 1;">person</span>
</div>
</div>
</div>
<h2 class="text-xl sm:text-2xl font-extrabold tracking-wider text-emerald-950 uppercase font-manrope" id="mainSectionTitle">INICIAR SESIÓN</h2>
<p class="text-xs text-slate-400 mt-0.5 font-medium" id="mainSectionSubtitle">Ingresa tus credenciales para acceder</p>
</div>
<!-- ==================== VISTA: INICIAR SESIÓN ==================== -->
<form class="space-y-6 transition-all duration-300" id="formLoginView">
<!-- Email Input Minimalista Underline -->
<div class="relative group">
<div class="flex items-center border-b-2 border-slate-200 focus-within:border-emerald-600 pb-2 transition-colors duration-200">
<span class="text-slate-400 group-focus-within:text-emerald-600 mr-3 transition-colors">
<span class="material-symbols-outlined text-xl">account_circle</span>
</span>
<input class="w-full bg-transparent border-none p-0 text-slate-800 text-sm sm:text-base placeholder:text-slate-400 focus:ring-0 focus:outline-none font-medium" id="inputLoginEmail" placeholder="Correo electrónico" required="" type="email">
</div>
</div>
<!-- Password Input Minimalista Underline -->
<div class="relative group">
<div class="flex items-center border-b-2 border-slate-200 focus-within:border-emerald-600 pb-2 transition-colors duration-200">
<span class="text-slate-400 group-focus-within:text-emerald-600 mr-3 transition-colors">
<span class="material-symbols-outlined text-xl">lock</span>
</span>
<input class="w-full bg-transparent border-none p-0 text-slate-800 text-sm sm:text-base placeholder:text-slate-400 focus:ring-0 focus:outline-none font-medium" id="inputLoginPassword" placeholder="Contraseña" required="" type="password">
<button aria-label="Mostrar u ocultar contraseña" class="text-slate-400 hover:text-emerald-700 transition-colors pl-2" id="toggleLoginPasswordBtn" type="button">
<span class="material-symbols-outlined text-lg" id="loginEyeIcon">visibility</span>
</button>
</div>
</div>
<!-- Fila de 'Forgot Password?' y Botón LOGIN alineados idénticos a IMAGE_2 -->
<div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
<a class="text-xs font-semibold text-emerald-700 hover:text-emerald-900 transition-colors hover:underline order-2 sm:order-1" href="#">¿Olvidaste tu contraseña?</a>
<button class="w-full sm:w-auto px-9 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-1.5 order-1 sm:order-2 cursor-pointer" id="btnSubmitLogin" type="submit">
<span id="loginBtnText" class="">INICIAR SESIÓN</span>
<span class="material-symbols-outlined text-sm" id="loginBtnIcon">arrow_forward</span>
</button>
</div>
</form>
<!-- ==================== VISTA: REGISTRO / SIGN UP ==================== -->
<form class="space-y-4 hidden transition-all duration-300" id="formRegisterView">
<!-- Nombre Completo Underline -->
<div class="relative group">
<div class="flex items-center border-b-2 border-slate-200 focus-within:border-emerald-600 pb-1.5 transition-colors duration-200">
<span class="text-slate-400 group-focus-within:text-emerald-600 mr-3 transition-colors">
<span class="material-symbols-outlined text-xl">badge</span>
</span>
<input class="w-full bg-transparent border-none p-0 text-slate-800 text-sm placeholder:text-slate-400 focus:ring-0 focus:outline-none font-medium" id="regFullName" placeholder="Nombre Completo" required="" type="text">
</div>
</div>
<!-- Email Underline -->
<div class="relative group">
<div class="flex items-center border-b-2 border-slate-200 focus-within:border-emerald-600 pb-1.5 transition-colors duration-200">
<span class="text-slate-400 group-focus-within:text-emerald-600 mr-3 transition-colors">
<span class="material-symbols-outlined text-xl">mail</span>
</span>
<input class="w-full bg-transparent border-none p-0 text-slate-800 text-sm placeholder:text-slate-400 focus:ring-0 focus:outline-none font-medium" id="regEmail" placeholder="Correo Electrónico" required="" type="email">
<span class="hidden text-emerald-600" id="regEmailBadge">
<span class="material-symbols-outlined text-base">check_circle</span>
</span>
</div>
</div>
<!-- Password Underline -->
<div class="relative group">
<div class="flex items-center border-b-2 border-slate-200 focus-within:border-emerald-600 pb-1.5 transition-colors duration-200">
<span class="text-slate-400 group-focus-within:text-emerald-600 mr-3 transition-colors">
<span class="material-symbols-outlined text-xl">lock</span>
</span>
<input class="w-full bg-transparent border-none p-0 text-slate-800 text-sm placeholder:text-slate-400 focus:ring-0 focus:outline-none font-medium" id="regPassword" placeholder="Contraseña (mínimo 8 caract.)" required="" type="password">
<button aria-label="Mostrar contraseña" class="text-slate-400 hover:text-emerald-700 transition-colors pl-2" id="toggleRegPwdBtn" type="button">
<span class="material-symbols-outlined text-lg" id="regEyeIcon">visibility</span>
</button>
</div>
</div>
<!-- Confirm Password Underline -->
<div class="relative group">
<div class="flex items-center border-b-2 border-slate-200 focus-within:border-emerald-600 pb-1.5 transition-colors duration-200">
<span class="text-slate-400 group-focus-within:text-emerald-600 mr-3 transition-colors">
<span class="material-symbols-outlined text-xl">check_circle</span>
</span>
<input class="w-full bg-transparent border-none p-0 text-slate-800 text-sm placeholder:text-slate-400 focus:ring-0 focus:outline-none font-medium" id="regConfirmPassword" placeholder="Confirmar Contraseña" required="" type="password">
</div>
<div class="hidden text-[11px] mt-1 font-medium flex items-center gap-1 text-slate-500" id="regMatchNotice">
<span class="material-symbols-outlined text-xs" id="regMatchIcon">info</span>
<span id="regMatchText" class="">Verificando...</span>
</div>
</div>
<!-- Términos y Botón SIGN UP -->
<div class="pt-2 flex flex-col sm:flex-row items-center justify-between gap-4">
<label class="flex items-center gap-2 cursor-pointer text-left">
<input class="rounded text-emerald-600 focus:ring-emerald-500 w-3.5 h-3.5 border-slate-300" id="acceptTerms" required="" type="checkbox">
<span class="text-[11px] text-slate-500">Acepto los <a class="text-emerald-700 font-semibold hover:underline" href="#">términos de servicio</a></span>
</label>
<button class="w-full sm:w-auto px-9 py-2.5 rounded-full bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800 text-white font-bold text-xs sm:text-sm tracking-wider uppercase shadow-md hover:shadow-lg transition-all duration-200 flex items-center justify-center gap-1.5 cursor-pointer" id="btnSubmitRegister" type="submit">
<span id="regBtnText" class="">REGISTRARSE</span>
<span class="material-symbols-outlined text-sm" id="regBtnIcon">person_add</span>
</button>
</div>
</form>
</div>
<!-- DIVISOR INFERIOR: 'Or Login With' Google y Redes (Estructura idéntica a IMAGE_2) -->
<div class="mt-8 pt-6 border-t border-slate-100 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
<span class="font-medium text-slate-400" id="socialBarLabel">O ingresa con</span>
<div class="flex items-center gap-4">
<!-- Google Button -->
<button class="flex items-center gap-2 px-3 py-1.5 rounded-lg border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50/50 text-slate-700 transition-colors" type="button">
<svg class="w-4 h-4" viewBox="0 0 24 24">
<path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"></path>
<path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"></path>
<path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" fill="#FBBC05"></path>
<path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" fill="#EA4335"></path>
</svg>
<span class="font-semibold text-xs text-slate-600">Google</span>
</button>
<!-- Facebook Button -->
<button class="flex items-center gap-2 px-3 py-1.5 rounded-lg border border-slate-200 hover:border-emerald-300 hover:bg-emerald-50/50 text-slate-700 transition-colors" type="button">
<svg class="w-4 h-4 text-[#1877F2] fill-current" viewBox="0 0 24 24">
<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"></path>
</svg>
<span class="font-semibold text-xs text-slate-600">Facebook</span>
</button>
</div>
</div>
</div>
</div>
</main>
<!-- Script interactivo: conmutador de pestañas y validaciones -->
<script>
    (function() {
      // Elementos de conmutación
      const btnTabLogin = document.getElementById('btnTabLogin');
      const btnTabRegister = document.getElementById('btnTabRegister');
      const formLoginView = document.getElementById('formLoginView');
      const formRegisterView = document.getElementById('formRegisterView');
      const mainSectionTitle = document.getElementById('mainSectionTitle');
      const mainSectionSubtitle = document.getElementById('mainSectionSubtitle');
      const mainAvatarIcon = document.getElementById('mainAvatarIcon');
      const socialBarLabel = document.getElementById('socialBarLabel');

      // Funciones de estilo para la pestaña tipo muesca (Notch tab)
      function setLoginActive() {
        formLoginView.classList.remove('hidden');
        formRegisterView.classList.add('hidden');

        mainSectionTitle.textContent = 'LOGIN';
        mainSectionSubtitle.textContent = 'Ingresa tus credenciales para acceder';
        mainAvatarIcon.textContent = 'person';
        socialBarLabel.textContent = 'Or Login With';

        // Estilo activo para Login (Tab blanco redondeado que sobresale)
        btnTabLogin.className = 'group relative z-20 flex items-center justify-center font-bold tracking-wider text-xs sm:text-sm uppercase transition-all duration-300 py-3.5 px-8 rounded-l-full bg-white text-emerald-800 shadow-[-8px_4px_16px_rgba(0,0,0,0.18)] translate-x-1';
        btnTabLogin.querySelector('span span').className = 'material-symbols-outlined text-sm text-emerald-600';

        // Estilo inactivo para Register
        btnTabRegister.className = 'group relative z-10 flex items-center justify-center font-bold tracking-wider text-xs sm:text-sm uppercase transition-all duration-300 py-3 px-8 rounded-l-full text-white/80 hover:text-white hover:bg-white/10';
        btnTabRegister.querySelector('span span').className = 'material-symbols-outlined text-sm opacity-70';
      }

      function setRegisterActive() {
        formLoginView.classList.add('hidden');
        formRegisterView.classList.remove('hidden');

        mainSectionTitle.textContent = 'SIGN UP';
        mainSectionSubtitle.textContent = 'Crea tu cuenta segura en my money';
        mainAvatarIcon.textContent = 'person_add';
        socialBarLabel.textContent = 'Or Sign Up With';

        // Estilo inactivo para Login
        btnTabLogin.className = 'group relative z-10 flex items-center justify-center font-bold tracking-wider text-xs sm:text-sm uppercase transition-all duration-300 py-3 px-8 rounded-l-full text-white/80 hover:text-white hover:bg-white/10';
        btnTabLogin.querySelector('span span').className = 'material-symbols-outlined text-sm opacity-70';

        // Estilo activo para Register (Tab blanco redondeado que sobresale)
        btnTabRegister.className = 'group relative z-20 flex items-center justify-center font-bold tracking-wider text-xs sm:text-sm uppercase transition-all duration-300 py-3.5 px-8 rounded-l-full bg-white text-emerald-800 shadow-[-8px_4px_16px_rgba(0,0,0,0.18)] translate-x-1';
        btnTabRegister.querySelector('span span').className = 'material-symbols-outlined text-sm text-emerald-600';
      }

      btnTabLogin.addEventListener('click', setLoginActive);
      btnTabRegister.addEventListener('click', setRegisterActive);

      // Mostrar / Ocultar contraseñas
      const toggleLoginPasswordBtn = document.getElementById('toggleLoginPasswordBtn');
      const inputLoginPassword = document.getElementById('inputLoginPassword');
      const loginEyeIcon = document.getElementById('loginEyeIcon');

      toggleLoginPasswordBtn.addEventListener('click', function() {
        if (inputLoginPassword.type === 'password') {
          inputLoginPassword.type = 'text';
          loginEyeIcon.textContent = 'visibility_off';
        } else {
          inputLoginPassword.type = 'password';
          loginEyeIcon.textContent = 'visibility';
        }
      });

      const toggleRegPwdBtn = document.getElementById('toggleRegPwdBtn');
      const regPassword = document.getElementById('regPassword');
      const regEyeIcon = document.getElementById('regEyeIcon');

      toggleRegPwdBtn.addEventListener('click', function() {
        if (regPassword.type === 'password') {
          regPassword.type = 'text';
          regEyeIcon.textContent = 'visibility_off';
        } else {
          regPassword.type = 'password';
          regEyeIcon.textContent = 'visibility';
        }
      });

      // Validación simple de confirmación de contraseña
      const regConfirmPassword = document.getElementById('regConfirmPassword');
      const regMatchNotice = document.getElementById('regMatchNotice');
      const regMatchIcon = document.getElementById('regMatchIcon');
      const regMatchText = document.getElementById('regMatchText');

      function verifyMatch() {
        const p1 = regPassword.value;
        const p2 = regConfirmPassword.value;
        if (!p2) {
          regMatchNotice.classList.add('hidden');
          return;
        }
        regMatchNotice.classList.remove('hidden');
        if (p1 === p2 && p1.length >= 6) {
          regMatchNotice.className = 'text-[11px] mt-1 font-medium flex items-center gap-1 text-emerald-600';
          regMatchIcon.textContent = 'check_circle';
          regMatchText.textContent = 'Las contraseñas coinciden';
        } else {
          regMatchNotice.className = 'text-[11px] mt-1 font-medium flex items-center gap-1 text-rose-500';
          regMatchIcon.textContent = 'cancel';
          regMatchText.textContent = 'Las contraseñas no coinciden';
        }
      }

      regPassword.addEventListener('input', verifyMatch);
      regConfirmPassword.addEventListener('input', verifyMatch);

      // Badge de email válido
      const regEmail = document.getElementById('regEmail');
      const regEmailBadge = document.getElementById('regEmailBadge');
      regEmail.addEventListener('input', function() {
        if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(regEmail.value.trim())) {
          regEmailBadge.classList.remove('hidden');
        } else {
          regEmailBadge.classList.add('hidden');
        }
      });

      // Envío de Formulario Login
      formLoginView.addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = document.getElementById('btnSubmitLogin');
        const text = document.getElementById('loginBtnText');
        const icon = document.getElementById('loginBtnIcon');

        btn.disabled = true;
        text.textContent = 'VERIFICANDO...';
        icon.textContent = 'sync';
        icon.classList.add('animate-spin');

        setTimeout(function() {
          btn.disabled = false;
          text.textContent = 'LOGIN';
          icon.textContent = 'arrow_forward';
          icon.classList.remove('animate-spin');
          alert('¡Bienvenido a my money! Has ingresado correctamente a tu gestor financiero.');
        }, 1000);
      });

      // Envío de Formulario Registro
      formRegisterView.addEventListener('submit', function(e) {
        e.preventDefault();
        if (regPassword.value !== regConfirmPassword.value) {
          alert('Por favor verifica que ambas contraseñas coincidan.');
          return;
        }

        const btn = document.getElementById('btnSubmitRegister');
        const text = document.getElementById('regBtnText');
        const icon = document.getElementById('regBtnIcon');

        btn.disabled = true;
        text.textContent = 'CREANDO...';
        icon.textContent = 'sync';
        icon.classList.add('animate-spin');

        setTimeout(function() {
          btn.disabled = false;
          text.textContent = 'REGISTRAR';
          icon.textContent = 'person_add';
          icon.classList.remove('animate-spin');
          alert('¡Cuenta creada con éxito en my money! Revisa tu correo electrónico para confirmar tu registro.');
          setLoginActive();
        }, 1100);
      });

    })();
  </script>


</body></html>