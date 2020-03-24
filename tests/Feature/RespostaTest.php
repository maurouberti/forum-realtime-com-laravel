<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RespostaTest extends TestCase
{
    use DatabaseMigrations;

    public function testListagemDeRespostasPorTopico()
    {
        $user = factory(\App\User::class)->create();
        $this->seed('RespostasTableSeeder');

        $respostas = \App\Resposta::where('topico_id', 2)->get();

        $response = $this->actingAs($user)
            ->json('GET', '/respostas/2');

        $response->assertStatus(200)
            ->assertJson($respostas->toArray());
    }

    public function testInclusaoDeNovaResposta()
    {
        $this->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

        $user = factory(\App\User::class)->create();
        $topico = factory(\App\Topico::class)->create();

        $response = $this->actingAs($user)
            ->json('POST', '/respostas', [
                'mensagem'=>'Eu sou uma respsota no forum',
                'topico_id' => $topico->id
            ]);

        $resposta = \App\Resposta::find(1);

        $response->assertStatus(200)
            ->assertJson($resposta->toArray());
    }
}
