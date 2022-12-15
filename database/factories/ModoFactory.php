<?php

namespace Database\Factories;

use App\Models\Modo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModoFactory extends Factory
{
    protected $model = Modo::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'id_juego' => $this->faker->name,
        ];
    }
}
