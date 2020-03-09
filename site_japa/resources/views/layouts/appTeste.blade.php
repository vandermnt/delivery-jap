@extends('principal')

@section('conteudo')
<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->



@guest

@if (Route::has('register'))

@endif
@else
<li class="nav-item dropdown">
  <!-- <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
    {{ Auth::user()->name }} <span class="caret"></span>
  </a> -->

  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</div>
</li>
@endguest


<main class="py-4">
  @yield('content')
</main>
@stop
