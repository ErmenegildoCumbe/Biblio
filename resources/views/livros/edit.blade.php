@extends('layouts.base')
@section('css')
<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('content')
    
{{-- cabecalho da pagina --}}
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edição de Livro</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Livro</a></li>                
                <li class="active">Editar</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<!--.row-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-info">
            <div class="panel-heading"> Actualize os Dados do Livro</div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <form action="{{ route('livro.update', ['id'=>$livro->id]) }}" class="form-material" method="POST">
                        {{ method_field('PUT') }}
                            {{ csrf_field() }}
                        <div class="form-body">
                            <h3 class="box-title">Informação do Livro</h3>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Título</label>
                                        <input type="text" id="titulo" name="titulo" class="form-control" value="{{$livro->titulo}}"> 
                                        @if ($errors->has('titulo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Autor</label>
                                        <input type="text" id="autor" name="autor" class="form-control" value="{{$livro->autor}}">
                                        @if ($errors->has('autor'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('autor') }}</strong>
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
                                        <label class="control-label">Editora</label>
                                        <input type="text" id="editora" name="editora" class="form-control" value="{{$livro->editora}}"> 
                                        @if ($errors->has('editora'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('editora') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Edição</label>
                                        <input type="text" id="edicao" name="edicao" class="form-control" value="{{$livro->edicao}}">
                                        @if ($errors->has('edicao'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('edicao') }}</strong>
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
                                                <label class="control-label">Ano de Publicação</label>
                                                
                                                <div class="input-group">
                                                    <input type="text" class="form-control mydatepicker" name="ano_publicacao" value="{{$livro->ano_publicacao}}"> <span class="input-group-addon"><i class="icon-calender"></i></span> 
                                                </div>
                                                    @if ($errors->has('ano_publicacao'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('ano_publicacao') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                </div>
                                <!--/span-->
                                
                            </div>
                            <!--/row-->

                            
                         
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Actualizar</button>
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