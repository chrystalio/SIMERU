<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Klien extends Model
{
    use HasFactory;

    protected $table = 'klien';

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'proyek_id',
    ];

    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Proyek::class);
    }
}

