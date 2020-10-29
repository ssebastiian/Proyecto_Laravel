<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController Extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index',[
            'users'=> $users
        ]);
    }
    public function store(Request $request)
    {   
        // para validar la informacion del formulario UNIQUE = QUE NO SE REPITA
        $request->validate([
            'name' => 'required',
            'email' => ['required','email','unique:users'],
            'password' =>['required','min:8'],
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password), //bcrypt metodo de laravel para incriptar 
        ]);
        return back();

    }
    public function destroy(User $user)
    {
        $user->delete();

        return back();

    }
}