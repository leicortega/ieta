<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

    protected function create(Request $request) 
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
        }

        $new_personal =  Personal::create([
            'identificacion' => $request['identificacion'],
            'name' => $request['name'],
            'sede' => $request['sede'],
            'cargo' => $request['cargo'],
            'estado' => $request['estado'],
            'email' => $request['email'],
            'pin' => rand(1000, 9999),
            'qr' => $qr,
            'foto' => $foto
        ]);

        $new_personal->save();

        return view('create-personal', ['personal' => $new_personal]);
    }

    public function view_all()
    {
        $personal = Personal::paginate(10);
        return view('ver-personal', ['personal' => $personal]);
    }

}
