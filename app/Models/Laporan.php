<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'proyek_id',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Proyek::class, 'proyek_id');
    }
}
