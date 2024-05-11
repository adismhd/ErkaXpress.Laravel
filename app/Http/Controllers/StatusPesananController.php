<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\DataBarang;
use App\Models\DataPenerima;
use App\Models\DataPengirim;
use App\Models\StatusPesanan;

class StatusPesananController extends Controller
{
   
    public function InsertStatus(Request $request){
        $statusDt = StatusPesanan::create([
            'NoPesanan' => $request->NoPesanan,
            'Status' => $request->Status,
            'Keterangan' => $request->Keterangan,
        ]);

        return redirect('/DetailPesanan/'.$request->NoPesanan);
    }
    
    public function EditStatus(Request $request){
        $pesanan = StatusPesanan::find($request->Id)->update([
            'NoPesanan' => $request->NoPesanan,
            'Status' => $request->Status,
            'Keterangan' => $request->Keterangan,
        ]);

        return redirect('/DetailPesanan/'.$request->NoPesanan);
    }
    
    public function DeleteStatus(Request $request){
        $pesanan = StatusPesanan::find($request->Id)->delete();

        return redirect('/DetailPesanan/'.$request->NoPesanan);
    }
        
    public function CekResi(Request $request){
        $pesanan = Pesanan::where('NoPesanan', $request->id)->first();
        $pengirim = DataPengirim::where('NoPesanan', $request->id)->first();
        $penerima = DataPenerima::where('NoPesanan', $request->id)->first();
        $barang = DataBarang::where('NoPesanan', $request->id)->first();
        $statuList = StatusPesanan::where('NoPesanan', $request->id)->orderBy('created_at', 'DESC')->get();
        $statusResi = "true";

        if($pesanan){
            $statusResi = "false";
        }

        //dd($pesanan);
        return view('index', [
            "title" => "Cek Resi",
            "statusResi" => $statusResi,
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "statuList" => $statuList
        ]);
    }
}
