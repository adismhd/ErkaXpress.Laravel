<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\DataBarang;
use App\Models\DataPenerima;
use App\Models\DataPengirim;
use App\Models\StatusPesanan;
use App\Models\Xproduk;
use App\Models\Xpropinsi;
use App\Models\Xstatus;
use App\Mail\kirimemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DateTime;
use Session;

class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::orderBy('created_at', 'DESC')->get();
        //$status = StatusPesanan::where('NoPesanan', $pesanan->NoPesanan)->orderBy('created_at', 'DESC')->first();
        
        //dd($pesanan->toArray());
        return view('adminIndexPesanan', [
            "title" => "Pesanan",
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
        $propinsiPenerima = Xpropinsi::where('Code', $penerima->Propinsi)->first();
        $propinsiPengirim = Xpropinsi::where('Code', $pengirim->Propinsi)->first();
        $paramStatus = Xstatus::All();

        //dd($propinsiPenerima);
        return view('detailPesanan', [
            "title" => "Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "status" => $status,
            "statuList" => $statuList,
            "propinsiPenerima" => $propinsiPenerima,
            "propinsiPengirim" => $propinsiPengirim,
            "paramStatus" => $paramStatus
        ]);
    }
    
    public function GetParamPesanan(){
        $param = Xproduk::All();
        $paramPropinsi = Xpropinsi::All();
        
        //dd($param);            
        return view('buatPesanan', [
            "title" => "Buat Pesanan",
            "param" => $param,
            "paramPropinsi" => $paramPropinsi
        ]);
    }
    
    public function InsertData(Request $request){
        $ldate = date('YmdHis');
        $noPesanan = "EXPR" . $ldate;
        $createAt = new DateTime();
        $param = Xproduk::All();
        $paramPropinsi = Xpropinsi::All();

        //dd($request);
        $Asuransis = "1";
        $Packings = "1";
        if($request->Asuransi != "1")
        {
            $Asuransis = "0";
        }
        if($request->Packings != "1")
        {
            $Packings = "0";
        }

        $pesanan = Pesanan::create([
            'NoPesanan' => $noPesanan,
            'Layanan' => $request->Layanan,
            'Asuransi' => $Asuransis,
            'Packing' => $Packings,
            'TanggalPenjemputan' => $request->TanggalPenjemputan
        ]);

        $pengirim = DataPengirim::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->PengirimNama,
            'Alamat' => $request->PengirimAlamat,
            'Propinsi' => $request->PropinsiPengirim,
            'Email' => $request->PengirimEmail,
            'NoTelepon' => $request->PengirimNoTelepon
        ]);

        $penerima = DataPenerima::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->PenerimaNama,
            'Propinsi' => $request->PropinsiPengirim,
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

        $pesanEmail = "<b>Hai ".$request->PengirimNama.",</b>";
        $pesanEmail .= "<p>Pesanan dengan No.Resi : <b style='color:red'>".$noPesanan."</b> telah dibuat.</p><p> Mohon tunggu kami hubungi untuk melakukan pengiriman barang.</p>";
        $data_email = [
            'subject'=>'Pesanan Erkaxpres',
            'sender_name'=>'sender_name@gmail.com',
            'isi'=>$pesanEmail
        ];
        Mail::to($request->PengirimEmail)->send(new kirimemail($data_email));

        return view('buatPesanan', [
            "title" => "Buat Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "status" => $status,
            "param" => $param,
            "paramPropinsi" => $paramPropinsi
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
    
    public function home(){
        $pesanan = Pesanan::orderBy('created_at', 'DESC')->get();
        $pesananCount = $pesanan->count();

        $pesananDibuat = StatusPesanan::where('Status', 'Pesanan Dibuat')->get();
        $pesananDibuatCount = $pesananDibuat->count();

        $pesananDiproses = StatusPesanan::where('Status', 'Sedang Diproses')->get();
        $pesananDiprosesCount = $pesananDiproses->count();

        $pesananSelesai = StatusPesanan::where('Status', 'Pesanan Selesai Dikirim')->get();
        $pesananSelesaiCount = $pesananSelesai->count();
        //$status = StatusPesanan::where('NoPesanan', $pesanan->NoPesanan)->orderBy('created_at', 'DESC')->first();
        
        //dd($pesanan->toArray());
        return view('adminHome', [
            "title" => "Beranda",
            "totalPesanan" => $pesananCount,
            "totalDibuat" => $pesananDibuatCount,
            "totalDiproses" => $pesananDiprosesCount,
            "totalSelesai" => $pesananSelesaiCount
            //"status" => $status
        ]);
    }
}
