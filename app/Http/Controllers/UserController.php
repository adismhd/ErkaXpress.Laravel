<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function Login(Request $request){
        $user = User::where('email', $request->Email)->where('password', $request->Password)->first();
        
        //dd($pesanan);
        if($user){
            return view('HomeAdmin', [
                "title" => "Home",
                "pesanan" => $user
            ]);
        }
        else{
            return view('Login', [
                "title" => "Login",
                "pesanan" => $user
            ]);
        }
    }
}
