<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->text(15),
            'slug'      => $this->faker->slug,
            'description'      => $this->faker->paragraph(5),

        ];
    }
}
