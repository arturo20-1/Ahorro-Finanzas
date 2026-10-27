{{-- Botón para cambiar entre modo claro y oscuro. Uso: @include('partials.theme-toggle') o @include('partials.theme-toggle', ['flotante' => true]) --}}
<button aria-label="Cambiar entre modo claro y oscuro" class="theme-toggle-btn {{ ($flotante ?? false) ? 'theme-toggle-float' : '' }}" id="theme-toggle" title="Modo claro / oscuro" type="button"><span class="material-symbols-outlined icon-moon">dark_mode</span><span class="material-symbols-outlined icon-sun">light_mode</span></button>
<script>
(function () {
  var boton = document.getElementById('theme-toggle');
  if (!boton) return;
  boton.addEventListener('click', function () {
    var raiz = document.documentElement;
    raiz.classList.add('theme-anim');
    var oscuro = !raiz.classList.contains('dark');
    raiz.classList.toggle('dark', oscuro);
    try { localStorage.setItem('theme', oscuro ? 'dark' : 'light'); } catch (e) {}
    setTimeout(function () { raiz.classList.remove('theme-anim'); }, 400);
  });
})();
</script>
