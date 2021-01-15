<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    public function __construct(Type $var = null) {
        $this->middleware('auth');
    }

    public function index() {
        $estudiantes = Estudiante::paginate(20);

        return view('estudiantes.index', ['estudiantes' => $estudiantes]);
    }

    public function create(Request $request) {
        Validator::make($request->all(), [
            'identificacion' => 'required|integer',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
        ])->validate();

        $estudiante = Estudiante::create($request->all());

        if ($estudiante->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Estudiante creado correctamente.']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'Ocurrio un error, intente nuevamente.']);
        }
    }
}



