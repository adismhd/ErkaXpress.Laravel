<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;
    protected $fillable = [
        'NoPesanan','BiayaPengiriman','BiayaAdmin','NoResi','TotalBiaya','Status','created_at','updated_at'
    ];
}
