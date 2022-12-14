<?php

namespace Database\Factories;

use App\Models\Juego;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JuegoFactory extends Factory
{
    protected $model = Juego::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'reglas' => $this->faker->name,
			'aula' => $this->faker->name,
			'valor' => $this->faker->name,
			'id_categoria' => $this->faker->name,
        ];
    }
}
