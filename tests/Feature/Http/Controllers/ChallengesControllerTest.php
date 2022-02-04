<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ChallengesControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function testGuestCanSeePaginatedIndex()
    {
        Challenge::factory()->count(48)->create();

        $response = $this->getJson(route('challenge.index'));

        $this->assertGuest();

        $response->assertOk()
            ->assertJsonStructure([
                'data', 'meta', 'links'
            ])
            ->assertJsonCount(24, 'data')
            ->assertJsonPath('meta.total', 48)
            ->assertJsonPath('meta.current_page', 1)
            ->assertJsonPath('meta.last_page', 2);

        $response->assertStatus(200);
    }


    public function testGuestCanSeeSingleChallenge()
    {
        $challenge = Challenge::factory()->create();

        $response = $this->getJson(route('challenge.show', $challenge->id));

        $this->assertGuest();

        $response->assertOk()
            ->assertJsonStructure([
                'data'
            ])
            ->assertJsonPath('data.title', $challenge->title);

        $response->assertStatus(200);
    }

    public function testGuestCanStoreChallenge()
    {
        $data = Challenge::factory()->raw();

        $this->assertGuest();

        $response = $this->postJson(route('challenge.store'), $data);

        $response->assertCreated()
            ->assertJsonStructure([
                'data'
            ])
            ->assertJsonPath('data.title', $data['title']);
    }


    public function testGuestCanUpdateChallenge()
    {
        $data = Challenge::factory()->raw();
        $challenge = Challenge::factory()->create();

        $this->assertModelExists($challenge);

        $this->assertGuest();

        $this->assertDatabaseHas('challenges', [
            'id'    => $challenge->id,
            'title' => $challenge->title
        ]);

        $this->assertDatabaseMissing('challenges', [
            'id'    => $challenge->id,
            'title' => $data['title']
        ]);

        $response = $this->putJson(route('challenge.update', $challenge), [
            'title' => $data['title']
        ]);

        $this->assertDatabaseHas('challenges', [
            'id'    => $challenge->id,
            'title' => $data['title']
        ]);

        $response->assertOk()
            ->assertJsonStructure([
                'data'
            ])
            ->assertJsonPath('data.title', $data['title']);
    }

    public function testGuestCanDeleteChallengeSoftly()
    {
        $challenge = Challenge::factory()->create();

        $this->assertGuest();

        $this->assertModelExists($challenge);
        $this->assertNotSoftDeleted($challenge);

        $response = $this->deleteJson(route('challenge.destroy', $challenge->id));

        $this->assertSoftDeleted($challenge);

        $response->assertNoContent();
    }
}
