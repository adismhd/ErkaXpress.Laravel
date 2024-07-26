<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\DataBarang;
use App\Models\Biaya;
use App\Models\DataPenerima;
use App\Models\DataPengirim;
use App\Models\StatusPesanan;
use App\Models\Xproduk;
use App\Models\Xpropinsi;
use App\Models\Xstatus;
use App\Mail\kirimemail;
use Carbon\Carbon;
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
        return view('adminView/adminIndexPesanan', [
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
        $biaya = Biaya::where('NoPesanan', $id)->first();
        $paramStatus = Xstatus::All();

        //dd($propinsiPenerima);
        return view('adminView/detailPesanan', [
            "title" => "Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "biaya" => $biaya,
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
        return view('publicView/buatPesanan', [
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

        Biaya::create([
            'NoPesanan' => $noPesanan,
            'BiayaPengiriman' => 0,
            'BiayaAdmin' => 0,
            'TotalBiaya' => 0,
            'Status' => "Menunggu Pembayaran",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
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
            'Harga' => 0,
            'Jumlah' => 1,
            'Keterangan' => $request->BarangKeterangan
        ]);

        $status = StatusPesanan::create([
            'NoPesanan' => $noPesanan,
            'Status' => 'Pesanan Dibuat',
            'UpdatedBy' => 'System',
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

        return view('publicView/buatPesanan', [
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
        return view('adminView/adminHome', [
            "title" => "Beranda",
            "totalPesanan" => $pesananCount,
            "totalDibuat" => $pesananDibuatCount,
            "totalDiproses" => $pesananDiprosesCount,
            "totalSelesai" => $pesananSelesaiCount
            //"status" => $status
        ]);
    }
    
    public function GetParamPesananVendor(){
        $param = Xproduk::All();
        $paramPropinsi = Xpropinsi::All();
        
        //dd($param);            
        return view('publicView/pesananVendor', [
            "title" => "Buat Pesanan",
            "param" => $param,
            "paramPropinsi" => $paramPropinsi
        ]);
    }

    public function InsertDataVendor(Request $request){
        $ldate = date('YmdHis');
        $noPesanan = "EXPRV" . $ldate;
        $createAt = new DateTime();
        
        //dd($totalBiayaBarang);
        $pesanan = Pesanan::create([
            'NoPesanan' => $noPesanan,
            'Layanan' => '9001',
            'Asuransi' => 0,
            'Packing' => 0,
            'TanggalPenjemputan' => Carbon::now()
        ]);

        $pengirim = DataPengirim::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->DtNama,
            'Alamat' => $request->DtAlamat,
            'Propinsi' => $request->DtPropinsi,
            'Email' => $request->DtEmail,
            'NoTelepon' => $request->DtNoTelepon
        ]);

        $penerima = DataPenerima::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->DtNama,
            'Alamat' => $request->DtAlamat,
            'Propinsi' => $request->DtPropinsi,
            'NoTelepon' => $request->DtNoTelepon
        ]);
        
        $totalBiayaBarang = 0;

        $dataArray = json_decode($request->Dt, true);
        foreach ($dataArray as $item) {
            $productId = $item['pId'];
            $size = $item['pSize'];
            $variant = $item['pVariant'];
            $color = $item['pWarna'];
            $quantity = $item['pJumlah'];
            $totalPrice = $item['pTotal'];

            $hargaBarang = 130000;
                    
            if($variant == 'Tangan Panjang')
            {
                $hargaBarang += 10000;
            }
    
            if($size == 'XXL' || $request->bSize == 'XXXL')
            {
                $hargaBarang += 10000;
            }

            $totalBiayaBarang += $hargaBarang * $quantity;
            
            $ketBarang = 'Warna : '.$color.', Size : '.$size.', Variant : '.$variant;

            DataBarang::create([
                'NoPesanan' => $noPesanan,
                'Jenis' => 'UMKM',
                'Berat' => 0,
                'Kilo' => 0,
                'Kubik' => 0,
                'Koli' => 0,
                'Harga' => $hargaBarang,
                'Jumlah' => $quantity,
                'Keterangan' => $ketBarang
            ]);
        }
        
        $barang = DataBarang::where('NoPesanan',$noPesanan)->get();

        //dd($totalBiayaBarang);
        $biaya = Biaya::create([
            'NoPesanan' => $noPesanan,
            'BiayaPengiriman' => 0,
            'BiayaAdmin' => 0,
            'TotalBiaya' => $totalBiayaBarang,
            'Status' => "Menunggu Pembayaran",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        
        $status = StatusPesanan::create([
            'NoPesanan' => $noPesanan,
            'Status' => 'Pesanan Dibuat',
            'UpdatedBy' => 'System',
            'Keterangan' => 'Pesanan Dibuat'
        ]);

        if($pesanan){
            Session::flash('status','success');
            Session::flash('message', $noPesanan);
        }

        // $pesanEmail = "<b>Hai ".$request->PengirimNama.",</b>";
        // $pesanEmail .= "<p>Pesanan dengan No.Resi : <b style='color:red'>".$noPesanan."</b> telah dibuat.</p><p> Mohon tunggu kami hubungi untuk melakukan pengiriman barang.</p>";
        // $data_email = [
        //     'subject'=>'Pesanan Erkaxpres',
        //     'sender_name'=>'sender_name@gmail.com',
        //     'isi'=>$pesanEmail
        // ];
        // Mail::to($request->PengirimEmail)->send(new kirimemail($data_email));

        return view('publicView/vendorInvoice', [
            "title" => "Buat Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "biaya" => $biaya,
            "status" => $status
        ]);
        //dd($request);
    }
    
    public function IndexVendor(){
        $pesanan = Pesanan::where('Layanan','9001')->orderBy('created_at', 'DESC')->get();
        //$status = StatusPesanan::where('NoPesanan', $pesanan->NoPesanan)->orderBy('created_at', 'DESC')->first();
        
        //dd($pesanan->toArray());
        return view('adminView/vendorIndexPesanan', [
            "title" => "Pesanan",
            "pesananList" => $pesanan
            //"status" => $status
        ]);
    }
    
    public function SelectVendorById($id){
        $pesanan = Pesanan::where('NoPesanan', $id)->first();
        $pengirim = DataPengirim::where('NoPesanan', $id)->first();
        $penerima = DataPenerima::where('NoPesanan', $id)->first();
        $barang = DataBarang::where('NoPesanan', $id)->get();
        $status = StatusPesanan::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        $statuList = StatusPesanan::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->get();
        $propinsiPenerima = Xpropinsi::where('Code', $penerima->Propinsi)->first();
        $propinsiPengirim = Xpropinsi::where('Code', $pengirim->Propinsi)->first();
        $biaya = Biaya::where('NoPesanan', $id)->first();
        $paramStatus = Xstatus::All();

        //dd($propinsiPenerima);
        return view('adminView/vendorDetailPesanan', [
            "title" => "Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "biaya" => $biaya,
            "status" => $status,
            "statuList" => $statuList,
            "propinsiPenerima" => $propinsiPenerima,
            "propinsiPengirim" => $propinsiPengirim,
            "paramStatus" => $paramStatus
        ]);
    }
    
    public function EditStatusPembayaran(Request $request){
        $pesanan = Biaya::where('NoPesanan',$request->NoPesanan)->update([
            'Status' => $request->Status
        ]);
        //dd($pesanan);
        return back();
    }    

    public function AddItemVendor(Request $request){
        return redirect("test")->with("pesanan", $request->Nama);
        //dd($request);
    }
}
