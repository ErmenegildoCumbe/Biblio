@extends('layouts.base')

@section('css')
    
@endsection

@section('content')
 {{-- cabecalho da pagina --}}
 <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Livros</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Livros</a></li>                
                <li class="active">Disponíveis</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Livros disponíveis para uso</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table color-bordered-table primary-bordered-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            {{--  <th>Cliente</th>  --}}
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Editora</th>
                            <th>Edição</th>                            
                            <th width="300">Opçoes</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php  $i=0; ?>
                        @foreach ($livros as $livro)
                       
                        <tr>
                            <td class="text-center"> <?php echo ++$i; ?> </td>
                            <td> {{ $livro->titulo }} </td>
                            <td> {{ $livro->autor }} </td>
                            <td> {{ $livro->editora }} </td>
                            <td> {{ $livro->edicao }} </td>
                         
                            <td>
                                <a href="{{ route('livro.edit', ['id'=>$livro->id]) }}" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Editar"><i class="ti-pencil-alt"></i></a>
                                <a href="{{'/livro/desactivar/'.$livro->id }}" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Desactivar"><i class="ti-lock"></i></a>
                                <a href="{{'emprestimo/livro/'.$livro->id }}" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Efectuar Emprestimo"><i class="ti-control-forward"></i></a>
                                <a href="{{'reservar/'.$livro->id }}" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Reservar"><i class="ti-timer"></i></a>
                                
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
@endsection

@section('scripts')
    <script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endsection