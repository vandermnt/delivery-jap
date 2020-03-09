<!DOCTYPE html>
<html lang="">
<head>
  <link rel="shortcut icon" href="/img/logo-jap.ico" type="image/x-icon"/>
  <title>JAP Restaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="google-site-verification" content="k3YJYavuvuCdVqi8mnoTOI1mkMyItzFvxH7NUIhYVRw" />

  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="/css/style3.css">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <!-- Font Awesome JS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="/css/layout.css" rel="stylesheet" type="text/css" media="all">
  <style type="text/css">
  a:link{
    text-decoration:none;
  }
  </style>
</head>
<body>

  <!-- Top Background Image Wrapper -->
  <!-- ################################################################################################ -->
  <div class="wrapper row1">
    <nav id="sidebar">
      <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
      </div>

      <div class="sidebar-header">
        <img src="/img/jp.jpeg">
      </div>

      <ul style="margin-top: -40px" class="list-unstyled components">
        <!-- <p>Dummy Heading</p> -->
        <li><div class="row">
          <i class="fas fa-home" style="font-size: 25px; margin-left: 38px; color:#FE2E2E"></i> <a href="/" style="padding-left:25px; font-family: 'Ubuntu', sans-serif; font-size:17px;"> Home</a>
        </div></li> <hr>
        <li><div class="row">
          <i class="fas fa-bullhorn" style="font-size: 25px;  margin-left: 38px; color:#FE2E2E;"></i> <a href="#" style="padding-left:25px; font-family: 'Ubuntu', sans-serif; font-size:17px"> Promoções</a><hr>
        </li>
        <li><div class="row">
          <i class="fas fa-shopping-cart" style="font-size: 25px;  margin-left: 38px; color:#FE2E2E"> </i> <a href="{{ url('/verpedido')}}" style="padding-left:25px; font-family: 'Ubuntu', sans-serif; font-size:17px"> Meu pedido</a><hr>
        </div></li>
        <li><div class="row">
          <i class="fas fa-cart-plus" style="font-size: 25px;  margin-left: 38px; color:#FE2E2E"> </i> <a href="{{ url('/pedido')}}" style="padding-left:25px; font-family: 'Ubuntu', sans-serif; font-size:17px"> Fazer pedido</a><hr>
        </div></li>
        <li><div class="row">
          <i class="fas fa-user-circle" style="font-size: 27px;  margin-left: 38px; color:#FE2E2E"></i> <a href="{{ url('/minhaconta')}}" style="padding-left:26px; font-family: 'Ubuntu', sans-serif; font-size:17px"> Minha Conta</a><hr>
        </div></li>
        <li><div class="row">
          <i class="fas fa-phone" style="font-size: 27px;  margin-left: 38px; color:#FE2E2E"></i> <a href="tel:99945-5051" style="padding-left:26px; font-family: 'Ubuntu', sans-serif; font-size:17px"> Pedir por Telefone</a><hr>
        </div></li>
        <li><div class="row">
          <i class="fas fa-sign-out-alt" style="font-size: 27px;  margin-left: 38px; color:#FE2E2E"></i> <a href="{{ url('/logout') }}" style="padding-left:26px; font-family: 'Ubuntu', sans-serif; font-size:17px"> Sair</a>
        </div></li>
      </ul>

      <!-- <ul class="list-unstyled CTAs">
      <li>
      <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
    </li>
    <li>
    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
  </li>
</ul> -->
</nav>

<!-- Page Content  -->
<nav class="navbar navbar-expand-lg navbar-light" style="height:65px; background-color:black">
  <div class="container-fluid">

    <div id="telaMobile">
      <button style="margin-top: -5px" type="button" id="sidebarCollapse" class="btn btn-danger">
        <i class="fas fa-align-left"></i>
        <span>Menu</span>
      </button>
    </div>
    <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-align-justify"></i>
  </button> -->

  <div class="collapse navbar-collapse" id="telaGrande">
    <ul class="nav navbar-nav ml-auto" style="margin-right: 120px; ">
      <li class="nav-item active">
        <a id="linksNav" style="color:white; font-size:18px; margin: 20px" class="nav-link" href="/">Início</a> 
      </li>
      <!-- <li class="nav-item">
        <a style="color:white; font-size:18px" class="nav-link" href="cardapio">CARDÁPIO</a>
      </li> -->
      @if(Auth::check())
      <li class="nav-item">
        <a id="linksNav" style="color:white; font-size:18px; margin: 20px" class="nav-link" href="{{ url('/minhaconta') }}">{{ Auth::user()->name }}</a>
      </li>
      <li class="nav-item">
        <a id="linksNav" style="color:white; font-size:18px; margin: 20px" class="nav-link" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Sair</a>
      </li>
      @endif
    </ul>
  </div>
</div>
</nav>
</div>


<div id="telaMobile">
<div class="bgded overlay" style="background-image:url('/img/walp.jpeg'); margin-top: -20px; background-position: left;">
  @yield('folderPrincipal')
</div>
</div>

<div id="telaGrande">
<div class="bgded overlay" style="background-image:url('/img/walp.jpeg'); margin-top: -20px;">
  @yield('folderPrincipal')
</div>
</div>
<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

@yield('conteudo')

<div class="wrapper row4 bgded overlay" style="background-color:#DF0101;">
  <footer id="footer" class="hoc clear">
    <!-- ################################################################################################ -->
    <div class="one_third first">
      <h6 id="rodapeFont" class="heading"> JAP Restaurant Paranaguá</h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fas fa-map-marker-alt"></i>
          Avenida Gabriel de Lara,1051 - Paranaguá
        </li>
        <li><i class="fa fa-phone"></i> <a style="color: white" href="https://wa.me/5541999455051?text=">(41) 99945-5051</a></li>
        <li><i class="fa fa-envelope"></i> <a style="color: white" href="mailto:japsushibar@hotmail.com">japsushibar@hotmail.com</a> </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 id="rodapeFont" class="heading"> Horário de Funcionamento </h6>
      <ul class="nospace btmspace-30 linklist contact">
        <li><i class="fa fa-clock"></i> Segunda e Terça: 18:30 às 23:30</li>
        <li><i class="fa fa-clock"></i> Quarta à Sábado: 18:30 às 00:00</li>
        <li><i class="fa fa-clock"></i> Domingo: Fechado </li>
      </ul>
    </div>
    <div class="one_third">
      <h6 id="rodapeFont" class="heading"> Curta nossa página no facebook </h6>

      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <div class="fb-page" data-href="https://www.facebook.com/japsushibar/" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/fornoalenha"><a href="https://www.facebook.com/japsushibar/">Jap Restaurant</a></blockquote></div></div></div>
    </div>
  </div>
  <!-- ################################################################################################ -->
</footer>
</div>


</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear">
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2019 J.A.P Restaurant - Todos os direitos reservados.</p>
    <p class="fl_right">Desenvolvimento: <a target="_blank" href="https://www.facebook.com/vanderson.mantovani" title="">Vanderson Mantovani </a></p>
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.backtotop.js"></script>
<script src="/js/jquery.mobilemenu.js"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
  $("#sidebar").mCustomScrollbar({
    theme: "minimal"
  });

  $('#dismiss, .overlay').on('click', function () {
    $('#sidebar').removeClass('active');
    $('.overlay').removeClass('active');
  });

  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').addClass('active');
    $('.overlay').addClass('active');
    $('.collapse.in').toggleClass('in');
    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
  });
});
</script>
</body>
</html>
