<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'organizer_id',
        'title',
        'description',
        'category',
        'location',
        'latitude',
        'longitude',
        'event_date',
        'status',
        'max_participants',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'event_date' => 'datetime',
            'max_participants' => 'integer',
        ];
    }

    public function organizer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organizer_id');
    }

    public function participations(): HasMany
    {
        return $this->hasMany(Participation::class);
    }

    public function participants()
    {
        return $this->hasManyThrough(
            User::class,
            Participation::class,
            'event_id',
            'id',
            'id',
            'user_id'
        );
    }
}
