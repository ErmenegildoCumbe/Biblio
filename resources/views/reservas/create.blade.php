@extends('layouts.base')
@section('css')
<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    
{{-- cabecalho da pagina --}}
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Emissão de Emprestimo de Livro {{$livro->titulo}}</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Biblioteca</a></li>
                <li><a href="#">Emprestimo</a></li>                
                <li class="active">Emitir Novo</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Preencha os Dados do Emprestimo</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('emprestimo.store') }}" class="form-material" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="livro" value="{{ $livro->id }}">
                        <div class="form-body">
                            <h3 class="box-title">Dados do livro</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Título do livro</label>
                                        <input type="text" id="titulo" disabled name="titulo" class="form-control" value="{{ $livro->titulo }}"> 
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Autor</label>
                                        <input type="text" id="autor" name="autor" disabled class="form-control" value="{{ $livro->autor }}">
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <hr>
                            <h3>DADOS DO ESTUDANTE</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nome</label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="introduza o nome do Estudante"> 
                                        @if ($errors->has('nome'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nome') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Número do Estudante</label>
                                        <input type="text" id="nr_estudante" name="nr_estudante" class="form-control" placeholder="introduza o nome da edição">
                                        @if ($errors->has('nr_estudante'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nr_estudante') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="example">
                                                <label class="control-label">Data de devolução</label>
                                                
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" name="data_entrega" placeholder="mm/dd/yyyy"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                                </div>
                                                    @if ($errors->has('data_entrega'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('data_entrega') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                </div>
                                <!--/span-->
                                
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Emitir</button>
                            <button type="button" class="btn btn-default">Cancelar</button>
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