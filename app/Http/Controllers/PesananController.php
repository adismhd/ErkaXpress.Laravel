<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\DataBarang;
use App\Models\DataPenerima;
use App\Models\DataPengirim;
use App\Models\StatusPesanan;
use Illuminate\Http\Request;
use DateTime;
use Session;

class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();
        //$status = StatusPesanan::where('NoPesanan', $pesanan->NoPesanan)->orderBy('created_at', 'DESC')->first();
        
        //dd($pesanan->toArray());
        return view('adminIndex', [
            "title" => "Halaman Admin",
            "pesananList" => $pesanan
            //"status" => $status
        ]);
    }
    
    public function selectById($id){
        $pesanan = Pesanan::where('NoPesanan', $id)->first();
        $pengirim = DataPengirim::where('NoPesanan', $id)->first();
        $penerima = DataPenerima::where('NoPesanan', $id)->first();
        $barang = DataBarang::where('NoPesanan', $id)->first();
        $status = StatusPesanan::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        $statuList = StatusPesanan::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->get();

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
    
    public function InsertData(Request $request){
        $ldate = date('YmdHis');
        $noPesanan = "EXPR" . $ldate;
        $createAt = new DateTime();

        $pesanan = Pesanan::create([
            'NoPesanan' => $noPesanan,
            'Layanan' => $request->Layanan,
            'TanggalPenjemputan' => $request->TanggalPenjemputan
        ]);

        $pengirim = DataPengirim::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->PengirimNama,
            'Alamat' => $request->PengirimAlamat,
            'Email' => $request->PengirimEmail,
            'NoTelepon' => $request->PengirimNoTelepon
        ]);

        $penerima = DataPenerima::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->PenerimaNama,
            'Alamat' => $request->PenerimaAlamat,
            'NoTelepon' => $request->PenerimaNoTelepon
        ]);

        $kilo = 0;
        if($request->BarangKilo != null)
        {
            $kilo = $request->BarangKilo;
        }

        $Koli = 0;
        if($request->BarangKoli != null)
        {
            $Koli = $request->BarangKoli;
        }
        
        $kubik = 0;
        if($request->BarangKubik != null)
        {
            $kubik = $request->BarangKubik;
        }

        $barang = DataBarang::create([
            'NoPesanan' => $noPesanan,
            'Jenis' => $request->BarangJenis,
            'Berat' => $request->BarangBerat,
            'Kilo' => $kilo,
            'Kubik' => $kubik,
            'Koli' => $Koli,
            'Keterangan' => $request->BarangKeterangan
        ]);

        $status = StatusPesanan::create([
            'NoPesanan' => $noPesanan,
            'Status' => 'Pesanan Dibuat',
            'Keterangan' => 'Pesanan Dibuat'
        ]);

        if($pesanan){
            Session::flash('status','success');
            Session::flash('message', $noPesanan);
        }

        return view('buatPesanan', [
            "title" => "Buat Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "status" => $status
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
