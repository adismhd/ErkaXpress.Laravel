<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xproduk;
use App\Models\Xpropinsi;
use App\Models\Xstatus;

class XParameterController extends Controller
{
    public function GetParamList(){
        $paramProduk = Xproduk::All();
        $paramPropinsi = Xpropinsi::All();
        $paramStatus = Xstatus::All();
        
        //dd($param);            
        return view('parameterList', [
            "title" => "Parameter List",
            "paramProduk" => $paramProduk,
            "paramStatus" => $paramStatus,
            "paramPropinsi" => $paramPropinsi
        ]);
    }

    public function TambahParamProduk(Request $request){
        Xproduk::factory()->create([
            'Code' => $request->codeProduk,
            'Nama' => $request->namaProduk,
            'IsActive' => '1'
        ]);

        //dd($param);  
        return redirect('/Parameter');
    }

    public function EditParamProduk(Request $request){
        $produk = Xproduk::find($request->Id)->update([
            'Nama' => $request->namaEditProduk
        ]);

        //dd($param);    
        return redirect('/Parameter');
    }

    public function DeleteParamProduk(Request $request){
        $produk = Xproduk::find($request->Id)->delete();

        //dd($param);    
        return redirect('/Parameter');
    }
    
    public function TambahParamStatus(Request $request){
        Xstatus::factory()->create([
            'Code' => $request->namaStatus,
            'Nama' => $request->namaStatus,
            'IsActive' => '1'
        ]);

        //dd($param);  
        return redirect('/Parameter');
    }

    public function EditParamStatus(Request $request){
        //dd($request);  
        $Status = Xstatus::find($request->Id)->update([
            'Code' => $request->namaEditStatus,
            'Nama' => $request->namaEditStatus
        ]);

        //dd($param);    
        return redirect('/Parameter');
    }

    public function DeleteParamStatus(Request $request){
        $Status = Xstatus::find($request->Id)->delete();

        //dd($param);    
        return redirect('/Parameter');
    }
    
    public function TambahParamPropinsi(Request $request){
        Xpropinsi::factory()->create([
            'Code' => $request->codePropinsi,
            'Nama' => $request->namaPropinsi,
            'IsActive' => '1'
        ]);

        //dd($param);  
        return redirect('/Parameter');
    }

    public function EditParamPropinsi(Request $request){
        $Propinsi = Xpropinsi::find($request->IdPropinsi)->update([
            'Nama' => $request->namaEditPropinsi
        ]);

        //dd($param);    
        return redirect('/Parameter');
    }

    public function DeleteParamPropinsi(Request $request){
        $Propinsi = Xpropinsi::find($request->Id)->delete();

        //dd($param);    
        return redirect('/Parameter');
    }
}
