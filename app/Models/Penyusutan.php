<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Penyusutan extends Model
{
    protected $table = 'Penyusutan';
    protected $primaryKey = 'Penyusutan_id';

    protected $fillable = [
        'Tgl_penyusutan',
        'Nilai_penyusutan',
        'Aset_id'
    ];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'Aset_id');
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
