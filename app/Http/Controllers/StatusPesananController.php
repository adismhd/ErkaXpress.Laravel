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

        $pesanan = Pesanan::where('NoPesanan', $request->NoPesanan)->first();
        $pengirim = DataPengirim::where('NoPesanan', $request->NoPesanan)->first();
        $penerima = DataPenerima::where('NoPesanan', $request->NoPesanan)->first();
        $barang = DataBarang::where('NoPesanan', $request->NoPesanan)->first();
        $status = StatusPesanan::where('NoPesanan', $request->NoPesanan)->orderBy('created_at', 'DESC')->first();
        $statuList = StatusPesanan::where('NoPesanan', $request->NoPesanan)->orderBy('created_at', 'DESC')->get();

        //dd($pesanan);
        return view('detailPesanan', [
            "title" => "Detail Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "status" => $status,
            "statuList" => $statuList
        ]);
    }
    
}
