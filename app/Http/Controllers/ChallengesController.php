<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChallengeUpdateRequest;
use App\Http\Resources\ChallengeResource;
use App\Models\Challenge;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChallengesController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return ChallengeResource::collection(
            Challenge::query()->paginate(24)
        );
    }

    public function store(ChallengeUpdateRequest $request): ChallengeResource
    {
        $validated = $request->validated();

        $challenge = Challenge::create($validated);

        return ChallengeResource::make($challenge);
    }

    public function show(Challenge $challenge): ChallengeResource
    {
        return ChallengeResource::make($challenge);
    }

    public function update(ChallengeUpdateRequest $request, Challenge $challenge)
    {
        $validated = $request->validated();

        $challenge->fill($validated)->save();

        return ChallengeResource::make($challenge);
    }

    public function destroy(Challenge $challenge)
    {
        $challenge->delete();

        return response()->noContent();
    }
}
