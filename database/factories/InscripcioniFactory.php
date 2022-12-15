<?php

namespace Database\Factories;

use App\Models\Inscripcioni;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InscripcioniFactory extends Factory
{
    protected $model = Inscripcioni::class;

    public function definition()
    {
        return [
			'fecha' => $this->faker->name,
			'id_juego' => $this->faker->name,
			'id_participantes' => $this->faker->name,
        ];
    }
}
