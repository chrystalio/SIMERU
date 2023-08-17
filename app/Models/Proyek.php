<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';

    protected array $dates = [
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'category',
        'karyawan_uuid',
        'status',
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class);
    }
}
