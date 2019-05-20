@extends('layouts.base')
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
    <link href="{{ asset('bower_components/sidebar-nav/dist/sidebar-nav.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/gallery/css/animated-masonry-gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/fancybox/ekko-lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    @endsection
@section('content')

{{-- cabecalho da pagina --}}
<div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{ $pacote->designacao }}</h4> </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 
            <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20"><i class="ti-settings text-white"></i></button>
            
            <ol class="breadcrumb">
                <li><a href="#">Vanangas</a></li>
                <li><a href="#">Pacotes</a></li>                
                <li class="active">Detalhes</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<div class="col-lg-12  col-sm-12 col-xs-12">
    <div class="white-box">
        <h3 class="box-title">Detalhes do Pacote</h3>
        <p class="text-muted m-b-30"> Veja todos detalhes deste pacote</p>
        <div class="vtabs">
            <ul class="nav tabs-vertical">
                <li class="tab active">
                    <a data-toggle="tab" href="#home3" aria-expanded="true"> <span class="visible-xs"><i class="material-icons">
                            bookmark
                            </i></span> <span class="hidden-xs">Principal</span> </a>
                </li>
                {{--  <li class="tab">
                    <a data-toggle="tab" href="#profile3" aria-expanded="false"> <span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Imagens</span> </a>
                </li>  --}}
                <li class="tab">
                    <a aria-expanded="false" data-toggle="tab" href="#messages3"> <span class="visible-xs"><i class="material-icons">
                            chat
                            </i></span> <span class="hidden-xs">Comentários</span> </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home3" class="tab-pane active">
                    <div class="col-md-6">
                        <h3>{{ $pacote->designacao }}</h3>
                        <h4>Local</h4>
                        <small class="text-success">  <i class="material-icons">
                                location_on
                                </i> {{ $pacote->local }}
                            </small>
                            <small class="text-muted db"> <b>Data:</b> {{ $pacote->data_inicio }} </small>
                            <small class="text-muted db"><b>Validade:</b> {{ $pacote->data_fim }} </small>
                            <div class="center" style="">
                                    <a class="btn btn-rounded btn-info btn-block p-10" data-toggle="modal" 
                                    data-target="#requestpackage" data-whatever="@mdo">Requisitar Pacote</a>
                            </div>
                    </div>
                    <div class="col-md-5 pull-right">
                            <h3>Descriçao do Pacote</h3>
                        <p>{{ $pacote->descricao }}</p>
                        {{--  <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>  --}}
                    </div>
                    <div class="clearfix"></div>
                </div>
                {{--  <div id="profile3" class="tab-pane">
                    <div class="col-md-12">
                        <h3>Imagens do Local</h3>
                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    </div>
                       
                </div>  --}}
                <div id="messages3" class="tab-pane">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title">Comentários Recentes </h3>
                                    <div class="comment-center p-t-10">
                                        <div class="comment-body">
                                            <div class="user-img"> <img src="{{ asset('images/template/users/pawandeep.jpg') }}" alt="user" class="img-circle"></div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5><span class="time">10:20 AM   20  may 2016</span> 
                                                <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> 
                                            </div>
                                        </div>
                                        <div class="comment-body">
                                            <div class="user-img"> <img src="{{ asset('images/template/users/sonu.jpg') }}" alt="user" class="img-circle"> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5><span class="time">10:20 AM   20  may 2016</span> 
                                                <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                        </div>
                                        <div class="comment-body b-none">
                                            <div class="user-img"> <img src="{{ asset('images/template/users/arijit.jpg') }}" alt="user" class="img-circle"> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit singh</h5><span class="time">10:20 AM   20  may 2016</span>
                                                <br/><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                                        </div>
                                    </div>
                                </div>
                                
                                    <div class="row">
                                        <hr><hr>
                                            <div class="col-xs-8">
                                                <textarea placeholder="Introduza a tua mensagem aqui" class="chat-box-input"></textarea>
                                            </div>
                                            <div class="col-xs-4 text-right">
                                                <button class="btn btn-success btn-circle btn-lg" type="button"><i class="material-icons">
                                                        send
                                                        </i></button>
                                            </div>
                                    </div>
                                
                                <div class="center">
                                        <a class="btn btn-rounded btn-default btn-block p-10">Comentários anteriores</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<!-- /.row -->
<div  class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Galeria do Local</h3>
            <div id="gallery">
               
                <div id="gallery-content">
                    <div id="gallery-content-center">
                        @foreach ($fotos as $foto)
                            <a href="{{ asset($foto->designacao) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset($foto->designacao) }}" alt="gallery" class="all studio" /> </a>
                        @endforeach
                            
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="requestpackage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Informe os dados da sua Requisiçao</h4> 
                </div>
                <div class="modal-body col-md-offset-1 col-sm-offset-1">
                        <form action="{{ route('addPedidoViaPacote', ['id'=>$pacote->id]) }}" class="form-material form-horizontal" id="formrequestpedido" method="POST">
                                {{ csrf_field() }}
                            <div class="form-body">
                                <h3 class="box-title">Informaçao sobre os pontos</h3>
                                <hr class="m-t-0 m-b-40">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Numero de Viajantes</label>
                                            
                                                <input type="text" class="form-control" name="nrviajantes" value="{{ old('nrviajantes') }}"> <span class="help-block">Informe o Numero de viajantes no campo acima </span> 
                                                @if ($errors->has('nrviajantes'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('nrviajantes') }}</strong>
                                                    </span>
                                                @endif    
                                        </div>
                                    </div>
                                    <!--/span-->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Meio de Transporte</label>
                                            
                                                <input type="text" class="form-control" name="meiotransport" value="{{ old('meiotransport') }}"> <span class="help-block"> Pode indicar o meio de Transporte preferencial </span> 
                                                @if ($errors->has('meiotransport'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('meiotransport') }}</strong>
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
                                                <label class="control-label">Ponto de Partida</label>
                                               
                                                    <input type="text" class="form-control" name="pontopartida" value="{{ old('pontopartida') }}"> <span class="help-block">Informe o ponto de partida </span> 
                                                    @if ($errors->has('pontopartida'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('pontopartida') }}</strong>
                                                        </span>
                                                    @endif 
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Destino</label>
                                               
                                                    <input type="text" class="form-control" value="{{ $pacote->local }}"> 
                                               
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
                                                            <input type="text" class="form-control" name="start" value="{{ old('start') }}" /> <span class="input-group-addon bg-info b-0 text-white">Até</span>
                                                            <input type="text" class="form-control" name="end" value="{{ old('end') }}" /> </div>
                                                            @if ($errors->has('end'))
                                                                <span class="text-danger">
                                                                    <strong>{{ $errors->first('end') }}</strong>
                                                                </span>
                                                            @endif 
                                                    </div>
                                        </div>
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Descriçao</label>
                                                    <textarea class="form-control" name="descricao" rows="5"  value="{{ old('descricao') }}"></textarea>
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
                                            <div class="col-md-offset-10 col-md-9">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6"> </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary"onclick="event.preventDefault();
                    document.getElementById('formrequestpedido').submit();" >Enviar</button>
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts')
    <script src="{{  asset('bower_components/gallery/js/animated-masonry-gallery.js') }}"></script>
    <script src="{{  asset('bower_components/gallery/js/jquery.isotope.min.js') }}"></script>
    <script src="{{  asset('bower_components/fancybox/ekko-lightbox.min.js') }}"></script>
    <script src="{{  asset('bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
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
         
        $(document).ready(function($) {
            // delegate calls to data-toggle="lightbox"
            $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                event.preventDefault();
                return $(this).ekkoLightbox({
                    onShown: function() {
                        if (window.console) {
                            return console.log('Checking our the events huh?');
                        }
                    },
                    onNavigate: function(direction, itemIndex) {
                        if (window.console) {
                            return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);
                        }
                    }
                });
            });
            //Programatically call
            $('#open-image').click(function(e) {
                e.preventDefault();
                $(this).ekkoLightbox();
            });
            $('#open-youtube').click(function(e) {
                e.preventDefault();
                $(this).ekkoLightbox();
            });
            // navigateTo
            $(document).delegate('*[data-gallery="navigateTo"]', 'click', function(event) {
                event.preventDefault();
                var lb;
                return $(this).ekkoLightbox({
                    onShown: function() {
                        lb = this;
                        $(lb.modal_content).on('click', '.modal-footer a', function(e) {
                            e.preventDefault();
                            lb.navigateTo(2);
                        });
                    }
                });
            });
        });
        </script>
        <script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endsection