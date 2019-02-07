<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pregunta;
use App\Respuesta;
use App\Paso;
use App\Http\Requests\RespuestaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pregunta)
    {
        return view('respuestas/create', compact(['pregunta']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RespuestaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RespuestaRequest $request)
    {
        $respuesta = new Respuesta();
        //dd($request);
        $respuesta->solucion = $request->solucion;
        $respuesta->fuentes = $request->fuentes;
        $respuesta->pregunta_id = $request->id;
        $respuesta->save();
        if($request->step)
        {
            //($request->image) ? null : $request->image = [];

            foreach($request->step as $p => $k)
            {
                $paso = new Paso();
                $paso->paso = $k;
                $paso->respuesta_id = $respuesta->id;
                $files = $request->file('image');
                if(isset($files[$p]))
                {
                    $im = $files[$p];
                    
                    $ext = $im->extension();
                    $iname = $respuesta->id.'p'.$p.'.'.$ext;
                    
                    $finalfile = $im->move(public_path('pasos_img'),$iname);
                    //dd($im,$files,$ext, $iname, $finalfile);
                    $paso->image = $iname;
                    //dd($paso->image);
                }
                $paso->save();
            }
        }
        Alert::success('Agregado correctamente', 'Respuesta')->persistent('Ok');
        return redirect('/')->with('info','Nueva respuesta agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $respuesta = Respuesta::find($id);
        return view('respuestas.edit', compact('respuesta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $respuesta = Respuesta::find($id);
        $respuesta->solucion = $request->solucion;
        $respuesta->fuentes = $request->fuentes;
        $respuesta->save();
        $respuesta->pasos()->delete();
        if($request->step)
        {
            //($request->image) ? null : $request->image = [];

            foreach($request->step as $p => $k)
            {
                $paso = new Paso();
                $paso->paso = $k;
                $paso->respuesta_id = $respuesta->id;
                //dd($request->image);
                $files = $request->file('image');
                if(isset($files[$p]))
                {
                    $im = $files[$p];
                    $ext = $im->extension();
                    $iname = $respuesta->id.'p'.$p.'.'.$ext;
                    $finalfile = $im->move(public_path('pasos_img'),$iname);
                    //dd($im,$files,$ext, $iname, $finalfile);
                    $paso->image = $iname;
                }
                $paso->save();
            }
        }
        Alert::success('Editado correctamente', 'Respuesta')->persistent('Ok');
        return redirect('/')->with('info','respuesta editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $respuesta = Respuesta::find($id);
        $respuesta->delete();
        Alert::warning('Respuesta eliminado', 'respuesta ya no existe')->persistent('Ok');
        return redirect('/')->with('info', 'Pregunta eliminada');
    }
}
