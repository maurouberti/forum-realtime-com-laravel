<?php

namespace App\Http\Controllers;

use App\Topico;
use Illuminate\Http\Request;
use App\Http\Requests\TopicosRequest;

class TopicoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topicos = Topico:://orderBy('fixed', 'desc')
            orderBy('updated_at', 'desc')
            ->paginate();

        return response()->json($topicos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicosRequest $request)
    {
        $topico = new Topico;
        $topico->titulo = $request->input('titulo');
        $topico->mensagem = $request->input('mensagem');
        $topico->user_id = \Auth::user()->id;
        $topico->save();

        // broadcast(new NewTopico($topico));

        return response()->json(['created' => 'success', 'data' => $topico]);
    }

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    public function show($id)
    {
        return view('topicos.view', ['result' => Topico::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function edit(Topico $topico)
    {
        return view('topicos.edit', compact('topico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function update(TopicosRequest $request, Topico $topico)
    {
        if (!isset($topico->id)) {
            abort(404, "Tópico não encontrado");
        }

        $this->authorize('update', $topico);

        $topico->titulo = $request->input('titulo');
        $topico->mensagem = $request->input('mensagem');
        $topico->update();

        return redirect('/topicos/' . $topico->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topico  $topico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topico $topico)
    {
        //
    }

    public function pin(Topico $topico)
    {
        // $this->authorize('isAdmin', $topico);

        // $topico->fixed = true;
        // $topico->save();

        // return redirect('/');
    }

    public function close(Topico $topico)
    {
        // $this->authorize('isAdmin', $topico);

        // $topico->closed = true;
        // $topico->save();

        // return redirect('/');
    }
}
