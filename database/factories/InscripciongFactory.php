<?php

namespace Database\Factories;

use App\Models\Inscripciong;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InscripciongFactory extends Factory
{
    protected $model = Inscripciong::class;

    public function definition()
    {
        return [
			'fecha' => $this->faker->name,
			'id_juego' => $this->faker->name,
			'id_equipo' => $this->faker->name,
        ];
    }
}
