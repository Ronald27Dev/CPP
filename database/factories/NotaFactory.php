<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nota>
 */
class NotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'portugues' => 1,
            'matematica' => 2,
            'historia' => 3,
            'geografia' => 4,
            'ciencias' => 5,
            'artes' => 6,
            'educacao_fisica' => 7,
        ];
    }
}
