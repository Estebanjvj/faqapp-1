<!-- Message powered by Controller -->
@if(Session::has('info'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="glyphicon glyphicon-ok-sign"></i> {{ Session::get('info') }}
    </div>
@elseif(Session::has('warning'))
    <div class="alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="glyphicon glyphicon-info-sign"></i> {{ Session::get('warning') }}
    </div>
@elseif(Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <i class="glyphicon glyphicon-info-sign"></i> {{ Session::get('error') }}
    </div>
@endif
<!-- errors powered by Request -->
@if(count($errors)>0)
    <div class="alert alert-warning alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $error)
            <ul>
                <i class="glyphicon glyphicon-info-sign"></i> {{ " ".$error }}
            </ul>  
        @endforeach
    </div>
@endif