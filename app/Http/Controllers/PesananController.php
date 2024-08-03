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
use App\Models\OngkosKirim;
use App\Models\Dokumen;
use App\Mail\kirimemail;
use App\Exports\PesananExport;
use Maatwebsite\Excel\Facades\Excel;
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
        $barang = DataBarang::where('NoPesanan', $id)->get();
        $status = StatusPesanan::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->first();
        $statuList = StatusPesanan::where('NoPesanan', $id)->orderBy('created_at', 'DESC')->get();
        $propinsiPenerima = Xpropinsi::where('Code', $penerima->Propinsi)->first();
        $propinsiPengirim = Xpropinsi::where('Code', $pengirim->Propinsi)->first();
        $biaya = Biaya::where('NoPesanan', $id)->first();
        $paramStatus = Xstatus::All();
        $isCancle = true;
        $dokumenPembayaran = Dokumen::where('NoPesanan', $id)->first();
        $base64Encoded = "null";
        if ($dokumenPembayaran != null)
        {
            $base64Encoded = base64_encode($dokumenPembayaran->Blob);
        }
        
        $statusCount = StatusPesanan::where('NoPesanan', $id)->count();
        //dd($statusCount);
        if ($statusCount > 1){
            $isCancle = false;
        }

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
            "paramStatus" => $paramStatus,
            "isCancle" => $isCancle,
            "dokumenPembayaran" => $base64Encoded
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
        if($request->Packing != "1")
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
            'Propinsi' => $request->PropinsiPenerima,
            'Kabupaten' => $request->KabupatenPenerima,
            'Kecamatan' => $request->KecamatanPenerima,
            'Kelurahan' => $request->KelurahanPenerima,
            'KodePos' => $request->KodePos,
            'Alamat' => $request->PenerimaAlamat,
            'NoTelepon' => $request->PenerimaNoTelepon
        ]);

        $ongkir = OngkosKirim::where('PropinsiId',$request->PropinsiPenerima)
            ->where('ProdukId',$request->Layanan)->first();

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
    
    public function DeleteDataPesanan($id){
        Pesanan::where('NoPesanan',$id)->delete();
        DataPengirim::where('NoPesanan',$id)->delete();
        DataPenerima::where('NoPesanan',$id)->delete();
        Biaya::where('NoPesanan',$id)->delete();
        DataBarang::where('NoPesanan',$id)->delete();
        StatusPesanan::where('NoPesanan',$id)->delete();

        //dd($pesanan);
        return redirect("IndexPesanan");
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
        Session::forget('message');
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
            'Nama' => "PT. Sahitya Poetra Grup",
            'Alamat' => "Jl. Cemara B, No. 1B",
            'Propinsi' => "",
            'Kabupaten' => "",
            'Kecamatan' => "",
            'Kelurahan' => "",
            'KodePos' => "",
            'Email' => "sahityapoetragrup@gmail.com",
            'NoTelepon' => "087795417676 "
        ]);

        $penerima = DataPenerima::create([
            'NoPesanan' => $noPesanan,
            'Nama' => $request->DtNama,
            'Alamat' => $request->DtAlamat,
            'Propinsi' => $request->DtPropinsi,
            'Kabupaten' => $request->DtKabupaten,
            'Kecamatan' => $request->DtKecamatan,
            'Kelurahan' => $request->DtKelurahan,
            'KodePos' => $request->DtKodepos,
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
    
            if($size == 'XXL' || $size == 'XXXL')
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
        
        $ongkir = OngkosKirim::where('PropinsiId',$request->DtPropinsi)
            ->where('ProdukId','1002')->first();

        $subTotal = $totalBiayaBarang;
        $totalBiayaBarang += $ongkir->Harga;

        //dd($totalBiayaBarang);
        $biaya = Biaya::create([
            'NoPesanan' => $noPesanan,
            'BiayaPengiriman' => $ongkir->Harga,
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

        return redirect('InvoicePesanan/'.$noPesanan);
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
        $dokumenPembayaran = Dokumen::where('NoPesanan', $id)->first();
        $base64Encoded = "null";
        if ($dokumenPembayaran != null)
        {
            $base64Encoded = base64_encode($dokumenPembayaran->Blob);
        }

        $isCancle = true;
        $statusCount = StatusPesanan::where('NoPesanan', $id)->count();
        //dd($statusCount);
        if ($statusCount > 1){
            $isCancle = false;
        }

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
            "paramStatus" => $paramStatus,
            "isCancle" => $isCancle,
            "dokumenPembayaran" => $base64Encoded
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
    
    public function GetInvoice($id){
        $pesanan = Pesanan::where("NoPesanan", $id)->first();
        $pengirim = DataPengirim::where("NoPesanan", $id)->first();
        $penerima = DataPenerima::where("NoPesanan", $id)->first();
        $barang = DataBarang::where("NoPesanan", $id)->get();
        $biaya = Biaya::where("NoPesanan", $id)->first();
        //dd($penerima);
        $ongkir = OngkosKirim::where("PropinsiId", $penerima->Propinsi)
            ->where('ProdukId','1002')->first();
        $status = StatusPesanan::where("NoPesanan", $id)->first();
        $subTotal = $biaya->TotalBiaya - $ongkir->Harga;

        return view('publicView/vendorInvoice', [
            "title" => "Buat Pesanan",
            "pesanan" => $pesanan,
            "pengirim" => $pengirim,
            "penerima" => $penerima,
            "barang" => $barang,
            "biaya" => $biaya,
            "subBiaya" => $subTotal,
            "ongkir" => $ongkir->Harga,
            "status" => $status
        ]);
    }

    public function UploadDokumen(Request $request){
        // $noAplikasi = $request->noAplikasi;
        // $imageBase64 = $request->base64;
        $noAplikasi = $request->get("noAplikasi");
        $imageBase64 = $request->get("base64");
        $str_decode = base64_decode($imageBase64);

        //print_r($noAplikasi); 
        //dd($request);
        $dokumenCount = Dokumen::where('NoPesanan', $noAplikasi)->count();

        if ($dokumenCount == 0){                
            Dokumen::create([
                'NoPesanan' => $noAplikasi,
                'KodeDokumen' => "1001",
                'Blob' => $imageBase64,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);            
        }
        //dd($request);
        return back()->with("messagePembayaran", "Password Lama Tidak Sesuai!");;
    }
    
    public function DeleteDataPesananVendor($id){
        Pesanan::where('NoPesanan',$id)->delete();
        DataPengirim::where('NoPesanan',$id)->delete();
        DataPenerima::where('NoPesanan',$id)->delete();
        Biaya::where('NoPesanan',$id)->delete();
        DataBarang::where('NoPesanan',$id)->delete();
        StatusPesanan::where('NoPesanan',$id)->delete();

        //dd($pesanan);
        return redirect("IndexPesananVendor");
    }
    
    public function ExportExcel(){
        return Excel::download(new PesananExport, 'users.xlsx');
    }
}
