<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'age',
        'location',
        'latitude',
        'longitude',
        'role',
        'avatar',
        'simple_mode',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'age' => 'integer',
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'simple_mode' => 'boolean',
        ];
    }

    public function skills(): HasMany
    {
        return $this->hasMany(Skill::class);
    }

    public function needs(): HasMany
    {
        return $this->hasMany(Need::class);
    }

    public function events(): HasMany
    {
        return $this->hasMany(Event::class, 'organizer_id');
    }

    public function participations(): HasMany
    {
        return $this->hasMany(Participation::class);
    }

    public function mentoringConnections(): HasMany
    {
        return $this->hasMany(Connection::class, 'mentor_id');
    }

    public function menteeConnections(): HasMany
    {
        return $this->hasMany(Connection::class, 'mentee_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function impactLogs(): HasMany
    {
        return $this->hasMany(ImpactLog::class);
    }

    public function participatedEvents()
    {
        return $this->hasManyThrough(
            Event::class,
            Participation::class,
            'user_id',
            'id',
            'id',
            'event_id'
        );
    }
}
