<?php

namespace Database\Seeders;

use App\Models\Challenge;
use Illuminate\Database\Seeder;

class ChallengeSeeder extends Seeder
{
    public function run()
    {
        Challenge::factory()
            ->count(58)
            ->create();
    }
}
