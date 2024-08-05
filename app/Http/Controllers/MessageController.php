<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Session;

class MessageController extends Controller
{
    public function CreateMessage(Request $request){
        $message = Message::create([
            'Nama' => $request->name,
            'Email' => $request->email,
            'Subject' => $request->subject,
            'Message' => $request->message
        ]);

        return view('index', [
            "title" => "Buat Pesanan",
            "message" => "true"
        ]);
        //dd($request);
    }
    
    public function GetMessage(){
        $levelUser = Session::get('UserLevel');
        if ($levelUser != 'admin' && $levelUser != 'superadmin' )
        {
            return redirect('HomeAdmin');
        }

        $message = Message::orderBy('created_at', 'DESC')->get();

        return view('adminView/messageList', [
            "title" => "Message List",
            "messageList" => $message,
            "message" => "true"
        ]);
        //dd($request);
    }
}
