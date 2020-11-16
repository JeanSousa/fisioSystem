<?php

use App\Models\Evolution;
use Illuminate\Database\Seeder;

class EvolutionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Evolution::class, 2)->create();
    }
}
