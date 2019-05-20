@extends('layouts.base')

@section('css')
    
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
                <li><a href="#">Passagens</a></li>                
                <li class="active">Confirmados</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Pedidos de Pacotes de Viagem Confirmados</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table color-bordered-table success-bordered-table">
                    <thead>
                        <tr>
                                <th width="70" class="text-center">#</th>
                                {{--  <th>Cliente</th>  --}}
                                <th>Viajantes</th>
                                <th>Ponto de Partida</th>
                                <th>Ponto de Chegada</th>
                                <th>Data de Partida</th>                            
                                <th width="300">Opçoes</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php  $i=0; ?>
                            @foreach ($requisicoes as $requisicao)
                           
                            <tr>
                                <td class="text-center"> <?php echo ++$i; ?> </td>
                                <td> {{ $requisicao->nr_passageiros }} </td>
                                <td> {{ $requisicao->ponto_partida }} </td>
                                <td> {{ $requisicao->ponto_chegada }} </td>
                                <td> {{ $requisicao->data_partida }} </td>
                             
                                <td>
                                    <a href="#" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-eye"></i></a>
                                    <a href="#" type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-trash"></i></a>
                                    
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