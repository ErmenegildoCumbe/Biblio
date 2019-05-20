@extends('layouts.base')

@section('css')
    
@endsection

@section('content')
 {{-- cabecalho da pagina --}}
 <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Gestao de Administradores</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Utilizadores</a></li>                
                <li class="active">Administradores</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
    <div class="row" style="margin: auto;">
        <button type="button" class="btn btn-primary" data-toggle="modal" 
            data-target="#addpassenger" data-whatever="@mdo">Adicionar Administrador
        </button>
        <div class="modal fade bs-example-modal-lg" id="addpassenger" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel1">Inserçao de Operador</h4> 
                        </div>
                        <div class="modal-body col-md-offset-1 col-sm-offset-1">
                                <form action="#" class="form-material form-horizontal" id="formadduser">
                                        {{ csrf_field() }}
                                    <div class="form-body">
                                        <h3 class="box-title">Informaçao da conta do Operador</h3>
                                        <hr class="m-t-0 m-b-40">
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
                                                    <input type="text" name="apelido" class="form-control value="{{ old('apelido') }}"">
                                                    @if ($errors->has('apelido'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('apelido') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>                                                    
                                        <!--/row-->
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
                                                        <option value="1">Administrador</option>                                                                                                                                                   
                                                    </select>
                                                </div>
                                            </div>                                                                   

                                        </div>
                                        
                                        <!--/row-->
                                    </div>                                                            
                                </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="addoperator()">Adicionar</button>
                        </div>
                    </div>
                </div>
        </div>
</div>
{{--tabela de passageiros --}}
<div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">Administradores Registados</div>
                <div class="table-responsive">
                    <table class="table table-hover manage-u-table">
                        <thead>
                            <tr>
                                <th width="70" class="text-center">#</th>
                                <th>NOME</th>
                                <th>EMAIL</th>
                                <th>TELEFONE</th>
                                <th>ESTADO</th>                                                        
                                <th>MANAGE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=0; ?>
                            @foreach ($administradores as $administrador)
                                
                                <tr>
                                    <td class="text-center"><?php echo ++$i; ?></td>
                                    <td>{{$administrador->user->nome }} {{ $administrador->user->apelido  }}
                                        {{--  <br/><span class="text-muted">Texas, Unitedd states</span></td>  --}}
                                    <td>{{$administrador->user->email}}</td>
                                    <td>{{$administrador->user->telefone}}
                                        {{--  <br/><span class="text-muted">999 - 444 - 555</span></td>  --}}
                                    <td>
                                            <?php if ($administrador->estado == 1) { ?>
                                                <span class="btn-info btn-small">Activo</span>
                                            <?php } 
                                            else{?>
                                                <span class="btn-danger btn-small">Desactivo</span>
                                            <?php } ?>
                                    </td>
                                
                                    <td> 
                                        <?php if($administrador->estado == 1){?>                                                           
                                        <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-lock" onclick="desactivar({{ $administrador->id }})"></i></button>
                                        <?php } 
                                            else{?>
                                                <button type="button" class="btn btn-info btn-outline btn-circle btn-lg m-r-5"><i class="ti-unlock" onclick="desactivar({{ $administrador->id }})"></i></button>
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
{{-- /tabela de passageiros --}} 
@endsection

@section('scripts')
    <script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
    <script>
           function addoperator(){
                var dadospedido = $('#formadduser').serialize();                
                $.ajax({
                dataType: 'json',
                method: 'post',                
                url: "{{ route('addopera') }}",
                data: dadospedido,
                //async: false,
                //dataType: 'json',
                success: function (respos) {                                 
                    var cod = respos;
                    window.location.reload(true);                   
                },
                error: function (err) {                  
                    console.log(err);                    
                }
            });
            }

            function desactivar(id){
                var cod = id;
                $.ajax({
                    dataType: 'json',
                    method: 'get',                
                    url: "administradores/editstate/"+id,
                    data: id,
                    //async: false,
                    //dataType: 'json',
                    success: function (respos) {                                 
                        var cod = respos;
                        window.location.reload(true);                   
                    },
                    error: function (err) {                  
                        console.log(err);                    
                    }
                });
            }
    </script>
@endsection