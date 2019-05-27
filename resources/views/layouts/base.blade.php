<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/template/favicon.png') }}">
    <title>Vanangas</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="{{ asset('css/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="{{ asset('css/owencss/animate.css') }}" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="{{ asset('css/owencss/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/owencss/colors/default.css') }}" id="theme" rel="stylesheet">
    @yield("css")
    
    <!--[if lt IE 9]>
       
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <div id="wrapper">
        <!-- Top Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <!-- Toggle icon for mobile view -->
                <div class="top-left-part">
                    <!-- Logo -->
                    <a class="logo" href="index.html">
                        <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon--><img src="{{ asset('images/template/admin-logo.png') }}" alt="home" class="dark-logo" /><!--This is light logo icon--><img src="{{ asset('images/template/admin-logo-dark.png') }}" alt="home" class="light-logo" />
                     </b>
                        <!-- Logo text image you can use text also --><span class="hidden-xs">
                        <!--This is dark logo text--><img src="{{ asset('images/template/admin-text.png') }}" alt="home" class="dark-logo" /><!--This is light logo text-->
                        <img src="{{ asset('images/template/admin-text-dark.png') }}" alt="home" class="light-logo" />
                     </span> </a>
                </div>
                <!-- /Logo -->
                <!-- Search input and Toggle icon -->
                <ul class="nav navbar-top-links navbar-left">
                    <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-gmail"></i>
                            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <a href="#">
                                        <div class="user-img"> <img src="{{ asset('images/template/users/user.png') }}" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="text-center" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- .Task dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"> <i class="mdi mdi-check-circle"></i>
                            <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                        </a>
                        <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                            <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        <p> <strong>Task 1</strong> <span class="pull-right text-muted">40% Complete</span> </p>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#"> <strong>See All Tasks</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- This is the message dropdown -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!-- /.Task dropdown -->
                    <!-- /.dropdown -->
                    <li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href="#"><i class="fa fa-search"></i></a> </form>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="{{ asset('images/template/users/user.png') }}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{  Auth::user()->nome}}</b><span class="caret"></span> </a>
                        <ul class="dropdown-menu dropdown-user animated flipInY">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="{{ asset('images/template/users/user.png') }}" alt="user" /></div>
                                    <div class="u-text"><h4>{{  Auth::user()->nome }}</h4><p class="text-muted">{{  Auth::user()->email}}</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    
                    <!-- /.dropdown -->
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Menu</span></h3> </div>
                    <div class="user-profile">
                        <div class="dropdown user-pro-body">
                          <div><img src="{{ asset('images/template/users/user.png') }}" alt="user-img" class="img-circle"></div>
                          <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{  Auth::user()->nome}} <span class="caret"></span></a>
                              <ul class="dropdown-menu animated flipInY">
                                <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                                <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                                <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i> Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </li>
                              </ul>
                        </div>
                    </div>
                <ul class="nav" id="side-menu">
                    <li><a href="/home" class="waves-effect active"><i class="material-icons">home </i></a> </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Livros<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="{{ route('livro.create') }}"><i data-icon=")" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Registar Novo</span></a></li>
                            <li><a href="{{ route('livro.index') }}"><i class="fa-fw">S</i><span class="hide-menu">Disponíveis</span></a></li>
                            <li><a href="/livros/indisponiveis"><i class="fa-fw">S</i><span class="hide-menu">Indisponíveis <span class="label label-rouded label-purple pull-right">1</span></span></a></li>
                            {{--  <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Meus Pedidos </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="{{ route('pedidospendentes') }}"><i class=" fa-fw">T</i><span class="hide-menu">Pendentes</span></a> </li>
                                    <li> <a href="{{ route('pedidosconfirmados') }}"><i class=" fa-fw">M</i><span class="hide-menu">Confirmados</span></a> </li>
                                    <li> <a href="{{ route('pedidoscancelados') }}"><i class=" fa-fw">R</i><span class="hide-menu">Cancelados</span></a> </li>
                                    
                                </ul>
                            </li>  --}}
                        </ul>
                    </li>
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Emprestimos<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            {{--  <li> <a href="{{ route('emprestimo.create') }}"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Emitir Emprestimo</span></a> </li>  --}}
                            <li> <a href="{{ route('emprestimo.index') }}"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Confirmados</span></a> </li>
                            <li> <a href="{{ route('reserva.index') }}"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Reservas</span></a> </li>
                            <li> <a href="/emprestimos/cancelados"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Cancelados</span></a> </li>
                            <li> <a href="/emprestimos/sucedidos"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Bem sucedidos</span></a> </li>
                            {{--  <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="&#xe008;" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu"> Minhas Requisiçoes </span><span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li> <a href="{{ route('meuspendentes') }}"><i class=" fa-fw">T</i><span class="hide-menu">Pendentes</span></a> </li>
                                    <li> <a href="{{ route('meusconfirmados') }}"><i class=" fa-fw">M</i><span class="hide-menu">Confirmadas</span></a> </li>
                                    <li> <a href="{{ route('meuscancelados') }}"><i class=" fa-fw">R</i><span class="hide-menu">Canceladas</span></a> </li>
                                   
                                </ul>
                            </li>  --}}
                        </ul>
                    </li>
                    {{--  @can('isAdmin', App\User::class)  --}}
                        
                    
                    <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Utilizadores<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="{{ route('userscreate') }}"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Criar Novo</span></a> </li>
                            <li> <a href="{{ route('operadores.index') }}"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Lista de Operadores</span></a> </li>
                            <li> <a href="{{ route('administradores.index') }}"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Lista de Administradores</span></a> </li>
                            <li> <a href="{{ route('clientes.index') }}"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Lista de Clientes</span></a> </li>
             
                        </ul>
                    </li>
                    {{--  @endcan  --}}
                    {{--  <li> <a href="javascript:void(0)" class="waves-effect"><i data-icon="" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Companhias de Viagem<span class="fa arrow"></span></span></a>
                        <ul class="nav nav-second-level">
                            <li> <a href="javascript:void(0)"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Criar Nova</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="7" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Lista de Companhias</span></a> </li>
                            <li> <a href="javascript:void(0)"><i data-icon="/" class="linea-icon linea-basic fa-fw"></i><span class="hide-menu">Lista de Companhias Desactivadas</span></a> </li>
                       
                        </ul>
                    </li>  --}}
                    
                </ul>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                @if (session('error'))
                    <div class="row">
                        <div class="col-12">
                            <div class="panel-body">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ session('error')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif  
                @if (session('success'))
                    <div class="row">
                        <div class="col-12">
                            <div class="panel-body">
                                <div class="alert alert-info alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{ session('success')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif      
                    @yield("content")
               

            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2019 &copy; DMI </footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('css/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- Sidebar menu plugin JavaScript -->
    <script src="{{ asset('bower_components/sidebar-nav/dist/sidebar-nav.min.js') }}"></script>
    <!--Slimscroll JavaScript For custom scroll-->
    <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('js/waves.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield("scripts")
</body>



</html>