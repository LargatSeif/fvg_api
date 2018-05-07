<?php

use Illuminate\Database\Seeder;
use App\Models\Concert;

class ConcertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Concert::class, 5)->create();
    }
}
