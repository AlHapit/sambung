<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_type',
        'room_id',
        'sender_id',
        'content',
        'attachment',
    ];

    protected function casts(): array
    {
        return [
            'room_id' => 'integer',
        ];
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function room(): Model
    {
        return match ($this->room_type) {
            'mentoring' => Connection::findOrFail($this->room_id),
            'event' => Event::findOrFail($this->room_id),
        };
    }
}
