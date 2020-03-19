<?php

use Illuminate\Database\Seeder;

class TopicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Topico::class, 50)->create();
    }
}
