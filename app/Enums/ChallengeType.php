<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ChallengeType extends Enum
{
    const DaysWith1000Steps = 0;
    const DaysWith3Meals = 1;
    const TotalWorkOutMinutes = 2;
}
