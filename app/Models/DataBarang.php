<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'NoPesanan','Jenis','Berat','Kilo','Kubik','Koli','Harga','Keterangan','created_at','updated_at'
    ];

    public function pesanan()
    {
        return $this->hasOne(Pesanan::class, 'NoPesanan', 'NoPesanan');
    }
}
