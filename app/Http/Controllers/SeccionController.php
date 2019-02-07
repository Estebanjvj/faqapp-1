<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Http\Requests\SeccionRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $secciones = Seccion::all();
        return view('/', compact('secciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secciones/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SeccionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeccionRequest $request)
    {
        $seccion = new Seccion();
        $seccion->name = $request->name;
        $seccion->icon = $request->icon;
        $seccion->description = $request->description;
        $seccion->save();
        Alert::success('Agregado correctamente', 'Secciones')->persistent('Ok');
        return redirect('/')->with('info','Nueva seccion: "'.$seccion->name.'" agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seccion = Seccion::find($id);
        return view('secciones.show', compact('seccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccion = Seccion::find($id);
        return view('secciones.edit', compact('seccion'));
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
        $seccion = Seccion::find($id);
        $seccion->name = $request->name;
        $seccion->icon = $request->icon;
        $seccion->description = $request->description;
        $seccion->save();
        Alert::success('Editado correctamente', 'Secciones')->persistent('Ok');
        return redirect('/')->with('info','Edición completada, caso: "'.$seccion->name.'"');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seccion = Seccion::find($id);
        $nombre = $seccion->name;
        $seccion->delete();
        Alert::warning('Elemento eliminado', $nombre.' ya no existe')->persistent('Ok');
        return redirect('/')->with('info', 'Seccion "'.$nombre.'" eliminada');
    }
}
