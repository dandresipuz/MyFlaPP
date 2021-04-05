<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResidentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Residential::factory()->count(10)->create();
    }
}
