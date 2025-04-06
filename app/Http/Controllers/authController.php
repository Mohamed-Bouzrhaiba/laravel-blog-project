<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function form(){
        return view("auth.register");
    }
    public function register(Request $request){
        $formfields = $request->validate([
            'name'=>'required|min:5',
            'email'=>"required|email|unique:users",
            'password'=>"required|confirmed",
        ]);
        $formfields['password']= Hash::make($request->password);
        User::create($formfields);
        return to_route("login.form")->with("success","profile created .. please login");
    }
    public function loginForm(){
        return view("auth.login");
    }
    public function login(Request $request){
        $email  = $request->email;
        $password =$request->password;
        $credentials = ['email'=>$email,'password'=>$password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return to_route("posts.index")->with("success","logged..!");
        }else{
            return back()->withErrors([
                'email'=> "email or password are incorrect..!",
            ])->onlyInput("email");
        }
    }

    public function logout(){
        session()->flush();
        Auth::logout();

        return to_route("login.form")->with("success","done!");
    }
}
