<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    public function users() {
        $users = User::paginate(10);

        return view('admin.users', ['users' => $users]);
    }

    public function create(Request $request) {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'sede' => $request['sede'],
        ]);

        if ($user->save()) {
            if ($request['tipo'] == 'admin') {
                if ($user->assignRole('admin')) {
                    return redirect()->route('users')->with('create', 1);
                }
            } else {
                if ($user->assignRole('general')) {
                    if ($user->givePermissionTo($request['permiso'])) {
                        return redirect()->route('users')->with('create', 1);
                    }
                }
            }
        }

        return redirect()->route('users')->with('create', 0);
    }
}
