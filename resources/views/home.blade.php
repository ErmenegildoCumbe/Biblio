@extends('layouts.base')

@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
    rel="stylesheet">
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
            <li class="active">Início</li>
        </ol>
    </div>
    <!-- /.breadcrumb -->
</div>
{{-- conteudo --}}
<div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Lista de pacotes de viagem disponíveis</h3> 
        </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-danger">Tete</span>  --}}
                <h3 class="box-title m-b-0">Cidade de Tete</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Tete
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair2.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-success">Provincia de Maputo</span>  --}}
                <h3 class="box-title m-b-0">Makaneta beach</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Maputo
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair4.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-info">Manica</span>  --}}
                <h3 class="box-title m-b-0">Chimoio</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Manica
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair3.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-danger">Cabo Delgado</span>  --}}
                <h3 class="box-title m-b-0">Moeda</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Cabo Delgado
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair2.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-success">Pemba</span>  --}}
                <h3 class="box-title m-b-0">Praia do wimbe</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Cabo Delgado
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair3.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-danger">Inhambane</span>  --}}
                <h3 class="box-title m-b-0">Massinga Resort</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Inhambane
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-danger">Inhambane</span>  --}}
                <h3 class="box-title m-b-0">Praia do tofo</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Inhambane
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair4.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-info">Manica</span>  --}}
                <h3 class="box-title m-b-0">Cabeça do velho</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Chimoio
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-danger">Zambézia</span>  --}}
                <h3 class="box-title m-b-0">Ilha de Moçambique</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Zambézia
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair2.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-success">Gaza</span>  --}}
                <h3 class="box-title m-b-0">Massingir</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Gaza
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair4.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-info">Gaza</span>  --}}
                <h3 class="box-title m-b-0">Macie</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Gaza
                </small>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="white-box">
            <div class="product-img">
                <img src="{{ asset('images/template/chair3.jpg') }}" />
                <div class="pro-img-overlay"> <a href="detalhes" class="bg-danger"><i class="material-icons">
                    details
                    </i></a></div>
            </div>
            <div class="product-text">
                {{--  <span class="pro-price bg-danger">Gaza</span>  --}}
                <h3 class="box-title m-b-0">Bilene</h3>
                <small class="text-muted db">globe type chair for rest</small>
                <small class="text-success">  <i class="material-icons">
                    location_on
                    </i> Gaza
                </small>
            </div>
        </div>
    </div>
</div>
@endsection