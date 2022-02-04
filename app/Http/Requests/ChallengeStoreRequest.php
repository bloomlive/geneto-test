<?php

namespace App\Http\Requests;

use App\Enums\ChallengeType;
use BenSampo\Enum\Rules\EnumValue;
use Illuminate\Foundation\Http\FormRequest;

class ChallengeStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'start_date'        => ['required', 'date'],
            'end_date'          => ['required', 'date'],
            'type'              => ['required', new EnumValue(ChallengeType::class)],
            'image_url'         => ['nullable', 'string', 'url'],
            'is_public'         => ['required', 'boolean'],
            'title'             => ['nullable', 'max:255', 'string'],
            'description'       => ['required', 'nullable', 'string'],
            'prize_title'       => ['nullable', 'max:255', 'string'],
            'prize_description' => ['nullable', 'string'],
        ];
    }
}
