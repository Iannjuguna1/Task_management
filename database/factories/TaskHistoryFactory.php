<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskHistoryFactory extends Factory
{
    protected $model = \App\Models\task_history::class;

    public function definition()
    {
        return [
            'task_id' => \App\Models\tasks::factory(),
            'user_id' => \App\Models\users::factory(),
            'action' => $this->faker->randomElement(['created', 'updated', 'status_changed']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
