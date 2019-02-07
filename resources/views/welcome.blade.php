@extends('partials.app')
@section('content')
<div id="page-content-wrapper">
            <div class="content-header">
                <h1 id="home">
                    <a id="menu-toggle" href="#" class="glyphicon glyphicon-align-justify btn-menu toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                    FAQ App
                </h1>
            </div>

            <div class="page-content inset" data-spy="scroll" data-target="#spy">
                <div class="row">
                <div class="jumbotron text-center">
                    <h1>Preguntas Frecuentes</h1>
                    <p>Para mayor facilidad de navegación, utilice la barra de navegación de la izquierda.</p>
                    <p><a class="btn btn-default" href="{{ route('secciones.create') }}">Agregar sección</a>
                    
                </div>
                @include('partials.messages')
                </div>
                <div class="row">
                    @foreach($secciones as $seccion)
                        <div class="col-md-12 well">
                            <legend id="anch{{ $seccion->id }}"><b>{{ $seccion->name }}</b><small> <a class="" href="{{ route('secciones.show', $seccion->id) }}"> detalles</a></small></legend>
                            <p>
                                <b> Descripción: </b> {{ $seccion->description }}
                            </p>
                            <hr>
                            @if($seccion->preguntas()->count()>0)
                                @foreach($seccion->preguntas()->get() as $pregunta)
                                    <div class="">
                                        <!-- Accordeon -->
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#s{{ $seccion->id }}p{{ $pregunta->id }}">
                                                            {{ $pregunta->pregunta }}
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="s{{ $seccion->id }}p{{ $pregunta->id }}" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            @if($pregunta->respuestas()->count()>0)
                                                                <ul>
                                                                @foreach($pregunta->respuestas()->get() as $k => $respuesta)
                                                                    <li><b>Solución {{ $k+1 }}: </b>{{ $respuesta->solucion }}</li>
                                                                    @if($respuesta->pasos()->count()>0)
                                                                        <ul>
                                                                        @foreach($respuesta->pasos()->get() as $paso)
                                                                        <li>
                                                                            {{ $paso->paso }} <br>
                                                                            @if($paso->image)
                                                                                <img width="50%" src="{{ asset('pasos_img\\'.$paso->image) }}" alt="Imagen de apoyo">
                                                                            @endif
                                                                        </li>
                                                                        @endforeach
                                                                        </ul>
                                                                    @endif
                                                                    fuentes: {{ $respuesta->fuentes }}
                                                                @endforeach
                                                                </ul>
                                                            @else
                                                                Esta pregunta no tiene soluciones aún
                                                            @endif
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Accordeon -->
                                    </div>
                                @endforeach
                            @else
                                <h3>Esta sección está actualmente vacía.</h3>
                            @endif
                        </div>
                    
                    @endforeach
                </div>

                
            </div>

        </div>
        <footer>
                <div class="navbar navbar-default navbar-static-bottom">
                    <p class="navbar-text pull-left">
                        Built by <a href="http://mvnguyen.com" target="_blank">Michael V Nguyen </a>
                    </p>
                </div>
            </footer>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    /*Scroll Spy*/
    ////$('body').scrollspy({ target: '#spy', offset:80});

    /*Smooth link animation*/
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html,body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });
        
</script>