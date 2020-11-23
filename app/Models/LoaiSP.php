<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSP extends Model
{
    use HasFactory;
    protected $table='loaisp';
    protected $primaryKey='Id_LoaiSP';
    protected $fillable = [
        'Ten_LoaiSP',
        'ThuTu',
        'AnHien',    
    ];
}
