<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view("auth.register");
    }
    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect("/dashboard");
    }

    public function loginForm(){
        return view("auth.login");
    }
    public function login(Request $request)
    {
        if (Auth::attempt(["email"=>$request->email,"password"=>$request->password]))
        {
            return redirect('/worker');
        } else {
            return back()->with("unsuccessfully");
        }
    }
}
