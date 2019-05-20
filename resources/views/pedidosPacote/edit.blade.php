@extends('layouts.base')

@section('css')
    <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    {{-- cabecalho da pagina --}}
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Início</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Pedidos de Pacote</a></li>
                <li class="active">Editar</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="white-box">
            <h3 class="box-title">Pedido de Pacote</h3>
            <p class="text-muted m-b-30">Informe todos dados referentes ao Pedido </p>
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
                                                Insira os dados do Pacote
                                            </div>
                                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                                <div class="panel-body">
                                                    <form action="#" class="form-material form-horizontal">
                                                            {{ csrf_field() }}
                                                        <div class="form-body">
                                                            <h3 class="box-title">Informaçao sobre os pontos</h3>
                                                            <hr class="m-t-0 m-b-40">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Numero de Viajantes</label>
                                                                        
                                                                            <input type="text" class="form-control" value="{{ $pedido->nr_viajantes }}"> <span class="help-block">Informe o Numero de viajantes no campo acima </span> 
                                                                       
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label">Meio de Transporte</label>
                                                                        
                                                                            <input type="text" class="form-control" value="{{ $pedido->meio_transporte }}"> <span class="help-block"> Pode indicar o meio de Transporte preferencial </span> 
                                                                       
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                            </div>
                                                            <!--/row-->
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Ponto de Partida</label>
                                                                           
                                                                                <input type="text" class="form-control" value="{{ $pedido->ponto_partida }}"> <span class="help-block">Informe o ponto de partida </span> 
                                                                            
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Destino</label>
                                                                           
                                                                                <input type="text" class="form-control" value="{{ $pedido->ponto_chegada }}"> <span class="help-block"> Informe o ponto de partida </span> 
                                                                           
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
                                                                                    <label class="control-label">Duraçao do Pacote</label>
                                                                                    <p class="text-muted m-b-20"> Selecione o principio e o fim da Estadia no destino</p>
                                                                                    <div class="input-daterange input-group" id="date-range">
                                                                                        <input type="text" class="form-control" name="start" value="{{ $pedido->data_inicio }}" /> <span class="input-group-addon bg-info b-0 text-white">Até</span>
                                                                                        <input type="text" class="form-control" name="end" value="{{ $pedido->data_fim }}"/> </div>
                                                                                </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Descriçao</label>
                                                                                <textarea class="form-control" rows="5"> {{ $pedido->detalhes }} </textarea>
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
                                                                            <button type="submit" class="btn btn-success">Actualizar</button>
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
                                <button type="button" class="btn btn-primary" data-toggle="modal" 
                                    data-target="#addpassenger" data-whatever="@mdo">Adicionar Viajante
                                </button>
                                <div class="modal fade bs-example-modal-lg" id="addpassenger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Inserçao de Passageiro</h4> 
                                                </div>
                                                <div class="modal-body col-md-offset-1 col-sm-offset-1">
                                                        <form action="{{ route('addPassenger', ['id'=>$pedido->id]) }}" class="form-material form-horizontal" id="formaddpassanger" method="POST">
                                                                {{ csrf_field() }}
                                                            <div class="form-body">
                                                                <h3 class="box-title">Informaçao sobre o Passageiro</h3>
                                                                <hr class="m-t-0 m-b-40">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Nome</label>                                                                            
                                                                            <input type="text" class="form-control" name="nome"  value="{{ old('nome') }}">  
                                                                            @if ($errors->has('nome'))
                                                                                <span class="text-danger">
                                                                                    <strong>{{ $errors->first('nome') }}</strong>
                                                                                </span>
                                                                            @endif 
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label">Apelido</label>                                                                            
                                                                            <input type="text" class="form-control" name="apelido" value="{{ old('apelido') }}">  
                                                                            @if ($errors->has('apelido'))
                                                                                <span class="text-danger">
                                                                                    <strong>{{ $errors->first('apelido') }}</strong>
                                                                                </span>
                                                                            @endif 
                                                                        </div>
                                                                    </div>
                                                                    <!--/span-->
                                                                </div>
                                                                <!--/row-->
                                                                <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                    <label class="control-label">Forma de Tratamento</label>
                                                                                    <select class="form-control" name="tratamento">                                                                                           
                                                                                            <option value="Sr.">Sr.</option>
                                                                                            <option value="Sra.">Sra.</option>
                                                                                            <option value="Excia.">Excia.</option>                                                                                            
                                                                                    </select>
                                                                                    @if ($errors->has('tratamento'))
                                                                                        <span class="text-danger">
                                                                                            <strong>{{ $errors->first('tratamento') }}</strong>
                                                                                        </span>
                                                                                    @endif 
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label">Data Nascimento</label>                                                                               
                                                                                <input type="text" class="form-control" id="datepicker-autoclose" name="nascimento" value="{{ old('nascimento') }}" placeholder="mm/dd/yyyy">
                                                                                    @if ($errors->has('nascimento'))
                                                                                        <span class="text-danger">
                                                                                            <strong>{{ $errors->first('nascimento') }}</strong>
                                                                                        </span>
                                                                                    @endif 
                                                                            </div>
                                                                        </div>
                                                                        <!--/span-->
                                                                </div>                                                    
                                                                <!--/row-->
                                                                <div class="row">
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                        <label class="control-label">Sexo</label>                                                                                        
                                                                                        <select class="form-control" name="sexo">                                                                                           
                                                                                                <option value="Masculino">Masculino</option>
                                                                                                <option value="Feminino">Feminino</option>                                                                                                                                                                                           
                                                                                        </select>
                                                                                        @if ($errors->has('sexo'))
                                                                                            <span class="text-danger">
                                                                                                <strong>{{ $errors->first('sexo') }}</strong>
                                                                                            </span>
                                                                                        @endif 
                                                                                </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Tipo de Passageiro</label>
                                                                                    <select class="form-control" name="tipoPassageiro">                                                                                           
                                                                                            <option value="1">Adulto (> 12)</option>
                                                                                            <option value="2">Criança (> 2)</option>
                                                                                            <option value="3">Bébé (< 2)</option>                                                                                                                                                                                           
                                                                                    </select>
                                                                                    @if ($errors->has('tipoPassageiro'))
                                                                                        <span class="text-danger">
                                                                                            <strong>{{ $errors->first('tipoPassageiro') }}</strong>
                                                                                        </span>
                                                                                    @endif 
                                                                                </div>
                                                                        </div>                                                                   
    
                                                                </div>
                                                                
                                                                <!--/row-->
                                                            </div>                                                            
                                                        </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault();
                                                    document.getElementById('formaddpassanger').submit();">Adicionar</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                        {{--tabela de passageiros --}}
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">
                                        <div class="panel-heading">GERIR PASSAGEIROS</div>
                                        <div class="table-responsive">
                                            <table class="table table-hover manage-u-table">
                                                <thead>
                                                    <tr>
                                                        <th width="70" class="text-center">#</th>
                                                        <th>NOME</th>
                                                        <th>SEXO</th>
                                                        <th>TIPO</th>
                                                        <th>DATA DE NASCIMENTO</th>                                                        
                                                        <th>MANAGE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        <?php  $i=0; ?>
                                                    @foreach ($passageiros as $passageiro) 
                                                        <tr>
                                                            <td class="text-center"> <?php echo ++$i; ?> </td>
                                                            <td> {{ $passageiro->nome}} {{ $passageiro->apelido}}</td>
                                                            <td>{{ $passageiro->sexo}}</td>
                                                            <td> <?php if ( $passageiro->tipo ==1){
                                                                    echo "Adulto";    
                                                                }
                                                                    else if($passageiro->tipo ==2){
                                                                        echo "Criança";
                                                                    }
                                                                    else
                                                                        echo "Bébé"; ?> </td>
                                                            <td> {{ $passageiro->data_nascimento}} </td>
                                                        
                                                            <td>                                                            
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></button>
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>
                                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-upload"></i></button>
                                                            </td>
                                                        </tr>  
                                                    @endforeach                                                                                             
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                        {{-- /tabela de passageiros --}}
                    </div>
                    <div id="contacto" class="tab-pane">
                            <div class="panel panel-info">
                                    <div class="panel-heading"> 
                                        Contactos
                                    </div>
                                    <div class="panel-wrapper collapse in" aria-expanded="true">
                                        <div class="panel-body">
                                            <form action="{{ route('addContact', ['id'=>$pedido->id]) }}" class="form-material form-horizontal" method="POST">
                                                    {{ csrf_field() }}
                                                <div class="form-body">
                                                    <h3 class="box-title">Contacto Principal</h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Email</label>                                                                
                                                                    <input type="email" class="form-control" name="pincipemail" value="<?php if(isset($contacto->emailprincipal)) echo $contacto->emailprincipal; ?> "> <span class="help-block">Informe o Numero de viajantes no campo acima </span> 
                                                                    @if ($errors->has('pincipemail'))
                                                                        <span class="text-danger">
                                                                            <strong>{{ $errors->first('pincipemail') }}</strong>
                                                                        </span>
                                                                    @endif 
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Telefone</label>
                                                                
                                                                    <input type="text" class="form-control" name="principtelefone" value="<?php if(isset($contacto->telefoneprincipal)) echo $contacto->telefoneprincipal; ?> "> <span class="help-block"> Pode indicar o meio de Transporte preferencial </span> 
                                                                    @if ($errors->has('principtelefone'))
                                                                        <span class="text-danger">
                                                                            <strong>{{ $errors->first('principtelefone') }}</strong>
                                                                        </span>
                                                                    @endif 
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>
                                                    <!--/row-->
                                                    <h3 class="box-title">Contacto de Emergência</h3>
                                                            <hr class="m-t-0 m-b-40">
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Email</label>
                                                                   
                                                                        <input type="email" class="form-control" name="emergemail" value="<?php if(isset($contacto->emailemergencia)) echo $contacto->emailemergencia; ?>"> <span class="help-block">Informe o ponto de partida </span> 
                                                                        @if ($errors->has('emergemail'))
                                                                            <span class="text-danger">
                                                                                <strong>{{ $errors->first('emergemail') }}</strong>
                                                                            </span>
                                                                        @endif 
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label">Telefone</label>
                                                                   
                                                                        <input type="text" class="form-control" name="emergtelefone" value="<?php if(isset($contacto->telefoneemergencia)) echo $contacto->telefoneemergencia; ?>"> <span class="help-block"> Informe o ponto de partida </span> 
                                                                        @if ($errors->has('emergtelefone'))
                                                                            <span class="text-danger">
                                                                                <strong>{{ $errors->first('emergtelefone') }}</strong>
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
                                                                    <button type="submit" class="btn btn-success">Actualizar</button>
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
                    <div id="passagens" class="tab-pane">
                            <div class="row" style="margin: auto;">
                                    <h1 class="text-warning">Adicione os dados básicos do pacote primeiro</h1 class="text-warning">
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