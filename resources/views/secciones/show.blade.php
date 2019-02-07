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
            <div class="page-header">
                <h1>Información <small>sección</small></h1>
            </div>
            <!-- form -->
            <div class="row">
                <div class="panel panel-success col-sm-8 col-sm-offset-2">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $seccion->name }}</h3>
                    </div>
                    <div class="panel-body">
                        <small>
                            {{ $seccion->description }}
                        </small>
                        <hr>
                        <div>
                            <h4>Preguntas <small><a href="{{ route('pregunta.create', $seccion->id) }}"><i class="glyphicon glyphicon-plus"></i> Agregar pregunta</a></small></h4>
                            <hr>
                            @if($seccion->preguntas()->count()>0)
                                @foreach($seccion->preguntas()->get() as $pregunta)
                                <div class="">
                                    
                                    <!-- Accordeon -->
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $pregunta->id }}">
                                                        {{ $pregunta->pregunta }} <small> <a class="" href="{{ route('preguntas.edit', $pregunta->id) }}"> editar</a></small>
                                                    </a>
                                                </h4>
                                            </div>
                                        <div id="collapse{{ $pregunta->id }}" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                @if($pregunta->respuestas()->count()>0)
                                                    <ul>
                                                    @foreach($pregunta->respuestas()->get() as $k => $respuesta)
                                                        <li><b>Solución {{ $k+1 }}: </b>{{ $respuesta->solucion }}</li>
                                                        @if($respuesta->pasos()->count()>0)
                                                            <ul>
                                                            @foreach($respuesta->pasos()->get() as $paso)
                                                            <li>{{ $paso->paso }}</li>
                                                            @endforeach
                                                            </ul>
                                                        @endif
                                                    @endforeach
                                                    fuentes: {{ $respuesta->fuentes }}
                                                    </ul>
                                                @else
                                                    Esta pregunta no tiene soluciones aún
                                                @endif
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
                    </div>
                    <div class="panel-footer"> 
                        <form id="delete-f" action="{{ route('secciones.destroy', $seccion->id) }}" method="POST" onsubmit="">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <div class="right">
                                <a href="{{ route('secciones.edit', $seccion->id) }}" class="btn btn-warning">Editar</a>
                                <button id="btn-del" style="margin-left: 10px" type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
</div>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>

$('#btn-del').on('click', function(e){
    e.preventDefault();
    swal({   
        title: "Confirmación",
        text: "Esta sección, ni sus preguntas, ni sus respuestas no se podrán recuperar después.",         
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Eliminar"
    }).then( function (result) {
        if(result.value) {
            $("#delete-f").submit();
        } else
        {
            console.log("canceled");
        }
    });
})

    /*Scroll Spy*/
    $('body').scrollspy({ target: '#spy', offset:80});

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
@endsection