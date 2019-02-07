<style>
    input[type=radio] {
    margin: 10px;
}
</style>
<div class="panel panel-primary col-sm-8 col-sm-offset-2">
    <div class="panel-body">
        <div class="form-group">
            {!! Form::label('name', 'Nombre de la sección') !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Métodos de pago', 'required'=>'required']) !!}
        </div>
        <div class="form-group">
            {{ Form::label('xd', 'Ícono') }}
            <br>
            <span class="glyphicon glyphicon-ok-circle"></span>Ok
            {{ Form::radio('icon', 'glyphicon-ok-circle' , true) }}
            <span class="glyphicon glyphicon-ban-circle"></span>Ban
            {{ Form::radio('icon', 'glyphicon-ban-circle' , false) }}
            <span class="glyphicon glyphicon-credit-card"></span>Credit card
            {{ Form::radio('icon', 'glyphicon-credit-card' , false) }}
            <span class="glyphicon glyphicon-tower"></span>King
            {{ Form::radio('icon', 'glyphicon-tower' , false) }}
            <span class="glyphicon glyphicon-earphone"></span>Phone
            {{ Form::radio('icon', 'glyphicon-earphone' , false) }}
            <span class="glyphicon glyphicon-plus"></span>Más
            {{ Form::radio('icon', 'glyphicon-plus' , false) }}
            <span class="glyphicon glyphicon-minus"></span>Menos
            {{ Form::radio('icon', 'glyphicon-minus' , false) }}
        </div>
        <div class="form-group">
            {!! Form::label('', 'Descripción') !!}
            {!! Form::textarea('description', null, ['class'=> 'form-control', 'rows'=>"3", 'placeholder'=>'Una pequeña descripción del tema principal de la sección.', 'required'=>'required']) !!}
        </div>
    </div>
    <div class="panel-footer">
            {!! Form::button('<i class="glyphicon glyphicon-upload"></i> ACEPTAR', ['type'=>'submit', 'class' => 'btn btn-primary']) !!}
    </div>
</div>