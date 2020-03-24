<?php

namespace App\Observers;

use App\Resposta;
use App\Topico;

class RespostaObserver
{
    public function creating(Resposta $resposta)
    {
        $topico = Topico::find($resposta->topico_id);
        $topico->respostas_total = $topico->respostas_total + 1;
        $topico->save();
    }
}
