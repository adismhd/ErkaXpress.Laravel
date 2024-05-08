<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'NoPesanan','Status','Keterangan','created_at','updated_at'
    ];
    
}
