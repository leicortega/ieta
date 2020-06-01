<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Control_ingreso;
use App\Ingreso;

class ControlIngresoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function funcionarios () {
        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                $query->orderBy('fecha','desc'); }))
                ->where('tipo', 'Funcionario')
                ->paginate(10);

        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function clientes () {
        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                $query->orderBy('fecha','desc'); }))
                ->where('tipo', 'Cliente')
                ->paginate(10);

        return view('funcionarios', ['funcionarios' => $funcionarios]);
    }

    public function search(Request $request) {
        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                $query->orderBy('fecha','desc'); }))
                ->where('identificacion', $request['identificacion'])
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

        $funcionarios = Control_ingreso::with(array('ingresos' => function($query){
                $query->orderBy('fecha','desc'); }))
                ->paginate(10);

        if($new->save()){
            if ($request['tipo'] == 'Funcionario') {
                return redirect()->route('funcionarios')->with('create', 1);
            } else {
                return redirect()->route('clientes')->with('create', 1);
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
        $ingresado_hoy = Ingreso::where([['control_ingreso_id', $request['control_ingreso_id']], ['fecha', $request['fecha']]])->exists();

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
                'control_ingreso_id' => $request['control_ingreso_id']
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


}
