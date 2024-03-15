<?php

namespace App;

trait HasColor
{
    /**
     * The "booted" method of the trait.
     *
     * @return void
     */
    protected static function bootHasColor()
    {
        static::creating(function ($model) {
            if (is_null($model->color)) {
                $model->color = random_bg_color();
            }
        });
    }

    /**
     * Get the color associated to this entity.
     */
    public function getColor(): string
    {
        return $this->color;
    }
}
