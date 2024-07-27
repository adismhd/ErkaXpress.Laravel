<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xkelurahan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Code',
        'Nama',
        'IsActive',
    ];
}
