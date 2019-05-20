@extends('layouts.base')
@section('css')
<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    
{{-- cabecalho da pagina --}}
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Pacote de Viagem</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Pacotes</a></li>                
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
            <div class="panel-heading"> Preencha os Dados do Pacote</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('pacote.store') }}" class="form-material" method="POST">
                            {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="box-title">Informaçao do Pacote</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Designaçao</label>
                                        <input type="text" id="designacao" name="designacao" class="form-control" placeholder="introduza a o nome do Pacote"> 
                                        @if ($errors->has('designacao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('designacao') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Descriçao</label>
                                        <textarea class="form-control" rows="5" name="descricao" id="descricao"></textarea>
                                        @if ($errors->has('descricao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('descricao') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="example">
                                                <label class="control-label">Duraçao do Pacote</label>
                                                <p class="text-muted m-b-20"> Selecione o principio e o fim da disponibilidade do Pacote</p>
                                                <div class="input-daterange input-group" id="date-range">
                                                    <input type="text" class="form-control" name="start" id="start" /> <span class="input-group-addon bg-info b-0 text-white">Até</span>
                                                    <input type="text" class="form-control" name="end" id="end" /> </div>
                                                    @if ($errors->has('end'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('end') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                </div>
                                <!--/span-->
                                
                            </div>
                            <!--/row-->

                            <h3 class="box-title m-t-40">Endereço</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label>Local</label>
                                        <input type="text" class="form-control" name="local" id="local"><span class="help-block"> Introduza o nome do país, cidade ou província </span> 
                                        @if ($errors->has('local'))
                                            <span class="help-block">
                                               <strong>{{ $errors->first('local') }}</strong>
                                            </span>
                                        @endif
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