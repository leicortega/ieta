<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function __construct(Type $var = null) {
        $this->middleware('auth');
    }

    public function index() {
        $materias = Materia::paginate(20);

        return view('materias.index', ['materias' => $materias]);
    }

    public function create(Request $request) {
        Validator::make($request->all(), [
            'year' => 'required|integer',
            'nombre' => 'required',
        ])->validate();

        $materia = Materia::create($request->all());

        if ($materia->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Materia creada correctamente.']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'Ocurrio un error, intente nuevamente.']);
        }
    }
}
