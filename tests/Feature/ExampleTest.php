<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function testTopicos()
    {
        $this->seed('RespostasTableSeeder');
        
        $response = $this->get('/topico/1');
        $response->assertStatus(200);
        
        $response = $this->get('/topico/2');
        $response->assertStatus(200);
        
        $response = $this->get('/topico/a');
        $response->assertStatus(404);
    }

    public function testVisualizacaoDoTopico()
    {
        $this->seed('RespostasTableSeeder');

        $topico = \App\Topico::find(1);

        $response = $this->get('/topico/1');
        $response->assertSee($topico->titulo);
        $response->assertSee($topico->mensagem);
    }
}
