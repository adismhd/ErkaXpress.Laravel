<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'NoPesanan','Ekspedisi','LinkEkspedisi','NoResi','NoTelepon','Keterangan','created_at','updated_at'
    ];
}
