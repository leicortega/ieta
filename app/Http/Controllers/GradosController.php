<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use App\Models\Grado;
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
}
