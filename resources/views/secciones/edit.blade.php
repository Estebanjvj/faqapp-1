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
                {!! Form::model($seccion, array('route' => array('secciones.update', $seccion->id), 'method' => 'PUT')) !!}
                        @include('partials.forms.seccion')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
</div>
@endsection
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    /*Scroll Spy*/
    //$('body').scrollspy({ target: '#spy', offset:80});

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