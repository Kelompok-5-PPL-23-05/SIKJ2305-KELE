<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_guru',
        'user_id',
        'mata_pelajaran_id',
    ];

    /**
     * Relasi: Guru belongsTo User (akun login)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Guru mengajar satu Mata Pelajaran
     */
    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    /**
     * Relasi: Guru memiliki banyak Nilai
     */
    public function nilais()
    {
        return $this->hasMany(Nilai::class);
    }
}
