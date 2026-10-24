<!DOCTYPE html><html lang="es" style=""><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Inicio - my money Gestor Inteligente de Finanzas</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&amp;display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#ecfdf5',
              100: '#d1fae5',
              200: '#a7f3d0',
              500: '#10b981',
              600: '#059669',
              700: '#047857',
              800: '#065f46',
              900: '#064e3b',
            }
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          }
        }
      }
    };
  </script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased selection:bg-brand-500 selection:text-white">

  <!-- TOP NAVBAR -->
  <header class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-slate-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-20 flex items-center justify-between gap-6">
      <!-- Logo Brand -->
      <a href="#" class="flex items-center gap-3 group">
        <img src="https://lh3.googleusercontent.com/aida/AEtjO1UMIVvHa-J6LdhLht6FdmHa9rdLtbLRWyR4nCx3uJU-I_futDGPR0gM_Y1zk8L7-J-9LSeef8HMwIBjmDbzyDYr4EC75knTpna_fFPN1wasnpi4FSKbUvnLqb3LISrBqsO8L7UxBZ4b4mD68vOLTluqXyPbWvqy2T5N13suVC5XxPfcME672Sk6LplWWJc8LKLhd1ilwU3PyFX8cI2MOtCCT59rze3RD_YW3XTGwX05ag" alt="my money Logo" class="w-10 h-10 object-contain drop-shadow-sm group-hover:scale-105 transition-transform">
        <div class="flex flex-col">
          <span class="text-xl font-extrabold text-slate-900 tracking-tight leading-tight">Gestor Financiero</span>
          <span class="text-[11px] font-medium text-slate-500 tracking-wide">Finanzas Personales</span>
        </div>
      </a>

      <!-- Navigation Links -->
      <nav class="hidden md:flex items-center gap-8 text-sm font-semibold text-slate-600">
        <a href="#caracteristicas" class="hover:text-brand-600 transition-colors">Características</a>
        <a href="#como-funciona" class="hover:text-brand-600 transition-colors">Cómo funciona</a>
        <a href="#metas" class="hover:text-brand-600 transition-colors">Metas de Ahorro</a>
        <a href="#seguridad" class="hover:text-brand-600 transition-colors">Seguridad</a>
      </nav>

      <!-- Right CTAs -->
      <div class="flex items-center gap-4">
        <a href="#login" class="text-sm font-semibold text-slate-700 hover:text-brand-600 px-3 py-2 transition-colors">
          Iniciar Sesión
        </a>
        <a href="#registro" class="inline-flex items-center gap-1.5 px-5 py-2.5 rounded-xl bg-brand-600 hover:bg-brand-700 text-white text-sm font-semibold shadow-md shadow-brand-600/20 hover:shadow-lg hover:shadow-brand-600/30 transition-all duration-200">
          <span class="">Registrarse</span>
        </a>
      </div>
    </div>
  </header>

  <!-- MAIN CONTENT -->
  <main class="w-full overflow-hidden">

    <!-- HERO SECTION -->
    <section class="relative pt-12 pb-20 lg:pt-20 lg:pb-28 px-6 lg:px-12">
      <!-- Background Ambient Glows -->
      <div class="absolute -top-32 right-1/4 w-[500px] h-[500px] bg-brand-100/60 rounded-full blur-3xl pointer-events-none -z-10"></div>
      <div class="absolute top-80 -left-20 w-[400px] h-[400px] bg-emerald-50 rounded-full blur-3xl pointer-events-none -z-10"></div>

      <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">
        <!-- Left Column: Copy & Actions -->
        <div class="lg:col-span-6 flex flex-col items-start gap-6">
          <!-- Real-time Badge -->
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-50 border border-brand-200/80 text-brand-700 shadow-sm">
            <span class="relative flex h-2.5 w-2.5">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand-500 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-brand-600"></span>
            </span>
            <span class="text-xs font-bold tracking-wide uppercase">Análisis Inteligente en Tiempo Real</span>
          </div>

          <!-- Main Heading -->
          <h1 class="text-4xl sm:text-5xl lg:text-[54px] font-extrabold text-slate-900 tracking-tight leading-[1.12]">
            Toma el control absoluto de tus <span class="text-brand-600 underline decoration-brand-200 decoration-4 underline-offset-4">finanzas personales</span>
          </h1>

          <!-- Subtitle -->
          <p class="text-lg text-slate-600 leading-relaxed max-w-xl">
            Automatiza tus presupuestos, proyecta tus metas de ahorro y analiza tus gastos con inteligencia artificial.
          </p>

          <!-- CTAs Group -->
          <div class="flex flex-wrap items-center gap-4 pt-2 w-full sm:w-auto">
            <a href="#registro" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-bold text-sm rounded-xl shadow-lg shadow-brand-600/25 hover:shadow-xl hover:shadow-brand-600/35 transition-all duration-200 transform hover:-translate-y-0.5">
              <span class="">Iniciar Sesión</span>
              <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
            
          </div>

          <!-- Social Proof Rating -->
          <div class="flex items-center gap-3 pt-2">
            <div class="flex text-amber-400">
              <span class="material-symbols-outlined text-[20px]">star</span>
              <span class="material-symbols-outlined text-[20px]">star</span>
              <span class="material-symbols-outlined text-[20px]">star</span>
              <span class="material-symbols-outlined text-[20px]">star</span>
              <span class="material-symbols-outlined text-[20px]">star</span>
            </div>
            <span class="text-xs font-semibold text-slate-600">
              <strong class="text-slate-900">4.9/5</strong> por más de 10,000 usuarios activos
            </span>
          </div>
        </div>

        <!-- Right Column: Interactive Financial Mockup Card -->
        <div class="lg:col-span-6 w-full">
          <div class="relative max-w-lg mx-auto lg:max-w-none">
            <!-- Background Aura -->
            <div class="absolute inset-0 bg-gradient-to-tr from-brand-600/20 to-teal-500/20 rounded-3xl blur-2xl transform rotate-1 scale-95 -z-10"></div>

            <!-- Dashboard Card Container -->
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl shadow-slate-200/70 border border-slate-100 flex flex-col gap-6">
              
              <!-- Card Top Row: Balance & Growth -->
              <div class="flex items-start justify-between">
                <div>
                  <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Patrimonio Neto Disponible</span>
                  <div class="flex items-baseline gap-2 mt-1">
                    <span class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">$24,580.00</span>
                    <span class="text-sm font-semibold text-slate-500">USD</span>
                  </div>
                </div>
                <div class="inline-flex items-center gap-1 px-3 py-1.5 rounded-full bg-brand-50 border border-brand-200 text-brand-700 text-xs font-bold shadow-sm">
                  <span class="material-symbols-outlined text-[16px]">trending_up</span>
                  <span class="">+14.2%</span>
                </div>
              </div>

              <!-- Quick Analytical Tabs -->
              <div class="flex items-center gap-2 border-b border-slate-100 pb-3">
                <span class="px-3 py-1 rounded-lg bg-brand-600 text-white text-xs font-semibold">Este Mes</span>
                <span class="px-3 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 transition-colors cursor-pointer">Trimestre</span>
                <span class="px-3 py-1 rounded-lg bg-slate-100 text-slate-600 text-xs font-medium hover:bg-slate-200 transition-colors cursor-pointer">Año 2025</span>
                <div class="ml-auto flex items-center gap-1 text-xs text-brand-600 font-medium">
                  <span class="material-symbols-outlined text-[16px]">verified</span>
                  <span class="">Actualizado</span>
                </div>
              </div>

              <!-- Mini Chart: Monthly Flow -->
              <div class="bg-slate-50 rounded-2xl p-4 sm:p-5 border border-slate-100 flex flex-col gap-3">
                <div class="flex items-center justify-between text-xs font-semibold text-slate-700">
                  <span class="">Flujo Mensual (Ingresos vs Gastos)</span>
                  <div class="flex items-center gap-3">
                    <span class="flex items-center gap-1 text-slate-600"><span class="w-2.5 h-2.5 rounded-full bg-brand-600"></span> Ingresos</span>
                    <span class="flex items-center gap-1 text-slate-400"><span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span> Gastos</span>
                  </div>
                </div>
                <!-- Custom Bars -->
                <div class="h-28 flex items-end justify-between gap-3 pt-2">
                  <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                    <div class="w-full flex items-end justify-center gap-1 h-20">
                      <div class="w-3.5 bg-brand-600/70 rounded-t-sm" style="height: 55%;"></div>
                      <div class="w-3.5 bg-slate-300 rounded-t-sm" style="height: 40%;"></div>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Ene</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                    <div class="w-full flex items-end justify-center gap-1 h-20">
                      <div class="w-3.5 bg-brand-600/70 rounded-t-sm" style="height: 70%;"></div>
                      <div class="w-3.5 bg-slate-300 rounded-t-sm" style="height: 45%;"></div>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Feb</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                    <div class="w-full flex items-end justify-center gap-1 h-20">
                      <div class="w-3.5 bg-brand-600/70 rounded-t-sm" style="height: 85%;"></div>
                      <div class="w-3.5 bg-slate-300 rounded-t-sm" style="height: 50%;"></div>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Mar</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                    <div class="w-full flex items-end justify-center gap-1 h-20">
                      <div class="w-3.5 bg-brand-600/70 rounded-t-sm" style="height: 75%;"></div>
                      <div class="w-3.5 bg-slate-300 rounded-t-sm" style="height: 42%;"></div>
                    </div>
                    <span class="text-[11px] font-semibold text-slate-400">Abr</span>
                  </div>
                  <div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
                    <div class="w-full flex items-end justify-center gap-1 h-20">
                      <div class="w-3.5 bg-brand-600 rounded-t-sm shadow-md shadow-brand-600/30" style="height: 98%;"></div>
                      <div class="w-3.5 bg-brand-200 rounded-t-sm" style="height: 38%;"></div>
                    </div>
                    <span class="text-[11px] font-bold text-brand-700">May</span>
                  </div>
                </div>
              </div>

              <!-- Savings Target Progress Module -->
              <div class="bg-brand-50/70 rounded-2xl p-4 sm:p-5 border border-brand-100 flex flex-col gap-3">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-brand-600 text-white flex items-center justify-center shadow-md shadow-brand-600/20">
                      <span class="material-symbols-outlined text-[20px]">savings</span>
                    </div>
                    <div>
                      <h4 class="text-sm font-bold text-slate-900 leading-tight">Meta: Fondo de Emergencia y Viaje</h4>
                      <p class="text-xs text-slate-500 mt-0.5">$7,800 de $10,000 USD completados</p>
                    </div>
                  </div>
                  <span class="text-sm font-extrabold text-brand-700 bg-white px-2.5 py-1 rounded-lg border border-brand-200">78%</span>
                </div>
                <!-- Progress bar -->
                <div class="w-full bg-slate-200 rounded-full h-2.5 overflow-hidden">
                  <div class="bg-brand-600 h-full rounded-full" style="width: 78%;"></div>
                </div>
                <div class="flex items-center justify-between text-xs text-slate-500 pt-0.5">
                  <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-[14px] text-brand-600">schedule</span>
                    Proyección de meta: Agosto 2025
                  </span>
                  <span class="text-brand-700 font-semibold">Ritmo óptimo</span>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- KPI METRICS BAR -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 -mt-4 mb-20 lg:mb-28">
      <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-lg shadow-slate-200/60 border border-slate-100 grid grid-cols-1 md:grid-cols-3 gap-8 divide-y md:divide-y-0 md:divide-x divide-slate-100">
        
        <!-- KPI 1 -->
        <div class="flex items-center gap-5 pt-4 md:pt-0">
          <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 border border-brand-100">
            <span class="material-symbols-outlined text-[32px]">group</span>
          </div>
          <div>
            <div class="text-3xl font-extrabold text-slate-900 tracking-tight">+10,000</div>
            <div class="text-sm font-bold text-brand-700 mt-0.5">Usuarios activos</div>
            <p class="text-xs text-slate-500 mt-1">Gestionando su patrimonio y ahorros a diario.</p>
          </div>
        </div>

        <!-- KPI 2 -->
        <div class="flex items-center gap-5 pt-8 md:pt-0 md:pl-8">
          <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 border border-brand-100">
            <span class="material-symbols-outlined text-[32px]">shield_lock</span>
          </div>
          <div>
            <div class="text-3xl font-extrabold text-slate-900 tracking-tight">100%</div>
            <div class="text-sm font-bold text-brand-700 mt-0.5">Cifrado de nivel bancario</div>
            <p class="text-xs text-slate-500 mt-1">Seguridad SSL 256-bit y auditoría SOC2 continua.</p>
          </div>
        </div>

        <!-- KPI 3 -->
        <div class="flex items-center gap-5 pt-8 md:pt-0 md:pl-8">
          <div class="w-14 h-14 rounded-2xl bg-brand-50 text-brand-600 flex items-center justify-center shrink-0 border border-brand-100">
            <span class="material-symbols-outlined text-[32px]">star</span>
          </div>
          <div>
            <div class="text-3xl font-extrabold text-slate-900 tracking-tight">4.9 / 5</div>
            <div class="text-sm font-bold text-brand-700 mt-0.5">Calificación de usuarios</div>
            <p class="text-xs text-slate-500 mt-1">Basado en más de 2,400 opiniones en plataformas.</p>
          </div>
        </div>

      </div>
    </section>

    <!-- CARACTERÍSTICAS CLAVE SECTION -->
    <section id="caracteristicas" class="max-w-7xl mx-auto px-6 lg:px-12 mb-24 lg:mb-32">
      <div class="text-center max-w-2xl mx-auto mb-16">
        <div class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-bold uppercase tracking-wider mb-3">
          Potencia y Simplicidad
        </div>
        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
          Características clave para hacer crecer tu dinero
        </h2>
        <p class="text-slate-600 mt-3 text-base">
          Herramientas inteligentes diseñadas para simplificar tu vida financiera sin hojas de cálculo complicadas.
        </p>
      </div>

      <!-- 4 Columns Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        
        <!-- Tarjeta 1 -->
        <div class="bg-white rounded-2xl p-7 border border-slate-100 shadow-sm hover:shadow-xl hover:border-brand-200 transition-all duration-300 group flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5 group-hover:bg-brand-600 group-hover:text-white transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[26px]">account_balance_wallet</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-700 transition-colors">
              Presupuestos Inteligentes
            </h3>
            <p class="text-sm text-slate-600 mt-2.5 leading-relaxed">
              Categorización automática de cada gasto en tiempo real mediante algoritmos de IA predictivos.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-brand-600 gap-1">
            <span class="">Saber más</span>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
          </div>
        </div>

        <!-- Tarjeta 2 -->
        <div class="bg-white rounded-2xl p-7 border border-slate-100 shadow-sm hover:shadow-xl hover:border-brand-200 transition-all duration-300 group flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5 group-hover:bg-brand-600 group-hover:text-white transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[26px]">flag</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-700 transition-colors">
              Metas de Ahorro Proyectadas
            </h3>
            <p class="text-sm text-slate-600 mt-2.5 leading-relaxed">
              Seguimiento visual de objetivos personales con barras de progreso y fechas estimadas de cumplimiento.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-brand-600 gap-1">
            <span class="">Saber más</span>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
          </div>
        </div>

        <!-- Tarjeta 3 -->
        <div class="bg-white rounded-2xl p-7 border border-slate-100 shadow-sm hover:shadow-xl hover:border-brand-200 transition-all duration-300 group flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5 group-hover:bg-brand-600 group-hover:text-white transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[26px]">bar_chart</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-700 transition-colors">
              Reportes y Gráficos Visuales
            </h3>
            <p class="text-sm text-slate-600 mt-2.5 leading-relaxed">
              Visualización cristalina de flujos de efectivo, balances de ingresos versus egresos y tendencias históricas.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-brand-600 gap-1">
            <span class="">Saber más</span>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
          </div>
        </div>

        <!-- Tarjeta 4 -->
        <div class="bg-white rounded-2xl p-7 border border-slate-100 shadow-sm hover:shadow-xl hover:border-brand-200 transition-all duration-300 group flex flex-col justify-between">
          <div>
            <div class="w-12 h-12 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center mb-5 group-hover:bg-brand-600 group-hover:text-white transition-colors shadow-sm">
              <span class="material-symbols-outlined text-[26px]">verified_user</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-700 transition-colors">
              Seguridad Garantizada
            </h3>
            <p class="text-sm text-slate-600 mt-2.5 leading-relaxed">
              Protección de datos con cifrado de grado militar, autenticación biométrica y certificación SOC2 Tipo II.
            </p>
          </div>
          <div class="mt-6 pt-4 border-t border-slate-100 flex items-center text-xs font-bold text-brand-600 gap-1">
            <span class="">Saber más</span>
            <span class="material-symbols-outlined text-[16px]">chevron_right</span>
          </div>
        </div>

      </div>
    </section>

    <!-- CÓMO FUNCIONA SECTION -->
    <section id="como-funciona" class="bg-white py-20 lg:py-28 border-y border-slate-100">
      <div class="max-w-7xl mx-auto px-6 lg:px-12">
        <div class="text-center max-w-2xl mx-auto mb-16">
          <div class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-bold uppercase tracking-wider mb-3">
            Paso a Paso
          </div>
          <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
            ¿Cómo funciona ?
          </h2>
          <p class="text-slate-600 mt-3 text-base">
            Comienza a ordenar tus finanzas y alcanzar tus metas en tres sencillos pasos.
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
          <!-- Step 1 -->
          <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200/60 flex flex-col items-start relative hover:bg-white hover:shadow-xl hover:border-brand-200 transition-all duration-300">
            <div class="w-12 h-12 rounded-xl bg-brand-600 text-white font-extrabold text-xl flex items-center justify-center mb-6 shadow-md shadow-brand-600/20">
              1
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">
              Crea tu cuenta en menos de 1 minuto
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Sin procesos bancarios lentos ni comisiones ocultas. Regístrate de forma inmediata con tu correo electrónico.
            </p>
            <div class="mt-6 inline-flex items-center gap-1 text-xs font-bold text-brand-600">
              <span class="material-symbols-outlined text-[16px]">bolt</span>
              <span class="">Proceso 100% digital</span>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200/60 flex flex-col items-start relative hover:bg-white hover:shadow-xl hover:border-brand-200 transition-all duration-300">
            <div class="w-12 h-12 rounded-xl bg-brand-600 text-white font-extrabold text-xl flex items-center justify-center mb-6 shadow-md shadow-brand-600/20">
              2
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">
              Registra tus ingresos, gastos y metas
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Agrega tus transacciones o sincroniza tus cuentas. Nuestro motor inteligente clasifica cada movimiento automáticamente.
            </p>
            <div class="mt-6 inline-flex items-center gap-1 text-xs font-bold text-brand-600">
              <span class="material-symbols-outlined text-[16px]">sync_alt</span>
              <span class="">Categorización con IA</span>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="bg-slate-50 rounded-2xl p-8 border border-slate-200/60 flex flex-col items-start relative hover:bg-white hover:shadow-xl hover:border-brand-200 transition-all duration-300">
            <div class="w-12 h-12 rounded-xl bg-brand-600 text-white font-extrabold text-xl flex items-center justify-center mb-6 shadow-md shadow-brand-600/20">
              3
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">
              Visualiza tu salud financiera y decide
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
              Descubre patrones de gasto, obtén recomendaciones personalizadas y observa cómo tus metas de ahorro se hacen realidad.
            </p>
            <div class="mt-6 inline-flex items-center gap-1 text-xs font-bold text-brand-600">
              <span class="material-symbols-outlined text-[16px]">trending_up</span>
              <span class="">Crecimiento constante</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FINAL CTA BANNER -->
    <section class="max-w-7xl mx-auto px-6 lg:px-12 py-20 lg:py-28">
      <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-brand-800 via-brand-700 to-teal-800 text-white p-10 sm:p-14 lg:p-16 shadow-2xl shadow-brand-900/30">
        <!-- Decorative SVG / Circles in Background -->
        <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-brand-500/20 rounded-full blur-2xl pointer-events-none"></div>
        <div class="absolute -left-10 -top-10 w-64 h-64 bg-teal-400/20 rounded-full blur-2xl pointer-events-none"></div>

        <div class="relative z-10 max-w-3xl mx-auto text-center flex flex-col items-center">
          <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center mb-6 border border-white/20 shadow-inner">
            <img src="https://lh3.googleusercontent.com/aida/AEtjO1UMIVvHa-J6LdhLht6FdmHa9rdLtbLRWyR4nCx3uJU-I_futDGPR0gM_Y1zk8L7-J-9LSeef8HMwIBjmDbzyDYr4EC75knTpna_fFPN1wasnpi4FSKbUvnLqb3LISrBqsO8L7UxBZ4b4mD68vOLTluqXyPbWvqy2T5N13suVC5XxPfcME672Sk6LplWWJc8LKLhd1ilwU3PyFX8cI2MOtCCT59rze3RD_YW3XTGwX05ag" alt="my money" class="w-10 h-10 object-contain drop-shadow">
          </div>

          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight">
            Empieza a transformar tu futuro financiero hoy mismo
          </h2>

          <p class="text-brand-100 text-base sm:text-lg mt-4 max-w-2xl leading-relaxed">
            Únete a más de 10,000 usuarios que ya optimizan sus presupuestos, ahorran con propósito y toman el control de sus finanzas.
          </p>

          <div class="mt-8 flex flex-wrap items-center justify-center gap-4">
            <a href="#registro" class="inline-flex items-center justify-center gap-2 px-8 py-4 bg-white hover:bg-slate-50 text-brand-800 font-extrabold text-base rounded-xl shadow-xl hover:shadow-2xl transition-all duration-200 transform hover:-translate-y-0.5">
              <span class="">Crear Cuenta&nbsp;</span>
              <span class="material-symbols-outlined text-[20px]">arrow_forward</span>
            </a>
            <a href="#demo" class="inline-flex items-center justify-center gap-2 px-7 py-4 bg-brand-900/40 hover:bg-brand-900/60 text-white border border-white/20 font-semibold text-base rounded-xl transition-all">
              <span class="">Hablar con un asesor</span>
            </a>
          </div>

          <div class="mt-6 flex flex-wrap items-center justify-center gap-6 text-xs text-brand-200">
            <span class="flex items-center gap-1.5">
              <span class="material-symbols-outlined text-[16px] text-brand-300">check_circle</span>
              Sin tarjeta de crédito requerida
            </span>
            <span class="flex items-center gap-1.5">
              <span class="material-symbols-outlined text-[16px] text-brand-300">check_circle</span>
              Configuración en 60 segundos
            </span>
            <span class="flex items-center gap-1.5">
              <span class="material-symbols-outlined text-[16px] text-brand-300">check_circle</span>
              Cancela cuando quieras
            </span>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- FOOTER -->
  <footer class="bg-white border-t border-slate-200 pt-16 pb-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">
      <div class="flex flex-col md:flex-row items-center justify-between gap-8 pb-12 border-b border-slate-100">
        
        <!-- Brand & Description -->
        <div class="flex items-center gap-3.5">
          
          <div>
            
            <p class="text-xs text-slate-500">Gestor Inteligente de Finanzas Personales</p>
          </div>
        </div>

        <!-- Trust badges -->
        <div class="flex flex-wrap items-center justify-center gap-6 text-xs font-semibold text-slate-500">
          <div class="flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 rounded-full border border-slate-200">
            <span class="material-symbols-outlined text-brand-600 text-[18px]">lock</span>
            <span class="">Datos protegidos</span>
          </div>
          <div class="flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 rounded-full border border-slate-200">
            <span class="material-symbols-outlined text-brand-600 text-[18px]">verified</span>
            <span class="">Auditoría SOC2</span>
          </div>
          <div class="flex items-center gap-1.5 px-3 py-1.5 bg-slate-50 rounded-full border border-slate-200">
            <span class="material-symbols-outlined text-brand-600 text-[18px]">security</span>
            <span class="">Cifrado SSL 256-bit</span>
          </div>
        </div>

      </div>

      <!-- Copyright & Legal -->
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-8 text-xs text-slate-500">
        <p class="">© 2025 my money Inc. Todos los derechos reservados.</p>
        <div class="flex items-center gap-6">
          <a href="#privacidad" class="hover:text-brand-600 transition-colors">Privacidad</a>
          <a href="#terminos" class="hover:text-brand-600 transition-colors">Términos de Servicio</a>
          <a href="#cookies" class="hover:text-brand-600 transition-colors">Cookies</a>
          <a href="#soporte" class="hover:text-brand-600 transition-colors">Soporte</a>
        </div>
      </div>
    </div>
  </footer>






</body></html>