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
        'jumlah_anak',
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

    // membuat accessor (kolom atribut virtual) untuk mengambil semua komponen gaji
    protected function semuaKomponenGaji(): Attribute
    {
        return Attribute::make(
            get: function () {
                $semuaKomponen = $this->komponenGaji;

                if ($this->status_pernikahan == 'Kawin') {
                    $tunjanganIstri = KomponenGaji::where('nama_komponen', 'Tunjangan Istri/Suami')->first();
                    if ($tunjanganIstri) {
                        $semuaKomponen->push($tunjanganIstri);
                    }
                }

                if ($this->jumlah_anak > 0) {
                    $tunjanganAnak = KomponenGaji::where('nama_komponen', 'Tunjangan Anak')->first();
                    if ($tunjanganAnak) {
                        $tunjanganAnak->nominal = $tunjanganAnak->nominal * min($this->jumlah_anak, 2);
                        $semuaKomponen->push($tunjanganAnak);
                    }
                }

                return $semuaKomponen;
            }
        );
    }

    // Membuat accessor (kolom atribut virtual) untuk menampilkan nominal takeHomePay (Gaji)
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
