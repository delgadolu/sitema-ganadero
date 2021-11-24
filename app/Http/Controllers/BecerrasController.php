<?php

namespace App\Http\Controllers;

use App\Becerras;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;
use App\Toros;
use App\Vacas;

class BecerrasController extends Controller
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
        $becerras = Becerras::orderBy('id','DESC')->paginate(3);
        return view('becerras.becerras_index',compact('becerras')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipoAnimal = TipoAnimal::all();

        return view('becerras.becerras_create', [
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
        //
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerra'=>'required', 'edad_becerra'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $Becerras = Becerras::create($request->all());

        if($request->hasFile('img_becerra')){
            $nameBecerra        = $Becerras->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgBecerra         = $request->file('img_becerra');
            $destinationPath = public_path('uploads\becerras');
            $imgBecerra->move($destinationPath, $nameBecerra);

            Becerras::where('id',$Becerras->id)->update([
                'img_becerra'       => $nameBecerra
            ]);
        }
        if($request->hasFile('img_padre_becerra') ){
            $nameBecerra_padre  = $Becerras->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_becerra');
            $destinationPath = public_path('uploads\becerras');
            $imgPadre->move($destinationPath, $nameBecerra_padre);

            Becerras::where('id',$Becerras->id)->update([
                'img_padre_becerra' => $nameBecerra_padre
             ]);
        }
        if ($request->hasFile('img_madre_becerra')) {
            $nameBecerra_madre  = $Becerras->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_becerra');
            $destinationPath = public_path('uploads\becerras');
            $imgMadre->move($destinationPath, $nameBecerra_madre);

            Becerras::where('id',$Becerras->id)->update([
                'img_madre_becerra' => $nameBecerra_madre
            ]);
        }

        return redirect()->route('becerras.index')->with('success','Registro creado satisfactoriamente');
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
        $becerras = Becerras::find($id);
        return  view('becerras.show',compact('becerras'));
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
        $becerras = Becerras::find($id);

        $tipoAnimal = TipoAnimal::all();

        return view('becerras.becerras_edit', [
            'tipoAnimal' => $tipoAnimal, 'becerras' => $becerras
        ]);
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerra'=>'required', 'edad_becerra'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $becerras = Becerras::find($id);
        Becerras::find($id)->update($request->all());

        if($request->hasFile('img_becerra')){
            $dirimgs = public_path().'/uploads/'.$becerras->img_becerra;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameBecerra        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgBecerra         = $request->file('img_becerra');
            $destinationPath = public_path('uploads\becerras');
            $imgBecerra->move($destinationPath, $nameBecerra);
            Becerras::where('id',$id)->update([
                'img_becerra'       => $nameBecerra
            ]);
    
        }
        if($request->hasFile('img_padre_becerra') ){
            $dirimgs = public_path().'/uploads/'.$becerras->img_padre_becerra;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameBecerra_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_becerra');
            $destinationPath = public_path('uploads\becerras');
            $imgPadre->move($destinationPath, $nameBecerra_padre);
            becerras::where('id',$id)->update([
                'img_padre_becerra' => $nameBecerra_padre
            ]);
    
        }
        if ($request->hasFile('img_madre_becerra')) {
            $dirimgs = public_path().'/uploads/'.$becerras->img_madre_becerra;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameBecerra_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_becerra');
            $destinationPath = public_path('uploads\becerras');
            $imgMadre->move($destinationPath, $nameBecerra_madre);
            Becerras::where('id',$id)->update([
                'img_madre_becerra' => $nameBecerra_madre
            ]);
        }

        return redirect()->route('becerras.index')->with('success','Registro actualizado satisfactoriamente');
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
        Becerras::find($id)->delete();
        return redirect()->route('becerras.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function download()
    {
        $becerras = Becerras::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('becerras.becerras_report',['becerras'=>$becerras]);

        return $pdf->download('reporte_becerras.pdf');
       
      
    }
}
