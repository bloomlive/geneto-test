<?php

use App\Enums\ChallengeType;

return [
    ChallengeType::class => [
        ChallengeType::DaysWith1000Steps   => 'Number of days with 10000 steps done',
        ChallengeType::DaysWith3Meals      => 'Number of days where at least 3 meals are consumed',
        ChallengeType::TotalWorkOutMinutes => 'Number of workout minutes done',
    ]
];
