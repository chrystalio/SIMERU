<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'karyawan';
    protected $primaryKey = 'uuid';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $casts = [
        'uuid' => 'string',
    ];

    protected $fillable = [
        'uuid', // add this line
        'name',
        'address',
        'phone',
        'email',
        'role',
        'department_id',
    ];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
