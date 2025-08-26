<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Participation;
use App\Models\Project;
use App\Models\Researcher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ParticipationController
 */
final class ParticipationControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $participations = Participation::factory()->count(3)->create();

        $response = $this->get(route('participations.index'));

        $response->assertOk();
        $response->assertViewIs('participation.index');
        $response->assertViewHas('participations');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('participations.create'));

        $response->assertOk();
        $response->assertViewIs('participation.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ParticipationController::class,
            'store',
            \App\Http\Requests\ParticipationStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $project = Project::factory()->create();
        $researcher = Researcher::factory()->create();
        $role = fake()->randomElement(/** enum_attributes **/);
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('participations.store'), [
            'project_id' => $project->id,
            'researcher_id' => $researcher->id,
            'role' => $role,
            'status' => $status,
        ]);

        $participations = Participation::query()
            ->where('project_id', $project->id)
            ->where('researcher_id', $researcher->id)
            ->where('role', $role)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $participations);
        $participation = $participations->first();

        $response->assertRedirect(route('participations.index'));
        $response->assertSessionHas('participation.id', $participation->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $participation = Participation::factory()->create();

        $response = $this->get(route('participations.show', $participation));

        $response->assertOk();
        $response->assertViewIs('participation.show');
        $response->assertViewHas('participation');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $participation = Participation::factory()->create();

        $response = $this->get(route('participations.edit', $participation));

        $response->assertOk();
        $response->assertViewIs('participation.edit');
        $response->assertViewHas('participation');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ParticipationController::class,
            'update',
            \App\Http\Requests\ParticipationUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $participation = Participation::factory()->create();
        $project = Project::factory()->create();
        $researcher = Researcher::factory()->create();
        $role = fake()->randomElement(/** enum_attributes **/);
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('participations.update', $participation), [
            'project_id' => $project->id,
            'researcher_id' => $researcher->id,
            'role' => $role,
            'status' => $status,
        ]);

        $participation->refresh();

        $response->assertRedirect(route('participations.index'));
        $response->assertSessionHas('participation.id', $participation->id);

        $this->assertEquals($project->id, $participation->project_id);
        $this->assertEquals($researcher->id, $participation->researcher_id);
        $this->assertEquals($role, $participation->role);
        $this->assertEquals($status, $participation->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $participation = Participation::factory()->create();

        $response = $this->delete(route('participations.destroy', $participation));

        $response->assertRedirect(route('participations.index'));

        $this->assertModelMissing($participation);
    }
}
