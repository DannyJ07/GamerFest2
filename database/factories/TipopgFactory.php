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
        ];
    }
}
