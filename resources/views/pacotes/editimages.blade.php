@extends('layouts.base')
@section('css')
    <link href="{{ asset('bower_components/gallery/css/animated-masonry-gallery.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/fancybox/ekko-lightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/dropify/dist/css/dropify.min.css') }}" rel="stylesheet">
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
                <li class="active">Adicionar imagens</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
    <div  class="row">
        <div class="col-md-12">
            <div class="white-box">
                <h3 class="box-title">Galeria do Pacote</h3>
                <div id="gallery">
                   
                    <div id="gallery-content">
                        <div id="gallery-content-center">
                            @foreach ($fotos as $foto)
                                <a href="{{ asset($foto->designacao) }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset($foto->designacao) }}" alt="gallery" class="all studio" /> </a>
                            @endforeach
                           

                            {{--  <a href="{{ asset('images/template/heading-bg/slide4.jpg') }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset('images/template/heading-bg/slide4.jpg') }}" class="all landscape" alt="gallery" /> </a>
                            <a href="{{ asset('images/template/heading-bg/slide6.jpg') }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset('images/template/heading-bg/slide6.jpg') }}" class="all studio" alt="gallery" /> </a>
                            <a href="{{ asset('images/template/heading-bg/slide1.jpg') }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset('images/template/heading-bg/slide1.jpg') }}" class="all studio" alt="gallery" /> </a>
                            <a href="{{ asset('images/template/heading-bg/slide3.jpg') }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset('images/template/heading-bg/slide3.jpg') }}" class="all landscape" alt="gallery" /></a>
                            <a href="{{ asset('images/template/heading-bg/slide3.jpg') }}" data-toggle="lightbox" data-gallery="multiimages" data-title="Image title will be apear here"><img src="{{ asset('images/template/heading-bg/slide3.jpg') }}" class="all studio" alt="gallery" /> </a>
                             --}}
                                
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Adicione novas imagens </h3>
                    <p class="text-muted m-b-30 text-info"> So Pode selecionar uma imagem por caixa de cada vez</p>
                    <form action="{{ route('addimage') }}" id="formimages" class="form-material" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" id="pacotecod" name="pacotecod" value="{{ $pacote->id }}">
                        <div class="row">
                                <div class="col-sm-6 ol-md-6 col-xs-12">
                                    <div class="white-box">
                                        <h3 class="box-title">Selecione Uma Imagem</h3>
                                        
                                        <input type="file" id="input-file-max-fs" name="img1" class="dropify" data-max-file-size="2M" />
                                        @if ($errors->has('img1'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('img1') }}</strong>
                                            </span>
                                        @endif 
                                    </div>
                                </div>
                                <div class="col-sm-6 ol-md-6 col-xs-12">
                                    <div class="white-box">
                                        <h3 class="box-title">Selecione Uma Imagem</h3>
                                        
                                        <input type="file" id="input-file-max-fs" name="img2" class="dropify" data-max-file-size="2M" /> </div>
                                        @if ($errors->has('img2'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('img2') }}</strong>
                                            </span>
                                        @endif 
                                </div>
                            </div>
                        <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Gravar</button>
                                {{--  <button type="button" class="btn btn-default">Cancel</button>  --}}
                            </div>
                    </form>
                </div>
            </div>
    </div>

@endsection

@section('scripts')
    <script src="{{  asset('bower_components/gallery/js/animated-masonry-gallery.js') }}"></script>  
    <script src="{{  asset('bower_components/gallery/js/jquery.isotope.min.js') }}"></script>
    <script src="{{  asset('bower_components/fancybox/ekko-lightbox.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            // delegate calls to data-toggle="lightbox"
            $(document).delegate('*[data-toggle="lightbox"]:not([data-gallery="navigateTo"])', 'click', function(event) {
                event.preventDefault();
                return $(this).ekkoLightbox({
                    onShown: function() {
                        if (window.console) {
                           // return console.log('Checking our the events huh?');
                        }
                    },
                    onNavigate: function(direction, itemIndex) {
                        if (window.console) {
                           // return console.log('Navigating ' + direction + '. Current item: ' + itemIndex);
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
        <script src="{{  asset('bower_components/dropify/dist/js/dropify.min.js') }}"></script>
        <script>
                $(document).ready(function() {
                    // Basic
                    $('.dropify').dropify();
                    // Translated
                    $('.dropify-fr').dropify({
                        messages: {
                            default: 'Glissez-déposez un fichier ici ou cliquez',
                            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                            remove: 'Supprimer',
                            error: 'Désolé, le fichier trop volumineux'
                        }
                    });
                    // Used events
                    var drEvent = $('#input-file-events').dropify();
                    drEvent.on('dropify.beforeClear', function(event, element) {
                        return confirm("Tem ceteza de que deseja excluir \"" + element.file.name + "\" ?");
                    });
                    drEvent.on('dropify.afterClear', function(event, element) {
                        alert('Ficheiro apagado');
                    });
                    drEvent.on('dropify.errors', function(event, element) {
                        console.log('Has Errors');
                    });
                    var drDestroy = $('#input-file-to-destroy').dropify();
                    drDestroy = drDestroy.data('dropify')
                    $('#toggleDropify').on('click', function(e) {
                        e.preventDefault();
                        if (drDestroy.isDropified()) {
                            drDestroy.destroy();
                        } else {
                            drDestroy.init();
                        }
                    })
                });
                </script>
                <script>
                        function addimages(){
                            var dadospedido = $('#formimages').serialize();                
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
                </script>
        <script src="{{  asset('bower_components/styleswitcher/jQuery.style.switcher.js') }}"></script>
@endsection