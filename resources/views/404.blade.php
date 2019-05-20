<!DOCTYPE html>  
<html lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/template/favicon.png') }}">
<title>Vanangas</title>
<!-- Bootstrap Core CSS -->
<link href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{ asset('css/owencss/animate.css') }}" rel="stylesheet">

<!-- Custom CSS -->
<link href="{{ asset('css/owencss/style.css') }}" rel="stylesheet">
<!-- color CSS -->
<link href="{{ asset('css/owencss/colors/default.css') }}" id="theme"  rel="stylesheet">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->

<section id="wrapper" class="error-page">
  <div class="error-box">
    <div class="error-body text-center">
      <h1 class="text-danger">404</h1>
      <h3 class="text-uppercase">Pagina Nao encontrada !</h3>
      <p class="text-muted m-t-30 m-b-30">Lamentamos, a página que tentou aceder nao existe</p>
      <a href="{{ route('home') }}" class="btn btn-danger btn-rounded waves-effect waves-light m-b-40">Ir a páagina inicial</a> 
    </div>
    <footer class="footer text-center">2017 © Vanangas.</footer>
  </div>
</section>
<!-- jQuery -->
<script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('css/bootstrap/dist/js/bootstrap.min.js') }}"></script>


</body>


</html>
