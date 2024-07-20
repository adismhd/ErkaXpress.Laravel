<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ekspedisi;
use App\Models\Biaya;
use Carbon\Carbon;
use Illuminate\Support\Str;

class EkspedisiBiayaController extends Controller
{
    public function GetData($id){
        //$pesanan = Memo::orderBy('created_at', 'DESC')->get();
        $ekspedisi = Ekspedisi::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        $biaya = Biaya::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        
        if($ekspedisi == null)
        {
            Ekspedisi::create([
                'NoPesanan' => $id,
                'Ekspedisi' => "",
                'LinkEkspedisi' => "",
                'NoResi' => "",
                'NoTelepon' => "",
                'Keterangan' => "",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            
            $ekspedisi = Ekspedisi::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        }

        if($biaya == null)
        {
            Biaya::create([
                'NoPesanan' => $id,
                'BiayaPengiriman' => 0,
                'BiayaAdmin' => 0,
                'TotalBiaya' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            
            $biaya = Biaya::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        }

        //dd($pesanan->toArray());
        return view('adminView/ekspedisiBiaya', [
            "NoPesanan" => $id,
            "title" => "Ekspedisi & Biaya",
            "ekspedisi" => $ekspedisi,
            "biaya" => $biaya
        ]);
    }
    
    public function InsertEkspedisi(Request $request){
        //dd($request);  
        $Status = Ekspedisi::find($request->Id)->update([
            'Ekspedisi' => $request->Ekspedisi,
            'LinkEkspedisi' => $request->LinkEkspedisi,
            'NoResi' => $request->NoResi,
            'NoTelepon' => $request->NoTelepon,
            'Keterangan' => $request->Keterangan,
            'updated_at' => Carbon::now()
        ]);

        //dd($param);    
        return redirect('/EkspedisiBiaya/'.$request->NoPesanan);
    }

    public function InsertBiaya(Request $request){
        //dd($request);  
        $BiayaPengiriman = Str::replace('.', "", $request->BiayaPengiriman);
        $BiayaAdmin = Str::replace('.', "", $request->BiayaAdmin);
        $TotalBiaya = Str::replace('.', "", $request->TotalBiaya);

        if($TotalBiaya == 'NaN'){ return redirect('/EkspedisiBiaya/'.$request->NoPesanan);}
        if($BiayaPengiriman == 'NaN'){ return redirect('/EkspedisiBiaya/'.$request->NoPesanan);}
        if($BiayaAdmin == 'NaN'){ return redirect('/EkspedisiBiaya/'.$request->NoPesanan);}

        $Status = Biaya::find($request->Id)->update([
            'BiayaPengiriman' =>  $BiayaPengiriman,
            'BiayaAdmin' =>  $BiayaAdmin,
            'TotalBiaya' =>  $TotalBiaya,
            'updated_at' => Carbon::now()
        ]);

        //dd($param);    
        return redirect('/EkspedisiBiaya/'.$request->NoPesanan);
    }
}
