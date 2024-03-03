<?php

namespace App\Traits\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Throwable;

trait FavoriteTrait
{
    public function toggleFavorite($postId): bool
    {
        $user = Auth::user();
        if (!$user) return false;

        try {
            $post = Post::findOrFail($postId);
            if ($post->is_favorited) {
                return $this->removeFavorite($user, $postId);
            }
            return $this->addFavorite($user, $postId);
        } catch (Throwable $e) {
            return false;
        }
    }

    protected function addFavorite($user, $postId): bool
    {
        return $user->favorites()->attach($postId);
    }

    protected function removeFavorite($user, $postId): bool
    {
        return $user->favorites()->detach($postId);
    }
}
