<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListeningParty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $casts = [
        'is_active' => 'boolean',
        'starts_time' => 'datetime',
        'ends_time' => 'datetime',
    ]

    public function episode(): BelongsTo
    {
        return $this->belongsTo(Episode::class);
    }
}
