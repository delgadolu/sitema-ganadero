<?php

namespace App\Http\Controllers;

use App\Nobillas;
use App\Vacas;
use App\Toros;
use Illuminate\Http\Request;

class NobillasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nobillas = Nobillas::orderBy('id','DESC')->paginate(3);
        return view('nobillas.nobillas_index',compact('nobillas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vacas = Vacas::all();
        $toros = Toros::all();
        return view('nobillas.nobillas_create',['vacas' => $vacas, 'toros' => $toros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_nobilla'=>'required', 'edad_nobilla'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Nobillas::create($request->all());
        return redirect()->route('nobillas.index')->with('success','Registro creado satisfactoriamente');
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
        $nobillas = Nobillas::find($id);
        return  view('nobillas.show',compact('nobillas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nobillas=Nobillas::find($id);
        return view('nobillas.edit',compact('nobillas'));
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
        //
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_nobilla'=>'required', 'edad_nobilla'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Nobillas::find($id)->update($request->all());
        return redirect()->route('nobillas.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Nobillas::find($id)->delete();
        return redirect()->route('nobillas.index')->with('success','Registro eliminado satisfactoriamente');
    }
}