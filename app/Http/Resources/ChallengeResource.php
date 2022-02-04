<?php

namespace App\Http\Resources;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Challenge */
class ChallengeResource extends JsonResource
{
    /**
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return \Arr::except(parent::toArray($request), [
            'created_at',
            'updated_at',
            'deleted_at'
        ]);
    }
}
