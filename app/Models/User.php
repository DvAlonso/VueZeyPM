<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

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
     * The relationships to always eager-load.
     */
    protected $with = ['profile'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * The companies to which this user belongs.
     */
    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class)->withTimestamps();
    }

     /**
     * The teams to which this user belongs.
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The profile for this user.
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * Get the name for the user.
     */
    public function getDisplayName(): string
    {
        return $this->profile->first_name . ' ' . $this->profile->last_name;
    }

    /**
     * Get the username for the user.
     */
    public function getUsername(): string
    {
        return $this->profile->username;
    }

    /**
     * Get some initial letters of the user's name for the avatar logo.
     */
    public function nameForAvatar(): string
    {
        $name = explode(' ', $this->getDisplayName());
        if (count($name) === 1) {
            return strtoupper(substr($name[0], 0, 1));
        }

        return strtoupper(substr($name[0], 0, 1).substr(end($name), 0, 1));
    }

    /**
     * Get the color for the avatar.
     */
    public function getColorForAvatar(): string
    {
        return $this->profile->getColor();
    }

}
