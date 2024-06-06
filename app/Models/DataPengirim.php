<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengirim extends Model
{
    use HasFactory;

    protected $fillable = [
        'NoPesanan','Nama','Alamat','Propinsi','NoTelepon','Email','created_at','updated_at'
    ];
}
