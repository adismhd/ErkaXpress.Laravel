<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memo;

class MemoController extends Controller
{
    public function GetData($id){
        //$pesanan = Memo::orderBy('created_at', 'DESC')->get();
        $memo = Memo::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->get();
        
        //dd($memo->toArray());
        return view('adminView/memoPesanan', [
            "title" => "Memo",
            "memoList" => $memo,
            "NoPesanan" => $id
        ]);
    }
    
    public function InsertMemo(Request $request){
        Memo::factory()->create([
            'MemoId' => "101",
            'NoPesanan' => $request-> NoPesanan,
            'JudulMemo' => $request->Judul,
            'IsiMemo' => $request->Isi
        ]);

        //dd($param);  
        return redirect('/MemoPesanan/'.$request->NoPesanan);
    }

    public function EditMemo(Request $request){
        //dd($request);  
        $Status = Memo::find($request->Id)->update([
            'JudulMemo' => $request->Judul,
            'IsiMemo' => $request->Isi
        ]);

        //dd($param);    
        return redirect('/MemoPesanan/'.$request->NoPesanan);
    }

    public function DeleteMemo(Request $request){
        $Status = Memo::find($request->Id)->delete();

        //dd($param);    
        return redirect('/MemoPesanan/'.$request->NoPesanan);
    }
    
}
