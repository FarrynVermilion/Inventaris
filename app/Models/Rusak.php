<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rusak extends Model
{
    protected $table = 'Rusak';
    protected $primaryKey = 'Rusak_id';
    public $timestamps = false;
    protected $fillable = [
        'Aset_id',
        'Kerusakan',
        'Penanggung_jawab',
        'Jumlah'
    ];
}
