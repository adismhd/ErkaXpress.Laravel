<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'NoPesanan','Layanan','TanggalPenjemputan','created_at','updated_at'
    ];
    public function Barang()
    {
        return $this->hasOne(DataBarang::class, 'NoPesanan', 'NoPesanan');
    }
    public function Pengirim()
    {
        return $this->hasOne(DataPengirim::class, 'NoPesanan', 'NoPesanan');
    }
    public function Penerima()
    {
        return $this->hasOne(DataPenerima::class, 'NoPesanan', 'NoPesanan');
    }
    public function Status()
    {
        // return $this->hasOne(StatusPesanan::class, 'NoPesanan', 'NoPesanan')->first();
        return $this->hasMany(StatusPesanan::class, 'NoPesanan', 'NoPesanan')->orderBy('created_at');
    }
    protected $table = 'pesanans';
    protected $primarykey = 'id';
    //protected $timestamps = false;
}
