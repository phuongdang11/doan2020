<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;
    protected $table='sanpham';
    protected $primaryKey='Id_SP';
    protected $fillable = [
        'Ten_SP',
        'MoTa',
        'Gia',
        'Gia_KM',
        'urlHinh1',
        'urlHinh2',
        'urlHinh3',
        'So_luong',
        'ThuTu',
        'AnHien',
        'Id_LoaiSP',
        'Tags',    
    ];
}
