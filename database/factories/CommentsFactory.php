<?php

namespace Database\Factories;

use App\Models\Ads;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ads_id' => Ads::factory(),
            'user_id' => User::factory(),
            'feedback' => $this->faker->sentence

        ];
    }
}
