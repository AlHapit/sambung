<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ImpactLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'value',
        'description',
        'reference_type',
        'reference_id',
    ];

    protected function casts(): array
    {
        return [
            'value' => 'decimal:2',
            'reference_id' => 'integer',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function reference(): Model
    {
        return match ($this->reference_type) {
            'session' => Session::findOrFail($this->reference_id),
            'participation' => Participation::findOrFail($this->reference_id),
            default => throw new \InvalidArgumentException(
                "Unsupported impact reference type: {$this->reference_type}"
            ),
        };
    }
}
