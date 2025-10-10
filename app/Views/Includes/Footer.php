<footer id="footer">
  <p class="text-center">&#0169; 2025 Plasc</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
  const $menuBtn = $('.app-menu__button');
  const $aside = $('aside');
  const $overlay = $('.overlay');

  // botão do menu
  $menuBtn.on('click', function(e){
    e.preventDefault();
    $(this).toggleClass('is-expanded');
    $aside.toggleClass('collapsed');
    $overlay.toggleClass('active');
  });

  // clicar fora fecha o menu
  $overlay.on('click', function(){
    $menuBtn.removeClass('is-expanded');
    $aside.addClass('collapsed');
    $(this).removeClass('active');
  });
});
</script>

</body>
</html>
