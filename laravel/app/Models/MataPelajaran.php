<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajarans';

    protected $fillable = [
        'nama_mapel',
    ];

    /**
     * Relasi: Mata Pelajaran diajarkan oleh banyak Guru
     */
    public function gurus()
    {
        return $this->hasMany(Guru::class, 'mata_pelajaran_id');
    }

    /**
     * Relasi: Mata Pelajaran memiliki banyak Nilai
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class, 'mata_pelajaran_id');
    }
}
