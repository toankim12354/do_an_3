<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Admin::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dob' => $this->faker->date(),
            'email' => $this->faker->unique()->email(),
            'address' => $this->faker->address(),
            'gender' => $this->faker->numberBetween(0, 1),
            'phone' => $this->faker->numerify('##########'),
            'password' => Hash::make('11111111'),
        ];
    }
}
