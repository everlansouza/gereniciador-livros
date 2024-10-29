<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class BookFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->title() . " " . fake()->name(),
            'author' => fake()->name(),
            'description' => "Teste descrição",
        ];
    }
}
