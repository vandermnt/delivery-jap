@extends('layouts.appAdm')

@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>

<div class="container">
  <div class="d-flex justify-content-center">

    <div class="row">
      <div class="card bg-light mb-3" id="loginADM">
        <div class="card-header" style="background-color: #01A9DB; color: white"> <b> LOGIN ADMINISTRADOR </b></div>
        <div class="card-body">
          <form method="POST" action="{{ url('/admin/login') }}">
            @csrf

            <div class="form-group row">
              <div class="col-md-3" align="right">
              </div>
              <div class="col-md-8" align="right">
                <input id="email" type="email" placeholder="Digite seu e-mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <div class="col-md-3" align="right">
              </div>
              <div class="col-md-8">
                <input id="password" type="password"  placeholder="Digite sua senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>

            <div align="center">
              <div class="col-sm-12">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Esqueceu sua senha?') }}
                </a>
                @endif
              </div>
              <div class="col-sm-12">
                <button type="submit" align="center" class="btn btn-success">
                  <b> {{ __('ENTRAR') }} </b>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
