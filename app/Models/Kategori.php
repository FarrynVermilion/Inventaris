<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'Kategori';
    protected $primaryKey = 'Kategori_id';
    protected $fillable = [
        'Nama_kategori'
    ];

    public function aset()
    {
        return $this->hasMany(Aset::class, 'Kategori_id');
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
