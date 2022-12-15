<?php

namespace Database\Factories;

use App\Models\Tipopg;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TipopgFactory extends Factory
{
    protected $model = Tipopg::class;

    public function definition()
    {
        return [
			'tipo' => $this->faker->name,
			'doc_pago' => $this->faker->name,
			'total' => $this->faker->name,
			'id_inscripcion_inds' => $this->faker->name,
			'id_inscripcion_grups' => $this->faker->name,
        ];
    }
}
