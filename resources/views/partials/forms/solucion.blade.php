
    <div class="panel panel-primary col-sm-8 col-sm-offset-2">
        <div class="panel-body">
            @if(!empty($pregunta))
                {{ Form::hidden('id',$pregunta) }}
                <h3>{{ \App\Pregunta::find($pregunta)->pregunta }}</h3>
            @endif
            <div class="form-group">
                {!! Form::label('', 'Solución') !!}
                {!! Form::textarea('solucion', null, ['class'=> 'form-control', 'placeholder'=>'Aquí se puede describir paso a paso una manera de solucionar el problema.', 'required'=>'required']) !!}
                
            </div>
            <hr>
            <div class="form-group">
                {!! Form::label('', 'Pasos (Opcional, solo si la respuesta lo requiere)') !!}
                <div>
                    <ul id="pasosul">
                        @if(isset($respuesta))
                            @if($respuesta->pasos()->count()>0)
                            @foreach($respuesta->pasos()->get() as $paso)
                                <div class='row'>
                                    <hr>
                                    <li>
                                    <div class='col-md-6'>
                                        <input class='form-control' type='hidden' name='step[]' value='{{ $paso->paso }}'>
                                        <p>{{ $paso->paso }}</p>
                                    </div>
                                    <div class='col-md-6'>
                                        <input class='' type='file' name='image[]' accept='image/jpeg,image/gif,image/png,image'><br>
                                        <button class='btn btn-sm btn-danger' onclick='quitar(this);'>Eliminar</button></div>
                                    </li>
                                </div>
                            @endforeach
                            @endif
                        @endif
                    </ul>
                </div>
                <div class="form-group">
                    {!! Form::label('a', 'Nuevo paso') !!}
                    {!! Form::textarea('a', null,
                        ['class'=> 'form-control', 'rows'=>'3', 'id'=>'paso','placeholder'=>'(Opcional, solo si la respuesta lo requiere)']) !!}
                </div>
                <div class="row">
                    <!--div class="form-group col-md-10">
                        {!! Form::label('', 'Imagen') !!}
                        {!! Form::file('never-mind', ['accept'=>'image/jpeg,image/gif,image/png,image','id'=>'image', 'disabled'=>'disabled']) !!}
                        <p class="help-block"><em>Cargar Imagen (JPGE,GIF,PNG) opcional</em></p>
                        <label>Descripción</label>
                        <textarea class="form-control" rows="2" cols="30" ></textarea>
                    </div-->
                    <div class="form-group col-md-2">
                        {!! Form::label('', '') !!}
                        <button type="button" class="btn btn-success" onclick='agregar();' id='agr'>Agregar</button>
                    </div>
                </div>
                <hr>
            </div>
            <div class="form-group">
                {!! Form::label('', 'Referencias') !!}
                {!! Form::textarea('fuentes', null, ['class'=> 'form-control', 'rows'=>'3', 'placeholder'=>'Me he basado en el enlace: https://www.lawebfake/solucion19.']) !!}
            </div>
        </div>
        <div class="panel-footer">
                {!! Form::button('<i class="glyphicon glyphicon-upload"></i> ACEPTAR', ['type'=>'submit', 'class' => 'btn btn-primary']) !!}
        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
        //inputs of products
        var input_paso = $('#paso');
        //var input_file = $('#image');

        var lista = $('#pasosul');
        function agregar() {
            
            var element = ""+
                "<div class='row'> <hr><li>"+
                    "<div class='col-md-6'>"+
                        "<input class='form-control' type='hidden' name='step[]' value='"+input_paso.val()+"'>"+
                        "<p>"+input_paso.val()+" </p></div>"+
                    "<div class='col-md-6'>"+
                        "<input class='' type='file' name='image[]' accept='image/jpeg,image/gif,image/png,image'><br>"+
                        "<button class='btn btn-sm btn-danger' onclick='quitar(this);'>Eliminar</button></div>"+
                "</li></div>";
            lista.append(element);
            input_paso.val(null);
            //input_file.val(null);
        }

        function quitar(o) {
            var p=o.parentNode.parentNode.parentNode;
            p.parentNode.removeChild(p);
            //delete rows[id];
        }
    </script>