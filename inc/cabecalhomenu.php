<?php
include_once("cabecalho.php");
?>

<nav class="navbar navbar-inverse sticky-top navbar-expand-lg bg-menu">
  <a class="navbar-brand color-green" href="#">ASDAS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <i class="fas fa-bars color-green"></i>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav bg-menu style='width:100%;'">
    <li class="nav-item">
				<a class="nav-link text-center nav-link-black" href="#">Blog</a>
			</li>
      
  </div>
</nav>


<script>


  $(window).scroll(function() {
    if($(this).scrollTop() > 50)  /*height in pixels when the navbar becomes non opaque*/ 
    {
        $('.bg-menu').addClass('bg-menu-black');
        $('.nav-link-black').addClass('nav-link-white');
    } else {
        $('.bg-menu').removeClass('bg-menu-black');
        $('.nav-link-black').removeClass('nav-link-white');
    }
});$_COOKIE


</script>