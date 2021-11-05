<?php

namespace App\Http\Controllers;

use App\Becerros;
use Illuminate\Http\Request;

class BecerrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $becerros = Becerros::orderBy('id','DESC')->paginate(3);
        return view('Becerros.Becerros_index',compact('becerros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Becerros.Becerros_create');
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerro'=>'required', 'edad_becerro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Becerros::create($request->all());
        return redirect()->route('Becerros.index')->with('success','Registro creado satisfactoriamente');
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
        $becerros = Becerros::find($id);
        return  view('Becerros.show',compact('Becerros'));
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
        $becerros=Becerros::find($id);
        return view('Becerros.edit',compact('Becerros'));
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerro'=>'required', 'edad_becerro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'vaca_id'=>'required', 'toro_id'=>'required', 'tipo_animal_id'=>'required']);

        Becerros::find($id)->update($request->all());
        return redirect()->route('Becerros.index')->with('success','Registro actualizado satisfactoriamente');
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
        Becerros::find($id)->delete();
        return redirect()->route('Becerros.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
