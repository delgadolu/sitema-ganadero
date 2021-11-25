<?php

namespace App\Http\Controllers;

use App\Nobillas;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;
use App\Toros;
use App\Vacas;

class NobillasController extends Controller
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
        $nobillas = Nobillas::orderBy('id','DESC')->paginate(10);;
        return view('nobillas.nobillas_index',[
            'nobillas' => $nobillas
        ]); 
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
        $vacas = Vacas::all();
        $toros = Toros::all();

        return view('nobillas.nobillas_create',[
            'tipoAnimal' => $tipoAnimal,
            'vacas'      => $vacas, 
            'toros'      => $toros
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
       $this->validate($request,['num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_nobilla', 'edad_nobilla'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required' ,'num_registro_mama'=>'required',  'tipo_animal_id'=>'required']);

        $Nobillas = Nobillas::create($request->all());

         if($request->hasFile('img_nobilla')){
            $nameNobilla        = $Nobillas->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgNobilla         = $request->file('img_nobilla');
            $destinationPath = public_path('uploads\nobillas');
            $imgNobilla->move($destinationPath, $nameNobilla);

            Nobillas::where('id',$Nobillas->id)->update([
                'img_nobilla'       => $nameNobilla
            ]);
        }
        if($request->hasFile('img_padre_nobilla') ){
            $nameNobilla_padre  = $Nobillas->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_nobilla');
            $destinationPath = public_path('uploads\nobillas');
            $imgPadre->move($destinationPath, $nameNobilla_padre);

            Nobillas::where('id',$Nobillas->id)->update([
                'img_padre_nobilla' => $nameNobilla_padre
            ]);
        }
        if ($request->hasFile('img_madre_nobilla')) {
            $nameNobilla_madre  = $Nobillas->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_nobilla');
            $destinationPath = public_path('uploads\nobillas');
            $imgMadre->move($destinationPath, $nameNobilla_madre);

            Nobillas::where('id',$Nobillas->id)->update([
                'img_madre_nobilla' => $nameNobilla_madre
             ]);
        }

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
        $nobillas= Nobillas::find($id);
        $tipoAnimal = TipoAnimal::all();
        $vacas = Vacas::all();
        $toros = Toros::all();

        return view('nobillas.nobillas_edit', [
            'tipoAnimal' => $tipoAnimal, 
            'nobillas'   => $nobillas,
            'vacas'      => $vacas,
            'toros'      => $toros
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
        $this->validate($request,['num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_nobilla', 'edad_nobilla'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required' ,'num_registro_mama'=>'required',  'tipo_animal_id'=>'required']);

        $nobilla = Nobillas::find($id);
        Nobillas::find($id)->update($request->all());

         if($request->hasFile('img_nobilla')){
            $dirimgs = public_path().'/uploads/'.$nobilla->img_nobilla;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameNobilla        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgNobilla         = $request->file('img_nobilla');
            $destinationPath = public_path('uploads\nobillas');
            $imgNobilla->move($destinationPath, $nameNobilla);
            Nobillas::where('id',$id)->update([
                'img_nobilla'       => $nameNobilla
            ]);
    
        }
        if($request->hasFile('img_padre_nobilla') ){
            $dirimgs = public_path().'/uploads/'.$nobilla->img_padre_nobilla;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameNobilla_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_nobilla');
            $destinationPath = public_path('uploads\nobillas');
            $imgPadre->move($destinationPath, $nameNobilla_padre);
            Nobillas::where('id',$id)->update([
                'img_padre_nobilla' => $nameNobilla_padre
            ]);
    
        }
        if ($request->hasFile('img_madre_nobilla')) {
            $dirimgs = public_path().'/uploads/'.$toro->img_madre_nobilla;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameNobilla_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_nobilla');
            $destinationPath = public_path('uploads\nobillas');
            $imgMadre->move($destinationPath, $nameNobilla_madre);
            Nobillas::where('id',$id)->update([
                'img_madre_nobilla' => $nameNobilla_madre
            ]);
    
        }

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

    public function download()
    {
        $nobillas = Nobillas::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('nobillas.nobillas_report',['nobillas'=>$nobillas]);

        return $pdf->download('reporte_nobillas.pdf');
       
      
    }
}