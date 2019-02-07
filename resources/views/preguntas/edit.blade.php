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
                <h1>Editar <small>sección</small></h1>
            </div>
            <!-- form -->
            <div class="row">
                <div class="col-md-12">
                @include('partials.messages')
                {!! Form::model($pregunta, array('route' => array('preguntas.update', $pregunta->id), 'method' => 'PUT')) !!}
                        @include('partials.forms.pregunta')
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <form id="delete-f" action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST" onsubmit="">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="right">
                            <button id="btn-del" style="margin-left: 90%" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="panel panel-success col-sm-8 col-sm-offset-2">
                    <div class="panel-body">
                        <b>Soluciones:</b>
                        <div class="panel-body">
                            @if($pregunta->respuestas()->count()>0)
                                <ul>
                                @foreach($pregunta->respuestas()->get() as $k => $respuesta)
                                    <li><b>Solución {{ $k+1 }}: </b>{{ $respuesta->solucion }} <a href="{{ route('soluciones.edit',$respuesta->id) }}">Editar</a></li>
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
                                @endforeach
                                </ul>
                            @else
                                Esta pregunta no tiene soluciones aún
                            @endif
                        </div>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-success" href="{{ route('solucion.create', $pregunta->id) }}"> <i class="glyphicon glyphicon-plus"></i> Agregar solución.</a>
                    </div>
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
            text: "Este elemento no se podrá recuperar después.",         
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
@endsection