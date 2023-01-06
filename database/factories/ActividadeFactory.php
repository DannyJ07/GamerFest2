<?php

namespace Database\Factories;

use App\Models\Actividade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ActividadeFactory extends Factory
{
    protected $model = Actividade::class;

    public function definition()
    {
        return [
			'id_actividades' => $this->faker->name,
			'nombre' => $this->faker->name,
			'fecha' => $this->faker->name,
			'hora' => $this->faker->name,
			'lugar' => $this->faker->name,
        ];
    }
}
