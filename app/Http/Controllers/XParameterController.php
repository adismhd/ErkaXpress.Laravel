<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xproduk;
use App\Models\Xpropinsi;
use App\Models\Xstatus;
use App\Models\Xkabupaten;
use App\Models\Xkecamatan;
use App\Models\Xkelurahan;
use App\Models\Xwilayah;

class XParameterController extends Controller
{
    public function GetParamList(){
        $paramProduk = Xproduk::All();
        $paramPropinsi = Xpropinsi::All();
        $paramStatus = Xstatus::All();
        
        //dd($param);            
        return view('adminView/parameterList', [
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
            'Harga' => 0,
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
    
    public function GetParamKabupaten($id){
        //$propinsiValue = $request->input('propinsi');
        $paramKabupaten = Xkabupaten::where('Code','LIKE',$id."%")->get();
        //dd($param);       
        //return Response()->json($paramKabupaten);
        return Response()->json($paramKabupaten);
    }

    public function GetParamKecamatan($id){
        //$propinsiValue = $request->input('propinsi');
        $paramKecamatan = Xkecamatan::where('KabupatenId',$id)->get();
        //dd($param);       
        //return Response()->json($paramKabupaten);
        return Response()->json($paramKecamatan);
    }
    
    public function GetParamKelurahan($id){
        //$propinsiValue = $request->input('propinsi');
        $paramKelurahan = Xkelurahan::where('KecamatanId',$id)->get();
        //dd($param);       
        //return Response()->json($paramKabupaten);
        return Response()->json($paramKelurahan);
    }
    
    public function GetParamKodePos($id){
        //$propinsiValue = $request->input('propinsi');
        $paramKodepos = Xwilayah::where('KelurahanId',$id)->get();

        //dd($param);       
        //return Response()->json($paramKabupaten);
        return Response()->json($paramKodepos);
    }
}
