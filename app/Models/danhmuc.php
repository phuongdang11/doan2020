<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    use HasFactory;
    protected $table='danhmuc';
    protected $primaryKey='Id_DM';
    protected $fillable = [
        'Ten_DM',
        'ThuTu',
        'AnHien',    
    ];
}
