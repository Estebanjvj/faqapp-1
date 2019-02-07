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
                <h1>Editar <small>pregunta</small></h1>
            </div>
            <!-- form -->
            <div class="row">
                <div class="col-md-12">
                @include('partials.messages')
                {!! Form::model($respuesta, array('route' => array('soluciones.update', $respuesta->id), 'method' => 'PUT', 'files'=>true)) !!}
                        @include('partials.forms.solucion')
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <form id="delete-f" action="{{ route('soluciones.destroy', $respuesta->id) }}" method="POST" onsubmit="">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="DELETE">
                        <div class="right">
                            <button id="btn-del" style="margin-left: 90%" type="button" class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
    $('#btn-del').on('click', function(e){
        e.preventDefault();
        swal({   
            title: "Confirmación",
            text: "Esta pregunta y sus respuestas no se podrá recuperar después.",         
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