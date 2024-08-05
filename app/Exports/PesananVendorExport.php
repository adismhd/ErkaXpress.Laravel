<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Pesanan;

class PesananVendorExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = Pesanan::select('pesanans.NoPesanan', 'pesanans.created_at'
            ,'data_penerimas.Nama AS NamaPenerima','data_penerimas.Alamat AS AlamatPenerima','data_penerimas.NoTelepon AS NoTeleponPenerima'
            ,'data_pengirims.Nama','data_pengirims.Alamat','data_pengirims.NoTelepon'
            ,'data_barangs.Jenis','data_barangs.Keterangan'
            ,'biayas.BiayaPengiriman','biayas.TotalBiaya')
            ->join('data_penerimas', 'data_penerimas.NoPesanan', '=', 'pesanans.NoPesanan')
            ->join('data_pengirims', 'data_pengirims.NoPesanan', '=', 'pesanans.NoPesanan')
            ->join('data_barangs', 'data_barangs.NoPesanan', '=', 'pesanans.NoPesanan')
            ->join('biayas', 'biayas.NoPesanan', '=', 'pesanans.NoPesanan')
            ->where('pesanans.Layanan', '9001')
            ->get();
        //$pesanan = Pesanan::all();
        return $data;
    }
    
    public function headings(): array
    {
        return [
            'No Pesanan',
            'Tanggal Order',
            'Pengirim',
            'Alamat Pengirim',
            'No.Tlpn Pengirim',
            'Penerima',
            'Alamat Penerima',
            'No.Tlpn Penerima',
            'Jenis Barang',
            'Keterangan',
            'Biaya Pengiriman',
            'Total Biaya'
        ];
    }
}
