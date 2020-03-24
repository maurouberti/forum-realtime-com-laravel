<?php

namespace App\Policies;

use App\{Resposta, User};
use Illuminate\Auth\Access\HandlesAuthorization;

class RespostaPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Resposta $resposta)
    {
        return $user->role === 'admin';
    }

    public function isClosed(User $user, Resposta $resposta)
    {
        return !$resposta->topico->fechado;
    }
}
