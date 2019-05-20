<!DOCTYPE html>  
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/template/favicon.png') }}">
<title>Login Vanangas</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('css/owencss/animate.css') }}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{ asset('css/owencss/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<link href="{{ asset('css/owencss/colors/default.css') }}" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
      <div class="lg-info-panel">
              <div class="inner-panel">
                  {{--  <a href="javascript:void(0)" class="p-20 di"><img src="{{ asset('images/admin-logo.png') }}"></a>  --}}
                  <div class="lg-content">
                      <h2>BEM VINDO AO SISTEMA DA BIBLIOTECA DO DEPARTAMENTO DE MATEMATICA E INFORMATICA</h2>
                      <p class="text-muted">Procure lívros, trabalhos de anos passados de forma rápida, e mais... </p>
                      {{--  <a href="#" class="btn btn-rounded btn-info p-l-20 p-r-20"> Obter Aplicaçao Movel</a>  --}}
                  </div>
              </div>
      </div>
      <div class="new-login-box">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Entre no Sistema</h3>
                    <small>Introduza as suas credenciais no formulário abaixo</small>
                  <form class="form-horizontal new-lg-form" id="loginform" action="{{ route('logar') }}">
                    {{ csrf_field() }}
                    <div class="form-group  m-t-20">
                      <div class="col-xs-12">
                        <label>Email</label>
                        <input class="form-control" type="text" required="" name="email" value="{{ old('email') }}" placeholder="Username">
                        @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label>Senha</label>
                        <input class="form-control" type="password" name="password" required="" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="checkbox checkbox-info pull-left p-t-0">
                          <input id="checkbox-signup" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                          <label for="checkbox-signup"> Lembrar-me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Esqueceu-se da Senha?</a> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                      </div>
                    </div>
                    {{--  <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social">
                          <a href="login/facebook" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> 
                          <a href="login/google" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> 
                        </div>
                      </div>
                    </div>  --}}
                    <div class="form-group m-b-0 row">
                      <div class="col-sm-12 text-center">
                        <p>Nao tem conta? <a href="{{ route('criarconta')}}" class="text-primary m-l-5"><b>Criar Conta</b></a></p>
                      </div>
                    </div>
                  </form>
                  <form class="form-horizontal" id="recoverform" action="">
                        {{ csrf_field() }}
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <h3>Recuperar Senha</h3>
                        <p class="text-muted">Introduza seu email e iremos enviar-lhe instruçoes! </p>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" type="text" required="" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                      <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                      </div>
                    </div>
                  </form>
                </div>
      </div>            
  
  
</section>
<!-- jQuery -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('css/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>

<!--slimscroll JavaScript -->
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/custom.js') }}"></script>
<!--Style Switcher -->
<script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>

<script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '{your-app-id}',
        cookie     : true,
        xfbml      : true,
        version    : '{api-version}'
      });
        
      FB.AppEvents.logPageView();   
        
    };
  
    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
</body>

</html>
