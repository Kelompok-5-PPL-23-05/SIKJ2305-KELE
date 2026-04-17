<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nilai_akhir',
        'siswa_id',
    ];

    /**
     * Relasi: Rapor belongsTo Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Generate rapor berdasarkan rata-rata semua nilai siswa
     */
    public static function generateRapor(int $siswaId): self
    {
        $nilaiAkhir = Nilai::where('siswa_id', $siswaId)->avg('nilai_angka') ?? 0.0;

        return static::updateOrCreate(
            ['siswa_id' => $siswaId],
            ['nilai_akhir' => $nilaiAkhir]
        );
    }
}
