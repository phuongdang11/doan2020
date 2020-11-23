<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = FALSE;
    use HasFactory;
    protected $table='tags';
    protected $primaryKey='Id_Tag';
    protected $fillable = [
        'Ten_Tag',
    ];
}
