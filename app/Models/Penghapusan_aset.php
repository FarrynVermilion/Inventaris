<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penghapusan_aset extends Model
{
    use HasFactory,SoftDeletes, Prunable;
    public function prunable()
    {
        return static::withTrashed()
        ->whereNotNull("deleted_at");
    }
    protected $table = 'Penghapusan_aset';
    protected $primaryKey = 'penghapusan_id';
    protected $fillable = [
        'Status_penghapusan',
        'Jml_dihapus',
        'Upload_File',
        'Upload_Foto',
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
        // creating deleted_by when model is deleted
        static::deleting(function ($model) {
            if (!$model->isDirty('deleted_by')) {
                $model->deleted_by = Auth::user()->id;
            }
        });
    }
}
