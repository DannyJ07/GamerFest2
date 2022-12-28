<?php

namespace Database\Factories;

use App\Models\Participante;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ParticipanteFactory extends Factory
{
    protected $model = Participante::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'cedula' => $this->faker->name,
			'correo' => $this->faker->name,
			'telefono' => $this->faker->name,
			'enjuego' => $this->faker->name,
			'id_equipo' => $this->faker->name,
        ];
    }
}
