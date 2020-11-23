<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $primaryKey='Id_HD';
    protected $fillable = [
        'Ten_SP',
        'Ngay_Dang',
        'So_Luong',
        'Tong_Tien',
        'AnHien',
        'ThuTu',
        'Ten_KH',
        'DienThoai',
        'DiaChi',
        'Quan',
        'Phuong',
        'PT_TT',
        'Id_KH',   
    ];
}
