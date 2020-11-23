<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    use HasFactory;
    protected $table='danhgia';
    protected $primaryKey='Id_DG';
    protected $fillable = [
        'Danh_Gia',
        'Id_SP',
        'Id_KH',    
    ];
}
