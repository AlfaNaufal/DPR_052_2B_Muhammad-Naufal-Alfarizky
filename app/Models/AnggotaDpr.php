<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    // mendefinisikan Relasi Many-to-many antara anggota dan komponen gaji 
    public function komponenGaji(){
        return $this->belongsToMany(
            KomponenGaji::class,
            'penggajian',
            'id_anggota',
            'id_komponen_gaji'
        );
    }

    // Membuat kolom atribut (kolom virtual) untuk menampilkan nominal takeHomePay (Gaji)
    protected function takeHomePay(): Attribute
    {
        return Attribute::make(
            get: function () {
                $takeHomePay = 0;
                
                $takeHomePay += $this->komponenGaji()->where('satuan', 'Bulan')->sum('nominal');

                $tunjanganIstri = KomponenGaji::where('nama_komponen', 'Tunjangan Istri/Suami')->first();
                if ($this->status_pernikahan == 'Kawin' && $tunjanganIstri) {
                    $takeHomePay += $tunjanganIstri->nominal;
                }

                $tunjanganAnak = KomponenGaji::where('nama_komponen', 'Tunjangan Anak')->first();
                if ($this->jumlah_anak > 0 && $tunjanganAnak) {
                    $jumlahAnakDihitung = min($this->jumlah_anak, 2);
                    $takeHomePay += ($jumlahAnakDihitung * $tunjanganAnak->nominal);
                }

                return $takeHomePay;
            }
        );
    }
}
