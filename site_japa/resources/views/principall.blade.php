<!DOCTYPE html>
<html lang="">
<head>
  <title>Jap Restaurant</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="/css/layout.css" rel="stylesheet" type="text/css" media="all">
  <style type="text/css">
  a:link{
    text-decoration:none;
  }
  </style>
</head>
<body id="top">

  <!-- Top Background Image Wrapper -->
  <div class="bgded overlay" style="background-image:url('img/comida.jpeg');">
    <!-- ################################################################################################ -->
    <div class="wrapper row1">
      <header id="header" class="hoc clear">
        <!-- ################################################################################################ -->
        <div id="logo" class="fl_left">

          <h1><a href="/">JAP RESTAURANT</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li><a href="index.html">Home</a></li>
            <li><a href="cardapio">Cardápio</a></li>
            <li><a href="index.html">Quem Somos</a></li>
            <li><a href="index.html">Contato</a></li>
            @if(Auth::check())
            <li><a>{{ Auth::user()->name }}</a></li>
            <a href="{{ url('/logout') }}"> SAIR </a>
            @endif
          </ul>
        </nav>
        <!-- ################################################################################################ -->
      </header>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    @yield('folderPrincipal')

    <!-- ################################################################################################ -->
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

  <div class="wrapper row4 bgded overlay" style="background-color:#610B0B">
    <footer id="footer" class="hoc clear">
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <h6 class="heading"> JAP Restaurant Paranaguá</h6>
        <ul class="nospace btmspace-30 linklist contact">
          <li><i class="fa fa-map-marker"></i>
            <address>
              Avenida Gabriel de Lara,1051 - Paranaguá
            </address>
          </li>
          <li><i class="fa fa-phone"></i> (41) 99945-5051</li>
          <li><i class="fa fa-envelope-o"></i> japsushibar@hotmail.com </li>
        </ul>
      </div>
      <div class="one_third">
        <h6 class="heading"> Horário de Funcionamento </h6>
        <ul class="nospace btmspace-30 linklist contact">
          <li><i class="fa fa-clock-o"></i> Segunda e Terça: 18:30 às 23:00</li>
          <li><i class="fa fa-clock-o"></i> Quarta à Sábado: 18:30 às 00:00</li>
          <li><i class="fa fa-clock-o"></i> Domingo: Fechado </li>
        </ul>
      </div>
      <div class="one_third">
        <h6 class="heading"> Curta nossa página no facebook </h6>

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.3";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <div class="fb-page" data-href="https://www.facebook.com/japsushibar/" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/fornoalenha"><a href="https://www.facebook.com/japsushibar/">Forno a Lenha Pizzaria</a></blockquote></div></div></div>
      </div>
    </div>
    <!-- ################################################################################################ -->
  </footer>
</div>


</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear">
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2019 Jap Restaurant - Todos os direitos reservados.</p>
    <p class="fl_right">Desenvolvimento - <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">Vanderson Mantovani Paifer</a></p>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.backtotop.js"></script>
<script src="js/jquery.mobilemenu.js"></script>
</body>
</html>
