<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Grado;
use App\Models\Detalle_grado;
use Illuminate\Http\Request;

class GradosController extends Controller
{
    public function __construct(Type $var = null) {
        $this->middleware('auth');
    }

    public function index() {
        $grados = Grado::paginate(20);

        return view('grados.index', ['grados' => $grados]);
    }

    public function create(Request $request) {
        Validator::make($request->all(), [
            'year' => 'required|integer',
            'nombre' => 'required',
        ])->validate();

        $grado = Grado::create($request->all());

        if ($grado->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Grado creado correctamente.']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'Ocurrio un error, intente nuevamente.']);
        }
    }

    public function ver(Request $request) {
        $grado = Grado::with(['detalle' => function ($query) {
            $query->with('estudiante'); }])
            ->with(['materias' => function ($query) {
                $query->with('profesor'); }])
            ->with('profesor')
            ->find($request['id']);

        return view('grados.ver', ['grado' => $grado]);
    }

    public function agregar_estudiante(Request $request) {
        $detalle = Detalle_grado::create($request->all());

        if ($detalle->save()) {
            return redirect()->back()->with(['create' => 1, 'mensaje' => 'Estudiante agregado correctamente.']);
        } else {
            return redirect()->back()->with(['create' => 0, 'mensaje' => 'El estudiante no se agrego, intente nuevamente.']);
        }

    }
}
