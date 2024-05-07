<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use DateTime;
use Session;

class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();

        //dd($pesanan);
        return view('adminIndex', [
            "title" => "Halaman Admin",
            "pesananList" => $pesanan
        ]);
    }
    
    public function selectById($id){
        $pesanan = Pesanan::where('NoPesanan', $id)->first();

        //dd($pesanan);
        return view('detailPesanan', [
            "title" => "Detail Pesanan",
            "data" => $pesanan
        ]);
    }
    
    public function InsertData(Request $request){
        $ldate = date('YmdHis');
        $noPesanan = "EXPR" . $ldate;
        $createAt = new DateTime();

        $pesanan = Pesanan::create([
            'NoPesanan' => $noPesanan,
            'NamaBarang' => $request->NamaBarang,
            'BeratBarang' => $request->BeratBarang
        ]);

        if($pesanan){
            Session::flash('status','success');
            Session::flash('message', $noPesanan);
        }

        return view('buatPesanan', [
            "title" => "Buat Pesanan",
            "data" => $pesanan
        ]);
        //dd($request);
    }
    
    public function UpdateData(){
        $pesanan = Pesanan::find(23)->update([
            'NamaBarang' => "Laptop",
            'BeratBarang' => 4
        ]);

        //dd($pesanan);
    }
    
    public function DeleteData(){
        $pesanan = Pesanan::find(23)->delete();

        //dd($pesanan);
    }
}
