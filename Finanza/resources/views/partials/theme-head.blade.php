{{-- Modo oscuro para las páginas públicas (inicio, login y login de administrador). --}}
{{-- Aplica la preferencia guardada antes de pintar la página, para evitar un parpadeo blanco. --}}
<script>(function(){try{var t=localStorage.getItem('theme');var d=t?t==='dark':window.matchMedia('(prefers-color-scheme: dark)').matches;document.documentElement.classList.toggle('dark',d);}catch(e){}})();</script>
<style>
/* ---- botón de cambio de tema ---- */
.theme-toggle-btn{display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:9999px;color:#475569;background:transparent;border:0;cursor:pointer;transition:background-color .2s,color .2s,transform .3s}
.theme-toggle-btn:hover{background:rgba(100,116,139,.15);transform:rotate(15deg)}
.theme-toggle-btn .icon-sun{display:none}
.theme-toggle-float{position:fixed;top:12px;right:12px;z-index:60;background:rgba(255,255,255,.88);box-shadow:0 4px 14px rgba(0,0,0,.12);-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px)}
html.theme-anim *{transition:background-color .3s ease,color .3s ease,border-color .3s ease !important}

/* ---- modo oscuro ---- */
.dark{color-scheme:dark}
.dark body{background-color:#09110e;color:#dfe9e4}
.dark body.bg-emerald-50,.dark body.bg-slate-50{background-color:#09110e}
.dark .theme-toggle-btn{color:#d1e0d8}
.dark .theme-toggle-btn:hover{background:rgba(209,224,216,.12)}
.dark .theme-toggle-btn .icon-moon{display:none}
.dark .theme-toggle-btn .icon-sun{display:inline}
.dark .theme-toggle-float{background:rgba(16,26,22,.92);box-shadow:0 4px 14px rgba(0,0,0,.55)}

/* fondos */
.dark .bg-white{background-color:#101a16}
.dark .bg-white\/80{background-color:rgba(9,17,14,.82)}
.dark .bg-slate-50{background-color:#09110e}
.dark .bg-slate-100{background-color:#16221d}
.dark .bg-slate-200{background-color:#1d2b25}
.dark .bg-slate-300{background-color:#2a3b34}
.dark .bg-brand-50,.dark .bg-emerald-50{background-color:rgba(16,185,129,.12)}
.dark .bg-brand-100{background-color:rgba(16,185,129,.18)}
.dark .bg-emerald-50\/50{background-color:rgba(16,185,129,.08)}
.dark .bg-rose-50{background-color:rgba(244,63,94,.12)}
.dark .bg-emerald-200\/50{background-color:rgba(16,185,129,.16)}
.dark .bg-teal-200\/50{background-color:rgba(45,212,191,.1)}
.dark .hover\:bg-white:hover,.dark .hover\:bg-slate-50:hover{background-color:#16221d}
.dark .hover\:bg-slate-200:hover{background-color:#25352e}
.dark .hover\:bg-emerald-50\/50:hover{background-color:rgba(16,185,129,.08)}

/* textos */
.dark .text-slate-900{color:#eaf2ee}
.dark .text-slate-800{color:#dfe9e4}
.dark .text-slate-700{color:#c8d5ce}
.dark .text-slate-600{color:#aab9b1}
.dark .text-slate-500{color:#8fa198}
.dark .text-slate-400{color:#7b8d84}
.dark .text-brand-600,.dark .text-emerald-600{color:#34d399}
.dark .text-brand-700,.dark .text-emerald-700{color:#6ee7b7}
.dark .text-brand-800,.dark .text-emerald-800,.dark .text-emerald-900,.dark .text-emerald-950{color:#a7f3d0}
.dark .text-rose-700{color:#fda4af}
.dark .text-rose-500{color:#fb7185}
.dark .hover\:text-brand-600:hover,.dark .hover\:text-emerald-700:hover,.dark .hover\:text-emerald-900:hover{color:#6ee7b7}
.dark .placeholder\:text-slate-400::placeholder,.dark ::placeholder{color:#6f8178}

/* bordes y sombras */
.dark .border-slate-100{border-color:#1a2722}
.dark .border-slate-200,.dark .border-slate-300{border-color:#2a3b34}
.dark .border-slate-200\/60{border-color:rgba(42,59,52,.6)}
.dark .border-brand-100,.dark .border-emerald-100{border-color:rgba(16,185,129,.2)}
.dark .border-brand-200{border-color:rgba(16,185,129,.3)}
.dark .border-emerald-300,.dark .hover\:border-emerald-300:hover,.dark .hover\:border-brand-200:hover{border-color:rgba(52,211,153,.4)}
.dark .border-rose-200{border-color:rgba(244,63,94,.3)}
.dark [class*="shadow-slate-"]{box-shadow:0 12px 30px -14px rgba(0,0,0,.7)}

/* formularios */
.dark input:not([type=checkbox]):not([type=radio]),.dark select,.dark textarea{background-color:#0c1511;color:#eaf2ee;border-color:#2a3b34}
.dark input[type=checkbox]:not(:checked),.dark input[type=radio]:not(:checked){background-color:#0c1511;border-color:#3b4f46}
.dark input:-webkit-autofill{-webkit-text-fill-color:#eaf2ee;-webkit-box-shadow:0 0 0 1000px #0c1511 inset}
</style>
