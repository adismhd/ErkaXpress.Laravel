<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'NoPesanan','NamaBarang','BeratBarang','CreateAt','UpdateAt'
    ];
    
    protected $table = 'pesanans';
    protected $primarykey = 'id';
    //protected $timestamps = false;
}
