<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
   public function destroy(User $user, Comment $comment){
        return $comment->user_id === $user->id;
   }
}
