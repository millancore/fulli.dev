<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ArticuloSeeder extends Seeder
{
    public function run()
    {
        Articulo::factory()->count(10)->create();
    }
}
