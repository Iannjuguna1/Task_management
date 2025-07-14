<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = \App\Models\tasks::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'user_id' => \App\Models\users::factory(),
            'status' => 'pending',
            'deadline' => $this->faker->date(),
            'created_by' => \App\Models\users::factory(),
            'created_at' => now(),
        ];
    }
}
