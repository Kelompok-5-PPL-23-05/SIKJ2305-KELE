<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'kelas_id',
    ];

    /**
     * Relasi: Siswa belongsTo Kelas
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    /**
     * Relasi: Siswa memiliki banyak Nilai
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }

    /**
     * Relasi: Siswa memiliki banyak Absensi
     */
    public function absensis()
    {
        return $this->hasMany(Absensi::class);
    }

    /**
     * Relasi: Siswa memiliki satu Rapor
     */
    public function rapor()
    {
        return $this->hasOne(Rapor::class);
    }
}
