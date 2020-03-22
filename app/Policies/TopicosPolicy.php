<?php

namespace App\Policies;

use App\{Topico, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicosPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Topico $topico)
    {
        return $user->id === $topico->user_id;
    }
}
