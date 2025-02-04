<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penggunaan extends Model
{
    protected $table = 'Penggunaan';
    protected $primaryKey = 'Penggunaan_id';
    public $timestamps = false;
    protected $fillable = [
        'Aset_id',
        'Untuk',
        'Jumlah'
    ];
}
