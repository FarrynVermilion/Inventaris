<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detil_kembali extends Model
{
    protected $table = 'Detil_kembali';
    protected $primaryKey = 'Kembali_id';
    protected $fillable = [
        'Aset_id',
        'Jml_kembali',
        'Status_kembali',
    ];
    public $timestamps = false;
    public function aset()
    {
        return $this->belongsTo('App\Models\Aset', 'id_aset');
    }
    public function kembali()
    {
        return $this->belongsTo('App\Models\Kembali', 'id_kembali');
    }
}
