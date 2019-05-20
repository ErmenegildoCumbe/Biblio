@extends('layouts.base')

@section('css')
    <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')

{{-- cabecalho da pagina --}}
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Reserva de Passagem</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Pedidos de Pacote</a></li>                
                <li class="active">Criar Novo</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Dados da Reserva</h3>
            <p class="text-muted m-b-30">Informe todos dados referentes a sua reserva </p>
            <div class="vtabs">
                <ul class="nav tabs-vertical">
                    <li class="tab active">
                        <a data-toggle="tab" href="#basicas" aria-expanded="true"> <span class="visible-xs"><i class="ti-home"></i></span> <span class="hidden-xs">Informaços do Pedido</span> </a>
                    </li>
                    <li class="tab">
                        <a data-toggle="tab" href="#viajantes" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Viajantes</span> </a>
                    </li>
                    <li class="tab">
                        <a aria-expanded="false" data-toggle="tab" href="#contacto"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Contacto</span> </a>
                    </li>
                    <li class="tab">
                            <a aria-expanded="false" data-toggle="tab" href="#passagens"> <span class="visible-xs"><i class="ti-email"></i></span> <span class="hidden-xs">Passagens</span> </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="basicas" class="tab-pane active">
                                <div class="panel panel-info">
                                            <div class="panel-heading"> 
                                                Insira os dados da Reserva de Passagem
                                            </div>
                                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                                <div class="panel-body">
                                                    <form action="{{ route('pedidoPassagem.store') }}" class="form-material form-horizontal" method="POST">
                                                            {{ csrf_field() }}
                                                        <div class="form-body">
                                                            <h3 class="box-title">Informaçao sobre os pontos</h3>
                                                            <hr class="m-t-0 m-b-40">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Numero de Viajantes</label>
                                                                        
                                                                            <input type="text" class="form-control" name="viajantes" value="{{ old('viajantes') }}"> <span class="help-block">Informe o Numero de viajantes no campo acima </span> 
                                                                            @if ($errors->has('viajantes'))
                                                                                <span class="text-danger">
                                                                                    <strong>{{ $errors->first('viajantes') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                            <label class="col-sm-12">Tipo de Passagem</label>
                                                                            <div class="col-sm-12">
                                                                                <select class="form-control" name="tipoReserva">
                                                                                    <option value="1">So ida</option>
                                                                                    <option value="2">Ida e Volta</option>                                                                                    
                                                                                </select>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Ponto de Partida</label>
                                                                           
                                                                                <input type="text" class="form-control" name="ppartida" value="{{ old('ppartida') }}"> <span class="help-block">Informe o ponto de partida </span> 
                                                                                @if ($errors->has('ppartida'))
                                                                                    <span class="text-danger">
                                                                                        <strong>{{ $errors->first('ppartida') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Destino</label>
                                                                           
                                                                                <input type="text" class="form-control" name="destino" value="{{ old('destino') }}"> <span class="help-block"> Informe o ponto de partida </span> 
                                                                                @if ($errors->has('destino'))
                                                                                    <span class="text-danger">
                                                                                        <strong>{{ $errors->first('destino') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                            </div>
                                                
                                                            <!--/row-->
                                                            
                                                            <h3 class="box-title">Detalhes</h3>
                                                            <hr class="m-t-0 m-b-40">
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                            <div class="example">
                                                                                    <label class="control-label">Duraçao da Viagem </label>
                                                                                    <p class="text-muted m-b-20"> Selecione o principio e o fim da Estadia no destino</p>
                                                                                    <div class="input-daterange input-group" id="date-range">
                                                                                        <input type="text" class="form-control" name="start" value="{{ old('start') }}"/> <span class="input-group-addon bg-info b-0 text-white">Até</span>
                                                                                        <input type="text" class="form-control" name="end" value="{{ old('end') }}" /> 
                                                                                        @if ($errors->has('end'))
                                                                                            <span class="text-danger">
                                                                                                <strong>{{ $errors->first('end') }}</strong>
                                                                                            </span>
                                                                                        @endif
                                                                                        
                                                                                    </div>
                                                                                </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Descriçao</label>
                                                                                <textarea class="form-control" rows="5" name="descricao"> {{ old('descricao') }} </textarea>
                                                                                @if ($errors->has('descricao'))
                                                                                    <span class="text-danger">
                                                                                        <strong>{{ $errors->first('descricao') }}</strong>
                                                                                    </span>
                                                                                @endif
                                                                            </div>
                                                                    </div>
                                                                        <!--/span-->

                                                            </div>
                                                            
                                                            <!--/row-->
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-9">
                                                                            <button type="submit" class="btn btn-success">Submit</button>
                                                                            <button type="button" class="btn btn-default">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6"> </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                    </div>
                    <div id="viajantes" class="tab-pane">
                        <div class="row" style="margin: auto;">
                            <h1 class="text-warning">Adicione os dados básicos do Pedido de Passagem Primeiro</h1 class="text-warning">
                        </div>
                    </div>
                    <div id="contacto" class="tab-pane">
                            <div class="row" style="margin: auto;">
                                    <h1 class="text-warning">Adicione os dados básicos do Pedido de Passagem Primeiro</h1 class="text-warning">
                            </div>
                    </div>
                    <div id="passagens" class="tab-pane">
                            <div class="row" style="margin: auto;">
                                    <h1 class="text-warning">Adicione os dados básicos do Pedido de Passagem Primeiro</h1 class="text-warning">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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