<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;
    protected $table = 'nhanvien';
    protected $primaryKey='Id_NV';
    protected $fillable = [
        'Ten_NV',
        'email',
        'DienThoai',
        'password',
        'Gioi_Tinh',  
    ];
}
