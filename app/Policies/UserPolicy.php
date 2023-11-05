<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function isCorrectUser(User $user)
    {
        return $user->id === auth()->user()->id;
    }

    public function destroyAccount(User $user)
    {
        return $user->id === auth()->user->id;
    }
}
