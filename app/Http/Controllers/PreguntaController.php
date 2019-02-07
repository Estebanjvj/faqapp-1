<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Pregunta;
use App\Http\Requests\PreguntaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class PreguntaController extends Controller
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
    public function create($seccion)
    {
        return view('preguntas/create', compact(['seccion']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PreguntaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreguntaRequest $request)
    {
        $pregunta = new Pregunta();
        $pregunta->pregunta = $request->pregunta;
        $pregunta->seccion_id = $request->id;
        $pregunta->save();
        Alert::success('Agregado correctamente', 'Pregunta')->persistent('Ok');
        return redirect('/')->with('info','Nueva pregunta: "'.$pregunta->pregunta.'" agregada');
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
        $pregunta = Pregunta::find($id);
        return view('preguntas.edit', compact('pregunta'));
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
        $pregunta = Pregunta::find($id);
        $pregunta->pregunta = $request->pregunta;
        $pregunta->save();
        Alert::success('Editado correctamente', 'Pregunta')->persistent('Ok');
        return redirect('/')->with('info','pregunta editada: "'.$pregunta->pregunta.'"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pregunta = Pregunta::find($id);
        $p = $pregunta->pregunta;
        $pregunta->delete();
        Alert::warning('Elemento eliminado', $p.' ya no existe')->persistent('Ok');
        return redirect('/')->with('info', 'Pregunta "'.$p.'" eliminada');
    }
}
