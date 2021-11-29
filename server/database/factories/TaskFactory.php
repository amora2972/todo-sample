<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'description' => $this->faker->text,
            'status' => $this->faker->randomElement([0, 1]),
            'due_date' => $this->faker->date,
            'due_time' => $this->faker->time,
            'user_id' => User::factory(),
        ];
    }
}
