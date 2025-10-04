<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaDpr extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'id_anggota';

    protected $fillable = [
        'gelar_depan',
        'nama_depan',
        'nama_belakang',
        'gelar_belakang',
        'jabatan',
        'status_pernikahan',
        // 'jumlah_anak',
    ];
}
