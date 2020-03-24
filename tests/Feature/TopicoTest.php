<?php

namespace Tests\Feature;

use App\{Topico, User};
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TopicoTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndexController()
    {
        $user = factory(User::class)->create();
        $this->seed('TopicosTableSeeder');

        $topicos = Topico::orderBy('updated_at', 'desc')
            ->paginate();

        $response = $this
            ->actingAs($user)
            ->json('GET', '/topicos');

        $response->assertStatus(200)
            ->assertJsonFragment([$topicos->toArray()['data']]);
    }
    
    public function testStoreController()
    {
        $this->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
        
        $user = factory(User::class)->create();

        $response = $this
            ->actingAs($user)
            ->json('POST', '/topicos', [
                'titulo' => 'Meu primeiro tópico',
                'mensagem' => 'Este é um exemplo de tópico'
            ]);

        $topico = Topico::find(1);

        $response->assertStatus(200)
            ->assertJsonFragment(['created' => 'success'])
            ->assertJsonFragment([$topico->toArray()]);
    }

    public function testUpdateController()
    {
        $this->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

        $user = factory(User::class)->create();
        $topico = factory(Topico::class)->create(
            [
                'user_id' => $user->id
            ]
        );

        $response = $this
            ->actingAs($user)
            ->json('PUT', '/topicos/' . $topico->id, [
                'titulo'=>'Meu primeiro atualizado',
                'mensagem' => 'Este é um exemplo de tópico atualizado'
            ]);

        $topico->titulo = 'Meu primeiro atualizado';
        $topico->mensagem = 'Este é um exemplo de tópico atualizado';

        $response->assertStatus(302);
        $this->assertEquals(Topico::find($topico->id)->toArray(), $topico->toArray());
    }
}
