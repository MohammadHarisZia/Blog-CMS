<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'bio'               => $this->faker->paragraph(),
            'facebook'          => $this->faker->url(),
            'twitter'           => $this->faker->url(),
            'instagram'         => $this->faker->url(),
            'linkedin'          => $this->faker->url(),
        ];
    }
}
