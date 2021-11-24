<?php

namespace App\Http\Controllers;

use App\Becerros;
use App\Vacas;
use App\Toros;
use App\TipoAnimal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade as PDF;

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
        return view('becerros.becerros_index',compact('becerros')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $tipoAnimal = TipoAnimal::all();
        $vacas = Vacas::all();
        $toros = Toros::all();
        return view('becerros.becerros_create',[
            'vacas'      => $vacas, 
            'toros'      => $toros,
            'tipoAnimal' => $tipoAnimal]);
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerro'=>'required', 'edad_becerro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $Becerros = Becerros::create($request->all());

        if($request->hasFile('img_becerro')){
            $nameBecerro        = $Becerros->id.'_'.time().'_'.time().$request->num_registro.'.jpg';
            $imgBecerro         = $request->file('img_becerro');
            $destinationPath = public_path('uploads\becerros');
            $imgBecerro->move($destinationPath, $nameBecerro);

            Becerros::where('id',$Becerros->id)->update([
                'img_becerro'       => $nameBecerro
            ]);
        }
        if($request->hasFile('img_padre_becerro') ){
            $nameBecerro_padre  = $Becerros->id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_becerro');
            $destinationPath = public_path('uploads\becerros');
            $imgPadre->move($destinationPath, $nameBecerro_padre);

            Becerros::where('id',$Becerros->id)->update([      
                'img_padre_becerro' => $nameBecerro_padre
             ]);
        }
        if ($request->hasFile('img_madre_becerro')) {
            $nameBecerro_madre  = $Becerros->id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_becerro');
            $destinationPath = public_path('uploads\becerros');
            $imgMadre->move($destinationPath, $nameBecerro_madre);
            Becerros::where('id',$Becerros->id)->update([
                'img_madre_becerro' => $nameBecerro_madre
            ]);
        }

        
        return redirect()->route('becerros.index')->with('success','Registro creado satisfactoriamente');
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
        return  view('becerros.show',compact('becerros'));
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
        $becerros   = Becerros::find($id);
        $tipoAnimal = TipoAnimal::all(); 
        $vacas = Vacas::all();
        $toros = Toros::all();

        return view('becerros.becerros_edit', [
            'tipoAnimal' => $tipoAnimal, 
            'becerros'   => $becerros,
            'vacas'      => $vacas,
            'toros'      => $toros,
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
        $this->validate($request,[ 'num_registro'=>'required', 'fecha_nacim'=>'required', 'nombre_becerro'=>'required', 'edad_becerro'=>'required', 'peso_nacim'=>'required', 'peso_destete'=>'required', 'num_registro_papa'=>'required', 'num_registro_mama'=>'required', 'tipo_animal_id'=>'required']);

        $becerros = Becerros::find($id);
        Becerros::find($id)->update($request->all());

        if($request->hasFile('img_becerro')){
            $dirimgs = public_path().'/uploads/'.$becerros->img_becerro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameBecerro        = $id.'_'.time().$request->num_registro.'.jpg';
            $imgBecerro         = $request->file('img_becerro');
            $destinationPath = public_path('uploads\becerros');
            $imgBecerro->move($destinationPath, $nameBecerro);
            Becerros::where('id',$id)->update([
                'img_becerro'       => $nameBecerro
            ]);
    
        }
        if($request->hasFile('img_padre_becerro') ){
            $dirimgs = public_path().'/uploads/'.$becerros->img_padre_becerro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameBecerro_padre  = $id.'_'.time().'_'.$request->num_registro_papa.'.jpg';
            $imgPadre        = $request->file('img_padre_becerro');
            $destinationPath = public_path('uploads\toros');
            $imgPadre->move($destinationPath, $nameBecerro_padre);
            becerros::where('id',$id)->update([
                'img_padre_becerro' => $nameBecerro_padre
            ]);
    
        }
        if ($request->hasFile('img_madre_becerro')) {
            $dirimgs = public_path().'/uploads/'.$becerros->img_madre_becerro;

            if(File::exists($dirimgs)) {
                File::delete($dirimgs); 
            }
            $nameBecerro_madre  = $id.'_'.time().'_'.time().$request->num_registro_mama.'.jpg'; 
            $imgMadre        = $request->file('img_madre_becerro');
            $destinationPath = public_path('uploads\becerros');
            $imgMadre->move($destinationPath, $nameBecerro_madre);
            Becerros::where('id',$id)->update([
                'img_madre_becerro' => $nameBecerro_madre
            ]);
        }

        return redirect()->route('becerros.index')->with('success','Registro actualizado satisfactoriamente');

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
        return redirect()->route('becerros.index')->with('success','Registro eliminado satisfactoriamente');
    }

    public function download()
    {
        $becerros = Becerros::orderBy('id','DESC')->get(); 
        $pdf = PDF::loadView('becerros.becerros_report',['becerros'=>$becerros]);

        return $pdf->download('reporte_becerros.pdf');
       
      
    }


}
