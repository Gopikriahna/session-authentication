<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class userdataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username'=> fake()->name(),
        'Roll'=> fake()->name(),
        'password'=>'123456789',
        'EmploeeId'=>fake()->unique()
        ];
    }
}
