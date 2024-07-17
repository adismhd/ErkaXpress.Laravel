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
            // Session::forget('statusLogin');
            // Session::flush();
            //Session::flash('statusLogin', $expired);
            session(['LoginExpired' => $expired]);

            return redirect('/HomeAdmin');
        }
    }

    public function Logout(){
        session()->forget(['LoginExpired']); 
        session()->flush();

        return redirect('/login');
    }

    public function GetListAdmin(){
        $user = User::where('class', "admin")->orderBy('created_at', 'DESC')->get();

        return view('adminList', [
            "title" => "Admin List",
            "adminList" => $user
        ]);
    }
    
    public function TambahUser(Request $request){
        User::factory()->create([
            'name' => $request->namaUser,
            'email' => $request->emailUser,
            'password' => $request->passwordUser,
            'class' => "admin"
        ]);

        return redirect('/Admin');
    }
    
    public function EditUser(Request $request){
        $user = User::find($request->Id)->update([
            'name' => $request->namaUserEdit,
            'email' => $request->emailUserEdit,
            'password' => $request->passwordUserEdit
        ]);

        return redirect('/Admin');
    }
}
