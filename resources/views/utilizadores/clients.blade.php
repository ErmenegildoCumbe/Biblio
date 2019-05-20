@extends('layouts.base')

@section('css')
    
@endsection

@section('content')
 {{-- cabecalho da pagina --}}
 <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Clientes</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Utilizadores</a></li>                
                <li class="active">Clientes</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">Lista de Clientes Cadastrados</div>
            <div class="table-responsive">
                <table class="table table-hover manage-u-table color-bordered-table primary-bordered-table">
                    <thead>
                        <tr>
                            <th width="70" class="text-center">#</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Estado</th>                            
                            <th width="300">Opçoes</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php  $i=0; ?>
                            @foreach ($clientes as $cliente)
                                
                                <tr>
                                    <td class="text-center"><?php echo ++$i; ?></td>
                                    <td>{{$cliente->user->nome }} {{ $cliente->user->apelido  }}
                                        {{--  <br/><span class="text-muted">Texas, Unitedd states</span></td>  --}}
                                    <td>{{$cliente->user->email}}</td>
                                    <td>{{$cliente->user->telefone}}
                                        {{--  <br/><span class="text-muted">999 - 444 - 555</span></td>  --}}
                                    <td>
                                            <?php if ($cliente->estado == 1) { ?>
                                                <span class="btn-info btn-small">Activo</span>
                                            <?php } 
                                            else{?>
                                                <span class="btn-danger btn-small">Desactivo</span>
                                            <?php } ?>
                                    </td>
                                
                                    <td> 
                                        <?php if($cliente->estado == 1){?>                                                           
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-lock" onclick=""></i></button>
                                        <?php } 
                                            else{?>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-unlock" onclick=""></i></button>
                                            <?php } ?>
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-pencil-alt"></i></button>                                        
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-20"><i class="ti-eye"></i></button>
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