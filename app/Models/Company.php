<?php

namespace App\Models;

use App\Traits\HasColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasColor, HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'color',
        'logo',
    ];

    /**
     * The users that belong to the company.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * The teams that belong to the company.
     */
    public function teams(): HasMany
    {
        return $this->hasMany(Team::class);
    }

    /**
     * Get some initial letters of the company name for the default logo.
     */
    public function nameForLogo(): string
    {
        $name = explode(' ', $this->name);
        if (count($name) === 1) {
            return strtoupper(substr($name[0], 0, 1));
        }

        return strtoupper(substr($name[0], 0, 1).substr(end($name), 0, 1));
    }
}
