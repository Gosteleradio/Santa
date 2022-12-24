<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Santa>
 */
class SantaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        return [
            'title'=>$this->faker->realText(rand(10,300)),
            'description' =>$this->faker->realText(rand(1000,3000)),
            'isPrivate'=>false,
        ];
    }
}
