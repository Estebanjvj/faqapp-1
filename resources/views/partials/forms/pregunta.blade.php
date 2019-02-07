<style>
        input[type=radio] {
        margin: 10px;
    }
    </style>
    <div class="panel panel-primary col-sm-8 col-sm-offset-2">
        <div class="panel-body">
            <div class="form-group">
                {!! Form::label('name', 'Pregunta') !!}
                {!! Form::text('pregunta', null, ['class' => 'form-control', 'placeholder'=>'Qué métodos de pago existen', 'required'=>'required']) !!}
                @if(!empty($seccion))
                    {{ Form::hidden('id',$seccion) }}
                @endif
            </div>
        </div>
        <div class="panel-footer">
                {!! Form::button('<i class="glyphicon glyphicon-upload"></i> ACEPTAR', ['type'=>'submit', 'class' => 'btn btn-primary']) !!}
        </div>
    </div>