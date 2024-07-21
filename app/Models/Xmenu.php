<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xmenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'Name','Description','Class','MenuOrder','Link','Icon','MenuModule','ParentId','IsActive','created_at','updated_at'
    ];
}
