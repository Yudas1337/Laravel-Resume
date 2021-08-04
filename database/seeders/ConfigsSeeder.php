<?php

namespace Database\Seeders;

use App\Models\Configs;
use Illuminate\Database\Seeder;

class ConfigsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Configs::factory(1)->create();
    }
}
