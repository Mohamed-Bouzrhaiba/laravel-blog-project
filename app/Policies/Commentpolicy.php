<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class Commentpolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id;

    }
    public function delete(User $user, Comment $comment): bool
    {
        return $user->id === $comment->user_id;

    }
}
