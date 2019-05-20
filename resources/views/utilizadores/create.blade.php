@extends('layouts.base')
@section('css')
<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    
{{-- cabecalho da pagina --}}
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Utilizadores</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Utilizadores</a></li>                
                <li class="active">Criar Novo</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Preencha os Dados do Usuário</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('operadores.store') }}" method="POST" class="form-material">
                            {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="box-title">Dados da conta</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="introduza a o nome do Pacote"> 
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Senha</label>
                                        <input type="text" id="password" name="password" class="form-control" placeholder="introduza a senha"> 
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->

                            <h3 class="box-title m-t-40">Dados Pessoais</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}"><span class="help-block"> Introduza o nome aqui! </span> 
                                        @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Apelido</label>
                                            <input type="text" name="apelido" class="form-control" value="{{ old('apelido') }}">
                                            @if ($errors->has('apelido'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('apelido') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                            </div>                            
                            <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
                                            @if ($errors->has('telefone'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('telefone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label>Tipo de Usuário</label>
                                                <select name="tipo" class="form-control">                                                                                           
                                                        <option value="2">Operador</option>
                                                        <option value="1">Administrador</option>                                                                                                                                                   
                                                </select>
                                            </div>
                                    </div>
                            </div>
                            
                         
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Gravar</button>
                            <button type="button" class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--./row-->
@endsection

@section('scripts')

<script src="{{  asset('bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{  asset('bower_components/moment/moment.js') }}"></script>
<script src="{{  asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript">

        // Date Picker
        jQuery('.mydatepicker, #datepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        jQuery('#date-range').datepicker({
            toggleActive: true
        });
        jQuery('#datepicker-inline').datepicker({
            todayHighlight: true
        });

</script>
    <script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endsection