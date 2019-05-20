<!DOCTYPE html>  
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/template/favicon.png') }}">
<title>Registo no Vanangas</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('css/owencss/animate.css') }}" rel="stylesheet">
<!-- Wizard CSS -->
<link href="{{ asset('bower_components/register-steps/steps.css') }} " rel="stylesheet">
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
<section id="wrapper" class="step-register">
  <div class="register-box">
    <div class="">
       <a href="javascript:void(0)" class="text-center db m-b-40"><img src="{{ asset('images/admin-logo-dark.png') }}" alt="Home" /><br/><img src="{{ asset('images/admin-text-dark.png') }}" alt="Home" /></a>
      <!-- multistep form -->
        <form id="msform" action="{{ route('register') }}" method="POST">
            {{ csrf_field() }}
            <!-- progressbar -->
            <ul id="eliteregister">
            <li class="active">Configuração da conta</li>        
            <li>Detalhes pessoais</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
            <h2 class="fs-title">Crie sua conta</h2>
            <h3 class="fs-subtitle">Este é o primeiro passo</h3>
            <input type="text" name="email" placeholder="Email" value="{{ old('email') }}" />
            @if ($errors->has('email'))
            <span class="text-danger">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
            <input type="password" name="password" placeholder="Senha" />
            @if ($errors->has('password'))
            <span class="text-danger">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
            <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirm Senha" />
            <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>    
            <fieldset>
            <h2 class="fs-title">Detalhes Pessoais</h2>
            <h3 class="fs-subtitle">Nunca iremos vender teus dados</h3>
            <input type="text" name="fname" placeholder="Primeiro Nome" value="{{ old('fname') }}" />
            @if ($errors->has('fname'))
            <span class="text-danger">
                <strong>{{ $errors->first('fname') }}</strong>
            </span>
            @endif
            <input type="text" name="lname" placeholder="Ultimo Nome" value="{{ old('lname') }}" />
            @if ($errors->has('lname'))
            <span class="text-danger">
                <strong>{{ $errors->first('lname') }}</strong>
            </span>
            @endif
            <input type="text" name="phone" placeholder="Telefone" value="{{ old('phone') }}" />
            @if ($errors->has('phone'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
            @endif        
            <input type="button" name="previous" class="previous action-button" value="Anterior" />
            <button type="submit" class=" action-button" onclick="event.preventDefault();
            document.getElementById('msform').submit();">Submeter</button> 
            </fieldset>
        </form>
        <div class="clear"></div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                <div class="social">
                    <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip"  title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> 
                    <a href="login/google" class="btn btn-googleplus" data-toggle="tooltip"  title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> 
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('css/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{ asset('bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
<script src="{{ asset('bower_components/register-steps/jquery.easing.min.js') }}"></script>
<script src="{{ asset('bower_components/register-steps/register-init.js') }}"></script>
<!--slimscroll JavaScript -->
<script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('js/waves.js') }}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/custom.js') }}"></script>
<!--Style Switcher -->
<script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>


</html>
