@extends('frontend.layout')

@section('titulo')
    Clientes | @parent
@stop

@section('contenido_header')
@stop

@section('contenido_body')
    <section class="page-title" style="background-image:url(/images/background/3.jpg)">
        <div class="container">
            <div class="outer-box">
                <h1>Nuestro clientes</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/"><span class="fa fa-home"></span>Inicio</a></li>
                    <li class="active">Clientes</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Our Team -->
    <section class="our-team sp-two">
        <div class="container">

            <div class="row">
                @foreach($rows as $cliente)
                <div class="team-block-one col-lg-2 col-md-3">
                    <div class="inner-box">
                        <div class="image">
                            <a href="#">
                                <img src="{{ $cliente->imagen_contenido }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@stop

@section('contenido_footer')
@stop