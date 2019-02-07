<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{ asset('css/custombar.css') }}">
    <!--link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <script-- src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.11.0/sweetalert2.all.min.js"></script-->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <title>FAQ</title>
</head>
<body>
    @include('sweetalert::alert')
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <nav id="spy">
                <ul class="sidebar-nav nav">
                    <li class="sidebar-brand">
                        <a href="{{ route('welcome') }}"><span class="fa fa-home solo">Inicio</span></a>
                    </li>
                    @foreach(\App\Seccion::all() as $seccion)
                    <li>
                        <a href="{{ route('welcome') }}#anch{{ $seccion->id }}" data-scroll>
                            <span class=""> <i class="glyphicon {{ $seccion->icon }}"></i> {{ $seccion->name }}</>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </div>

        <!-- Page content -->
        @yield('content')

    </div>
</body>
</html>
<!--script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script>
    /*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
    });
</script>