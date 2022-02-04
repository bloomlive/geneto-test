<?php

namespace App\Http\Requests;

use App\Enums\ChallengeType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class ChallengeUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'start_date'        => ['sometimes', 'date'],
            'end_date'          => ['sometimes', 'date'],
            'type'              => ['sometimes', new EnumValue(ChallengeType::class, false)],
            'image_url'         => ['nullable', 'string', 'url'],
            'is_public'         => ['sometimes', 'boolean'],
            'title'             => ['nullable', 'max:255', 'string'],
            'description'       => ['sometimes', 'nullable', 'string'],
            'prize_title'       => ['nullable', 'max:255', 'string'],
            'prize_description' => ['nullable', 'string'],
        ];
    }
}
