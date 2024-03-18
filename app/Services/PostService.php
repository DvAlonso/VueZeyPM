<?php

namespace App\Services;

use App\Enums\PostStatus;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostService
{
    /**
     * Create a new post.
     */
    public function create(string $title, string $slug, string $content): Post
    {
        $post = Post::create([
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
        ]);

        return $post;
    }

    /**
     * Generate a new slug for a given title.
     */
    public function generateSlug(string $title): string
    {
        return Str::slug($title, '-', 'en');
    }

    /**
     * Mark a post as published.
     */
    public function publish(Post $post): void
    {
        $post->update([
            'status' => PostStatus::Published,
        ]);
    }

    /**
     * Mark a post as scheduled publishing.
     */
    public function schedule(Post $post, Carbon $date)
    {
        $post->update([
            'status' => PostStatus::Scheduled,
            'scheduled_at' => $date,
        ]);
    }
}
