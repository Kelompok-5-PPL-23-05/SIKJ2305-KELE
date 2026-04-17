<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
        'nilai_angka',
        'deskripsi',
        'siswa_id',
        'guru_id',
        'mata_pelajaran_id',
    ];

    /**
     * Relasi: Nilai belongsTo Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Relasi: Nilai belongsTo Guru
     */
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    /**
     * Relasi: Nilai belongsTo Mata Pelajaran
     */
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    /**
     * Menghitung rata-rata nilai per siswa dan mata pelajaran
     */
    public static function hitungRataRata(int $siswaId, int $mapelId): float
    {
        return static::where('siswa_id', $siswaId)
                     ->where('mata_pelajaran_id', $mapelId)
                     ->avg('nilai_angka') ?? 0.0;
    }
}
