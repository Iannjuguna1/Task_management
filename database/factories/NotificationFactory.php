<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\notifications>
 */
class NotificationFactory extends Factory
{
    protected $model = \App\Models\notifications::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\users::factory(),
            'task_id' => \App\Models\tasks::factory(),
            'message' => $this->faker->sentence(),
            'sent_at' => now(),
        ];
    }
}
