<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;
use Carbon\Carbon;

class UserController extends Controller
{
    public function Login(Request $request){
        $user = User::where('email', $request->Email)->first();
        //Hash::check('password', $user->password);

        //dd($request->Password);
        if(!$user){
            return view('Login', [
                "title" => "Home",
                "loginstatus" => "false"
            ]);
        }
        if(!Hash::check($request->Password, $user->password)){
            return view('Login', [
                "title" => "Login",
                "loginstatus" => "false"
            ]);
        }
        else{
            $login = Carbon::now();
            $expired = $login->addDays(1);
            Session::forget('statusLogin');
            Session::flush();
            Session::flash('statusLogin', $expired);

            return view('adminHome', [
                "title" => "Home"
            ]);
        }
    }
}
