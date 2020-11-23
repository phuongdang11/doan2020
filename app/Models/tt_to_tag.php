<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tt_to_tag extends Model
{
    use HasFactory;
    protected $table='tt_to_tag';
    protected $fillable = [
        'Id_TT',
        'Id_Tag',
    ];
}
