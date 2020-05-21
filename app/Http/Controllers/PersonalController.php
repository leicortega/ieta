<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PersonalCreateFormRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Personal;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('create-personal');
    }

    protected function create(PersonalCreateFormRequest $request) 
    {
        $last_personal = Personal::orderby('id','DESC')->first();

        if(!$last_personal) {
            $last_personal = 1;
        } else {
            $last_personal = $last_personal->id + 1;
        }

        QrCode::format('png')->size(250)->generate(route('view', $last_personal), '../public/assets/images/qr/qrcode_'.$last_personal.'.png');

        $qr = 'assets/images/qr/qrcode_'.$last_personal.'.png';

        if (!$request['foto']) {
            $foto = 'avatar.png';
        } else {
            if ($foto = Personal::setFoto($request->foto)) {
                $request->request->add(['fotoName' => $foto]);

                $foto = $request['fotoName'];
            }
        }

        $new_personal =  Personal::create([
            'identificacion' => $request['identificacion'],
            'name' => $request['name'],
            'sede' => $request['sede'],
            'cargo' => $request['cargo'],
            'estado' => $request['estado'],
            'email' => $request['email'],
            'rh' => $request['rh'],
            'pin' => rand(1000, 9999),
            'qr' => $qr,
            'foto' => $foto
        ]);

        if($new_personal->save()){
            return view('create-personal', ['create' => 1, 'qr' => $new_personal->qr]);
        } else {
            return view('create-personal', ['create' => 0]);
        }

        
    }

    public function update(Request $request)
    {
        $persona = Personal::find($request->id);
        
        $persona->identificacion = $request->identificacion;
        $persona->name = $request->name;
        $persona->sede = $request->sede;
        $persona->cargo = $request->cargo;
        $persona->estado = $request->estado;
        $persona->email = $request->email;
        $persona->rh = $request->rh;

        if ($persona->save()) {
            return redirect()->back()->with('success', 1);
        } else {
            return redirect()->back()->with('error', 1);
        }
        
    }

    public function view_all()
    {
        $personal = Personal::paginate(10);
        return view('ver-personal', ['personal' => $personal]);
    }

}
