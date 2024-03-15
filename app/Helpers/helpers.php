<?php

if (! function_exists('random_bg_color')) {
    /**
     * Get a random background color.
     */
    function random_bg_color(): string
    {
        $colors = [
            'bg-indigo-600',
            'bg-blue-600',
            'bg-green-600',
            'bg-yellow-600',
            'bg-red-600',
            'bg-pink-600',
            'bg-purple-600',
            'bg-gray-600',
            'bg-teal-600',
            'bg-cyan-600',
        ];

        return $colors[array_rand($colors)];
    }
}
