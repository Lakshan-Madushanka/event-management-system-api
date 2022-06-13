<?php

namespace App\Domains\Event\Model;

use App\Domains\User\Models\User;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $casts = [
        'venue' => 'array',
        'is_private' => 'boolean',
        'is_online' => 'boolean',
        'start_time' => 'datetime:Y-m-d:H:i',
        'end_time' => 'datetime:Y-m-d:H:i',
    ];

    protected static function newFactory(): EventFactory
    {
        return EventFactory::new();
    }

    /*
     * Relationships
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_event')
            ->withTimestamps()
            ->withPivot([
                'participation_status',
                'is_participated',
                'assigned_by',
            ]);
    }
}
