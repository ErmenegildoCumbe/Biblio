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
                <li><a href="#">Pacotes</a></li>                
                <li class="active">Disponíveis</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
    {{-- conteudo --}}
<div class="row">
        <div class="white-box">
            <h3 class="box-title">Lista de pacotes de viagem disponíveis</h3> 
        </div>
</div>
<div class="row">
    @foreach ($pacotes as $pacote)            
    
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="white-box">
                <div class="product-img">
                    <img src="{{ asset('images/praia.jpg') }}" />
                    <div class="pro-img-overlay"> <a href="{{ route('pacote.show', ['id'=> $pacote->id]) }}" class="bg-danger"><i class="material-icons">
                        details
                        </i></a></div>
                </div>
                <div class="product-text">
                    {{--  <span class="pro-price bg-danger">Tete</span>  --}}
                    <h3 class="box-title m-b-0">{{ $pacote->designacao }}</h3>
                    {{--  <small class="text-muted db">globe type chair for rest</small>  --}}
                    <small class="text-success">  <i class="material-icons">
                        location_on
                        </i> {{ $pacote->local }}
                    </small>
                </div>
            </div>
        </div>
    @endforeach
   
</div>
@endsection