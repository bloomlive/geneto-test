<?php

namespace Database\Factories;

use App\Enums\ChallengeType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChallengeFactory extends Factory
{
    public function definition()
    {
        return [
            'title'             => $this->faker->words(5, true),
            'description'       => $this->faker->words(24, true),
            'is_public'         => rand(0, 1),
            'start_date'        => $this->faker->dateTimeBetween('-1 year', '+0 days')->format('Y-m-d'),
            'end_date'          => $this->faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
            'type'              => ChallengeType::getRandomValue(),
            'image_url'         => $this->faker->imageUrl,
            'prize_title'       => $this->faker->words(5, true),
            'prize_description' => $this->faker->words(24, true),
        ];
    }
}
