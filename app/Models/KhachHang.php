<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $primaryKey='Id_KH';
    protected $fillable = [
        'Ten_KH',
        'email',
        'DienThoai',
        'password',
        'DiaChi',
        'Gioi_Tinh',
        'Quan',
        'Phuong',    
    ];
}
