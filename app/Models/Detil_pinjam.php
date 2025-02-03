<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detil_pinjam extends Model
{
    protected $table = 'Detil_pinjam';
    protected $primaryKey = 'Pinjam_id ';
    protected $fillable = [
        'Aset_id',
        'Jml_pinjam',
        'Infaq'
    ];
    public $timestamps = false;
    public function aset()
    {
        return $this->belongsTo('App\Models\Aset', 'id_aset');
    }
    public function pinjam()
    {
        return $this->belongsTo('App\Models\Pinjam', 'id_pinjam');
    }
}
