<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ApartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Apartament::factory()->count(500)->create();
    }
}
