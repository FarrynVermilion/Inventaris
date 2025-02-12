<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Peminjam extends Model
{
    protected $table = 'Peminjam';
    protected $primaryKey = 'Peminjam_id';
    protected $fillable = [
        'Nama_peminjam',
        'No_HP',
    ];
    public function pinjam()
    {
        return $this->hasMany('App\Models\Pinjam', 'id_peminjam');
    }
    public function kembali()
    {
        return $this->hasMany('App\Models\Kembali', 'id_peminjam');
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
