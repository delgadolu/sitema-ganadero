<?php

namespace App\Http\Controllers;

use App\TipoAnimal;
use Illuminate\Http\Request;

class TipoAnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoAnimal = TipoAnimal::all();

        return view('Tipo_Animal.Tipo_Animal_index', [
            'Tipo_Animal' => $tipoAnimal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tipo_Animal.Tipo_Animal_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Tipo_Animal = new TipoAnimal($request->input());
        $Tipo_Animal->saveOrFail();
        return redirect()->route('Tipo_Animal.index')->with(['mensaje' => 'Tipo de Animal creado']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAnimal $Tipo_Animal)
    {
       return view("Tipo_Animal.Tipo_Animal_edit", ["Tipo_Animal" => $Tipo_Animal]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAnimal $Tipo_Animal)
    {
         $Tipo_Animal->fill($request->input())->saveOrFail();
        return redirect()->route("Tipo_Animal.index")->with(["mensaje" => "Tipo de Animal actualizado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAnimal $Tipo_Animal)
    {
        $Tipo_Animal->delete();
        return redirect()->route("Tipo_Animal.index")->with(["mensaje" => "Tipo de Animal eliminado"]);
    }
}
