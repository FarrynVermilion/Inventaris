<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Detil_pinjam extends Model
{
    protected $table = 'Detil_pinjam';
    protected $primaryKey = 'Pinjam_id';
    protected $fillable = [
        'Aset_id',
        'Jml_pinjam',
        'Infaq',
        'Belum_kembali'
    ];
    public function aset()
    {
        return $this->belongsTo('App\Models\Aset', 'id_aset');
    }
    public function pinjam()
    {
        return $this->belongsTo('App\Models\Pinjam', 'id_pinjam');
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
