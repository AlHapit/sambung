<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'need_id',
        'mentor_id',
        'mentee_id',
        'status',
        'requested_at',
        'accepted_at',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'requested_at' => 'datetime',
            'accepted_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function need(): BelongsTo
    {
        return $this->belongsTo(Need::class);
    }

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function mentee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mentee_id');
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
