<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Aset extends Model
{
    protected $table = 'Aset';
    protected $primaryKey = 'Aset_id';
    protected $fillable = [
        'Aset_id',
        'Nama_Aset',
        'Merek_Aset',
        'Tipe',
        'Model',
        'Seri',
        'Harga_beli',
        'Tgl_perolehan',
        'Tgl_akhir_garansi',
        'Spesifikasi',
        'Kondisi_awal',
        'Jml_aset',
        'Stok',
        'Status_aset',
        'COA',
        'Kategori_id',
        'Ruang_id'
    ];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class, 'Ruang_id');
    }

    public function penyusutan()
    {
        return $this->hasMany(Penyusutan::class, 'Aset_id');
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class, 'Aset_id');
    }
    public function penghapusan_aset()
    {
        return $this->hasMany(Penghapusan_aset::class, 'Aset_id');
    }
    protected static function boot()
    {

        parent::boot();

        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = Auth::user()->id;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = Auth::user()->id;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = Auth::user()->id;
            }
        });
    }
}
