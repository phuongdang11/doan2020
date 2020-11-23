<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GioHang extends Model
{
    use HasFactory;
    protected $table = 'giohang';
    protected $primaryKey='Id_GH';
    protected $fillable = [
        'Ten_SP',
        'So_Luong',
        'AnHien',
        'ThuTu',
        'Id_SP',
        'Id_KH',   
    ];
}
