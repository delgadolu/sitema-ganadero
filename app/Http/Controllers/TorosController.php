<?php

namespace App\Http\Controllers;

use App\Toros;
use App\TipoAnimal;
use Illuminate\Http\Request;
class TorosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toros = Toros::orderBy('id','DESC')->paginate(3);
        return view('toros.toros_index',compact('toros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoAnimal = TipoAnimal::all();

        return view('toros.toros_create', [
            'tipoAnimal' => $tipoAnimal
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_toro'=>'required', 'edad_toro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_saltar'=>'required', 'hijas_provadas'=>'required', 'tipo_animal_id'=>'required']);

        toros::create($request->all());
        return redirect()->route('toros.index')->with('success','Registro creado satisfactoriamente');

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
        $toros = toros::find($id);
        return  view('toros.show',compact('toros'));
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
        $toros=toros::find($id);
        return view('toros.edit',compact('toros'));
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_toro'=>'required', 'edad_toro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_saltar'=>'required', 'hijas_provadas'=>'required', 'tipo_animal_id'=>'required']);
 
        toros::find($id)->update($request->all());
        return redirect()->route('toros.index')->with('success','Registro actualizado satisfactoriamente');
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
        toros::find($id)->delete();
        return redirect()->route('toros.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
