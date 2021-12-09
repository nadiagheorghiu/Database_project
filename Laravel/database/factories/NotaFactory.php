<?php

namespace Database\Factories;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Nota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_student' => $this->faker->randomNumber(3, false),
            'id_examen' => $this->faker->randomNumber(3, false),
            'nota' => $faker->randomDigitNotNull(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
