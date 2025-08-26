<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Researcher;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ResearcherController
 */
final class ResearcherControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $researchers = Researcher::factory()->count(3)->create();

        $response = $this->get(route('researchers.index'));

        $response->assertOk();
        $response->assertViewIs('researcher.index');
        $response->assertViewHas('researchers');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('researchers.create'));

        $response->assertOk();
        $response->assertViewIs('researcher.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResearcherController::class,
            'store',
            \App\Http\Requests\ResearcherStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $dni = fake()->randomLetter();
        $first_name = fake()->firstName();
        $last_name_father = fake()->word();
        $last_name_mother = fake()->word();

        $response = $this->post(route('researchers.store'), [
            'dni' => $dni,
            'first_name' => $first_name,
            'last_name_father' => $last_name_father,
            'last_name_mother' => $last_name_mother,
        ]);

        $researchers = Researcher::query()
            ->where('dni', $dni)
            ->where('first_name', $first_name)
            ->where('last_name_father', $last_name_father)
            ->where('last_name_mother', $last_name_mother)
            ->get();
        $this->assertCount(1, $researchers);
        $researcher = $researchers->first();

        $response->assertRedirect(route('researchers.index'));
        $response->assertSessionHas('researcher.id', $researcher->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $researcher = Researcher::factory()->create();

        $response = $this->get(route('researchers.show', $researcher));

        $response->assertOk();
        $response->assertViewIs('researcher.show');
        $response->assertViewHas('researcher');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $researcher = Researcher::factory()->create();

        $response = $this->get(route('researchers.edit', $researcher));

        $response->assertOk();
        $response->assertViewIs('researcher.edit');
        $response->assertViewHas('researcher');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ResearcherController::class,
            'update',
            \App\Http\Requests\ResearcherUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $researcher = Researcher::factory()->create();
        $dni = fake()->randomLetter();
        $first_name = fake()->firstName();
        $last_name_father = fake()->word();
        $last_name_mother = fake()->word();

        $response = $this->put(route('researchers.update', $researcher), [
            'dni' => $dni,
            'first_name' => $first_name,
            'last_name_father' => $last_name_father,
            'last_name_mother' => $last_name_mother,
        ]);

        $researcher->refresh();

        $response->assertRedirect(route('researchers.index'));
        $response->assertSessionHas('researcher.id', $researcher->id);

        $this->assertEquals($dni, $researcher->dni);
        $this->assertEquals($first_name, $researcher->first_name);
        $this->assertEquals($last_name_father, $researcher->last_name_father);
        $this->assertEquals($last_name_mother, $researcher->last_name_mother);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $researcher = Researcher::factory()->create();

        $response = $this->delete(route('researchers.destroy', $researcher));

        $response->assertRedirect(route('researchers.index'));

        $this->assertModelMissing($researcher);
    }
}
