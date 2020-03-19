<?php

use Illuminate\Database\Seeder;

class RespostasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topicos = factory(\App\Topico::class, 50)->create();
        $topicos->each(function($topico) {
            factory(\App\Resposta::class, rand(5, 10))->create([
                'topico_id' => $topico->id
            ]);
        });
    }
}
