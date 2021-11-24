<?php

namespace App\Http\Controllers;

use App\Vacas;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

class VacasController extends Controller
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
        $vacas = Vacas::orderBy('id','DESC')->paginate(3);
        return view('Vacas.Vacas_index',compact('vacas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $tipoAnimal = TipoAnimal::all();

        return view('Vacas.Vacas_create', [
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_vaca'=>'required', 'edad_vaca'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_primer_servi'=>'required', 'edad_servi'=>'required', 'num_partos'=>'required', 'hijas_provadas'=>'required','num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $Vacas = Vacas::create($request->all());

        if($request->hasFile('img_vaca')){
            $nameVaca        = $Vacas->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgVaca         = $request->file('img_vaca');
            $destinationPath = public_path('uploads\Vacas');
            $imgVaca->move($destinationPath, $nameVaca);

            Vacas::where('id',$Vacas->id)->update([
            'img_vaca'       => $nameVaca
            ]);
        }
        if($request->hasFile('img_padre_vaca') ){
            $nameVaca_padre  = $Vacas->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_vaca');
            $destinationPath = public_path('uploads\Vacas');
            $imgPadre->move($destinationPath, $nameVaca_padre);

            Vacas::where('id',$Vacas->id)->update([
            
            'img_padre_vaca' => $nameVaca_padre
            
            ]);
        }
        if ($request->hasFile('img_madre_vaca')) {
            $nameVaca_madre  = $Vacas->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_vaca');
            $destinationPath = public_path('uploads\Vacas');
            $imgMadre->move($destinationPath, $nameVaca_madre);

            Vacas::where('id',$Vacas->id)->update([
            'img_madre_vaca' => $nameVaca_madre
            ]);
        }

        return redirect()->route('Vacas.index')->with('success','Registro creado satisfactoriamente');

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
        $vacas = Vacas::find($id);
        return  view('Vacas.show',compact('vacas'));
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
        $vacas=Vacas::find($id);
        
        $tipoAnimal = TipoAnimal::all();

        return view('Vacas.Vacas_edit', [
            'tipoAnimal' => $tipoAnimal, 'vacas' => $vacas
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
         $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_vaca'=>'required', 'edad_vaca'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'peso_primer_servi'=>'required', 'edad_servi'=>'required', 'num_partos'=>'required', 'hijas_provadas'=>'required','num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);
 
        $vaca = Vacas::find($id);
        Vacas::find($id)->update($request->all());

        if($request->hasFile('img_vaca')){
            $dirimgs = public_path().'/uploads/'.$vaca->img_vaca;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameVaca        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgVaca         = $request->file('img_vaca');
            $destinationPath = public_path('uploads\Vacas');
            $imgToro->move($destinationPath, $nameVaca);
            Vacas::where('id',$id)->update([
                'img_vaca'       => $nameVaca
            ]);
    
        }
        if($request->hasFile('img_padre_vaca') ){
            $dirimgs = public_path().'/uploads/'.$vaca->img_padre_vaca;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameVaca_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_vaca');
            $destinationPath = public_path('uploads\Vacas');
            $imgPadre->move($destinationPath, $nameVaca_padre);
            Vacas::where('id',$id)->update([
                'img_padre_vaca' => $nameVaca_padre
            ]);
    
        }
        if ($request->hasFile('img_madre_vaca')) {
            $dirimgs = public_path().'/uploads/'.$vaca->img_madre_vaca;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameVaca_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_vaca');
            $destinationPath = public_path('uploads\Vacas');
            $imgMadre->move($destinationPath, $nameVaca_madre);
            Vacas::where('id',$id)->update([
                'img_madre_vaca' => $nameVaca_madre
            ]);
    
        }

        return redirect()->route('Vacas.index')->with('success','Registro actualizado satisfactoriamente');
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
        Vacas::find($id)->delete();
        return redirect()->route('Vacas.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function download()
    {
        $vacas = Vacas::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('Vacas.Vacas_report',['vacas'=>$vacas]);

        return $pdf->download('reporte_vacas.pdf');
       
      
    }
}
