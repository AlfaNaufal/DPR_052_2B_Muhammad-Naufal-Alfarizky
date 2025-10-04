<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenGaji extends Model
{
    use HasFactory;
      
    
    protected $table = 'komponen_gaji';
    protected $primaryKey = 'id_komponen_gaji';

    protected $fillable = [
        'nama_komponen',
        'kategori',
        'jabatan',
        'nominal',
        'satuan',
    ];

    // mendefinisikan Relasi Many-to-many antara anggota dan komponen gaji
    public function AnggotaDpr(){
        return $this->belongsToMany(
            AnggotaDpr::class,
            'penggajian',
            'id_komponen_gaji',
            'id_anggota'
        );
    }
}
