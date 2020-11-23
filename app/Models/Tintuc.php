<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    use HasFactory;
    protected $table='tintuc';
    protected $primaryKey='Id_TT';
    protected $fillable = [
        'Tieu_De',
        'Ngay_Dang',
        'urlHinh',
        'ND_dai',
        'ND_ngan',
        'Mo_Ta',
        'ThuTu',
        'AnHien',
        'Tags',
        'Id_NV',  
    ];
}
