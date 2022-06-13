<?php

namespace App\Domains\User\Models;

use App\Domains\Event\Model\Event;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    public static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }

    /*
     *  Relationships
     */
    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, 'user_event')
            ->withTimestamps()
            ->withPivot([
                'participation_status',
                'is_participated',
                'assigned_by',
            ]);
    }
}
