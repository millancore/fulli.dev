<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Articulo;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articulo>
 */
class ArticuloFactory extends Factory
{
    protected $model = Articulo::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,
            'contenido' => $this->faker->paragraphs(5, true),
            'links' => $this->faker->url,
        ];
    }
}
