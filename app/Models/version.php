<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class version extends Model
{
    use HasFactory;

    protected $fillable = [
        'script_name',
        'vr',
        'user_id',
   
    ];
}
