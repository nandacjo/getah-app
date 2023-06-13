<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Getah extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'uraian',
        'nama_penyadap',
        'petak',
        'luas',
        'jml_pohon',
        'target',
        'realisasi',
        'foto_keterangan',
        'nama_lokasi',
        'longitude',
        'latitude',
    ];

    // function boot
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->created_at = now();
        });
        self::updating(function ($model) {
            $model->updated_at = now();
        });
    }
}
