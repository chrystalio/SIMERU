<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';


    protected array $dates = [
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    protected $fillable = [
        'nama',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'karyawan_id'
    ];

    public function karyawan(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Karyawan::class);
    }
}
