<?php

namespace App\Models;

use App\Traits\HasColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    use HasColor, HasFactory;

    protected $fillable = [
        'user_id',
        'username',
        'first_name',
        'last_name',
        'avatar',
        'color',
        'bio',
        'timezone',
        'github_url',
        'twitter_url',
    ];

    /**
     * The user to which this profile belongs.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
