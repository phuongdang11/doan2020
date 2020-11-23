<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $table='binhluan';
    protected $primaryKey='Id_BL';
    protected $fillable = [
        'Noi_Dung',
        // 'Ngay_Dang',
        'ThuTu',
        'AnHien',
        'Id_KH',
        'Id_TT',  
    ];
    public $timestamps = true;
}
