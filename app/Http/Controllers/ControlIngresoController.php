<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Control_ingreso;
use App\Ingreso;
use App\User;

class ControlIngresoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function funcionarios () { 
        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                    $query->orderBy('fecha','desc'); 
                    $query->where('sede', Auth::user()->sede); 
                }))
                ->where('tipo', 'Funcionario')
                ->paginate(10);

        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function clientes () {
        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                    $query->orderBy('fecha','desc');
                    $query->where('sede', Auth::user()->sede); 
                }))
                ->where('tipo', 'Cliente')
                ->paginate(10);

        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function search(Request $request) {
        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                    $query->orderBy('fecha','desc'); 
                    $query->where('sede', Auth::user()->sede); 
                }))
                ->where('identificacion', $request['identificacion_search'])
                ->paginate(10);

        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function create(Request $request) {
        $new = Control_ingreso::create([
            'name' => $request['name'],
            'identificacion' => $request['identificacion'],
            'telefono' => $request['telefono'],
            'edad' => $request['edad'],
            'email' => $request['email'],
            'tipo' => $request['tipo'],
        ]);

        if($new->save()){
            if ($request['tipo'] == 'Funcionario') {
                return redirect()->route('funcionarios', ['create' => 1, 'id' => $new->id, 'name' => $new->name]);
            } else {
                return redirect()->route('clientes', ['create' => 1, 'id' => $new->id, 'name' => $new->name]);
            }
        } else {
            if ($request['tipo'] == 'Funcionario') {
                return redirect()->route('funcionarios')->with('create', 0);
            } else {
                return redirect()->route('clientes')->with('create', 0);
            }
        }
    }

    public function registrar(Request $request) {
        $ingresado_hoy = Ingreso::where([['control_ingreso_id', $request['control_ingreso_id']], ['fecha', $request['fecha']], ['sede', Auth::user()->sede]])->exists();

        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                $query->orderBy('fecha','desc'); }))
                ->paginate(10);

        if ($ingresado_hoy) {
            if ($request['tipo'] == 'Funcionario') {
                return redirect()->route('funcionarios')->with('ingreso', 2);
            } else {
                return redirect()->route('clientes')->with('ingreso', 2);
            }
        } else {
            $new_ingreso = Ingreso::create([
                'fecha' => $request['fecha'],
                'estado' => $request['estado'],
                'temperatura' => $request['temperatura'],
                'contagiados' => $request['contagiados'],
                'dolor'=>$request['dolor'],
                'fiebre'=>$request['fiebre'],
                'tos'=>$request['tos'],
                'dificultad'=>$request['dificultad'],
                'fatiga'=>$request['fatiga'],
                'escalofrio'=>$request['escalofrio'],
                'musculo'=>$request['musculo'],
                'control_ingreso_id' => $request['control_ingreso_id'],
                'sede' => Auth::user()->sede
            ]);
    
            if($new_ingreso->save()){
                if ($request['tipo'] == 'Funcionario') {
                    return redirect()->route('funcionarios')->with('ingreso', 1);
                } else {
                    return redirect()->route('clientes')->with('ingreso', 1);
                }
            } else {
                if ($request['tipo'] == 'Funcionario') {
                    return redirect()->route('funcionarios')->with('ingreso', 0);
                } else {
                    return redirect()->route('clientes')->with('ingreso', 0);
                }
            }
        }
    }

    public function createSearch(Request $request) {
        $user = Control_ingreso::where('identificacion', $request['id'])->get();

        if ($user[0]->exists()) {
            return ['id' => $user[0]->id, 'name' => $user[0]->name];
        }
    }

    public function verHistorial(Request $request, $id){
        $funcionarios = Control_ingreso::with('ingresos')->where('id', $id)->paginate(10);
        return view('ver-registros', ['funcionarios' => $funcionarios]);
    }
}
