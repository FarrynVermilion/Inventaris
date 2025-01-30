<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyusutan extends Model
{
    protected $table = 'Penyusutan';
    protected $primaryKey = 'Penyusutan_id';
    public $timestamps = false;
    protected $fillable = [
        'Tgl_penyusutan',
        'Nilai_penyusutan',
        'Aset_id'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'Aset_id');
    }
}
