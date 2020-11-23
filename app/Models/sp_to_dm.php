<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sp_to_dm extends Model
{
    use HasFactory;
    protected $table='sp_to_dm';
    protected $fillable = [
        'Id_SP',
        'Id_DM',
    ];
}
