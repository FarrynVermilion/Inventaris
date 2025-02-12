<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Detil_kembali extends Model
{
    protected $table = 'Detil_kembali';
    protected $primaryKey = 'Kembali_id';
    protected $fillable = [
        'Aset_id',
        'Jml_kembali',
        'Status_kembali',
        'Penerima'
    ];
    public function aset()
    {
        return $this->belongsTo('App\Models\Aset', 'id_aset');
    }
    public function kembali()
    {
        return $this->belongsTo('App\Models\Kembali', 'id_kembali');
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
