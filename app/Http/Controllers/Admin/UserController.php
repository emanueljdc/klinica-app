<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TipoUser;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    protected function create()
    {
        $tipoUsers = TipoUser::all();
        return view('admin.user.create', compact('tipoUsers'));
    }

    protected function store(Request $request)
    {
        //dd($request->all());
        //return 'estou em store';
        //return view('admin.user.create');

        return ModelsUser::create([
            'name'      => $request['name'],
            'email'     => $request['email'],
            'password'  => Hash::make($request['password']),
            'funcao_id' => $request['funcao_id'],
        ]);

    }
}
