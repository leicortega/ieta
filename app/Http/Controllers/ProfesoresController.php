<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesoresController extends Controller
{
    public function __construct(Type $var = null) {
        $this->middleware('auth');
    }

    public function index() {
        $profesores = Profesor::paginate(20);

        return view('profesores.index', ['profesores' => $profesores]);
    }

    public function create(Request $request) {
        Validator::make($request->all(), [
            'identificacion' => 'required|integer',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
        ])->validate();

        $profesores = Profesor::create($request->all());

        if ($profesores->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Maestro creado correctamente.']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'Ocurrio un error, intente nuevamente.']);
        }
    }
}
