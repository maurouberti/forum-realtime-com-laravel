<?php

namespace App\Http\Controllers;

use App\Events\NovaRespostaEvent;
use App\Http\Requests\RespostaRequest;
use App\Resposta;
use Illuminate\Http\Request;

class RespostaController extends Controller
{
    public function index(int $topico_id)
    {
        $respostas = Resposta::where('topico_id', $topico_id)
            ->with('user')
            ->get();

        return $respostas;
    }

    public function store(RespostaRequest $request)
    {
        $resposta = new Resposta;
        $resposta->mensagem = $request->input('mensagem');
        $resposta->topico_id = $request->input('topico_id');
        $resposta->user_id = \Auth::user()->id;

        $this->authorize('isClosed', $resposta);

        $resposta->save();

        broadcast(new NovaRespostaEvent($resposta));

        return response()->json($resposta);
    }

    public function destaque(int $id)
    {
        $resposta = Resposta::find($id);

        $this->authorize('update', $resposta);

        Resposta::where([
                ['id', '!=', $id],
                ['topico_id', '=', $resposta->topico_id],
            ])
            ->update([
                'destaque' => false
            ]);

        $resposta->destaque = true;
        $resposta->save();

        return redirect('topicos/' . $resposta->topico_id);
    }

}
