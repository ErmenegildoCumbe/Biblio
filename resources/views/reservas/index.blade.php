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
                <li><a href="#">Biblioteca</a></li>   
                <li class="active">Reservas</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Reservas a espera de confirmação</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table color-bordered-table primary-bordered-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            {{--  <th>Cliente</th>  --}}
                            <th>Título do Livro</th>
                            <th>Autor</th>
                            <th>Estudante</th>
                            <th>Bibliotecário que Criou</th>                            
                            <th width="300">Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php  $i=0; ?>
                        @foreach ($reservas as $reserva)
                       
                        <tr>
                            <td class="text-center"> <?php echo ++$i; ?> </td>
                            <td> {{ $reserva->livro->titulo }} </td>
                            <td> {{ $reserva->livro->autor }} </td>
                            <td> {{ $reserva->estudante->nome }} </td>
                            <td> {{ $reserva->bibliotecario->nome }} </td>
                         
                            <td>
                                <a href="{{ 'reserva/confirmar/'.$reserva->id] }}" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5" title="Confirmar"><i class="ti-thumb-up"></i></a>
                                <a href="{{ route('reserva.destroy', ['id'=>$reserva->id]) }}" type="button" class="btn btn-danger btn-outline btn-circle btn-lg m-r-5" title="Cancelar"><i class="ti-trash"></i></a> 
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