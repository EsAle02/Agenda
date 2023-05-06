<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function index(){
        $contactos = Contacto::paginate(10);
        return view('contactos.RaizContacto')->with('contactos', $contactos);
    }


    public function show($id){
        $contactos = Contacto::findOrfail($id);
        return view('contactos.ContactoIndividual')->with('contactos', $contactos);
    }

    public function create(){
        return view('contactos.FormularioContacto');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validatedData = $request->validate([
        
            "nombre" => 'required|string|regex:/[a-zA-Z áéíóúñ]+/i|min:3',
            "apellido" => 'required|string|regex:/[a-zA-Z áéíóúñ]+/i|min:3',
            "correo_electronico" => 'required|email|unique:contactos,correo_electronico',
            "telefono" => 'required|numeric',
         ]);
        
        

        $Contacto = new Contacto();
        $Contacto->Nombre = $request->input("nombre");
        $Contacto->Apellido = $request->input("apellido");
        $Contacto->correo_electronico = $request->input("correo_electronico");
        $Contacto->Telefono = $request->input("telefono");

        $creado = $Contacto->save();

        if($creado) {
            return redirect()->route('contactos.index')
            ->with('mensaje','El contacto fue creado exitosamente');
        }
         else {
            return back();
        };
        
    }
    
    public function edit($id){
        $Contacto = Contacto::FindOrfail($id);
        return view('contactos.FormularioContacto')->with('Contacto', $Contacto);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|alpha',
            'apellido' => 'required|alpha',
            'correo_electronico' => 'required|email',
            'telefono' => 'required',
        ]);

        $Contacto = Contacto::find($id);
        $Contacto->Nombre = $request->input("nombre");
        $Contacto->Apellido = $request->input("apellido");
        $Contacto->correo_electronico = $request->input("correo_electronico");
        $Contacto->Telefono = $request->input("telefono");

        $creado = $Contacto->save();
        if($creado){
        return redirect()->route('contactos.index')
        ->with('mensaje', 'Contacto actualizado exitosamente.');
        }
        else{
        return back();
        }
    }

    public function destroy($id){
        $contacto = Contacto::with('eventos','notas')->find($id);
        if ($contacto) {
            $contacto->eventos()->delete();
            $contacto->notas()->delete();
            $contacto->delete();
        }
        return redirect()->route('contactos.index')
        ->with('mensaje', 'El contacto ha sido eliminado.');
    
    }    
}