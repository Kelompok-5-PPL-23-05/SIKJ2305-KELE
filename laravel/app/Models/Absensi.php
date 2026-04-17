<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'hadir',
        'sakit',
        'izin',
        'alfa',
        'siswa_id',
    ];

    /**
     * Relasi: Absensi belongsTo Siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Menghitung total hari kehadiran (hadir + sakit + izin + alfa)
     */
    public function totalHari(): int
    {
        return $this->hadir + $this->sakit + $this->izin + $this->alfa;
    }
}
