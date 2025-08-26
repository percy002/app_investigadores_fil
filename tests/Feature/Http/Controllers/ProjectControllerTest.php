<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ProjectController
 */
final class ProjectControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $projects = Project::factory()->count(3)->create();

        $response = $this->get(route('projects.index'));

        $response->assertOk();
        $response->assertViewIs('project.index');
        $response->assertViewHas('projects');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('projects.create'));

        $response->assertOk();
        $response->assertViewIs('project.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'store',
            \App\Http\Requests\ProjectStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $code = fake()->word();
        $title = fake()->sentence(4);
        $research_line = fake()->word();
        $research_area = fake()->word();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->post(route('projects.store'), [
            'code' => $code,
            'title' => $title,
            'research_line' => $research_line,
            'research_area' => $research_area,
            'status' => $status,
        ]);

        $projects = Project::query()
            ->where('code', $code)
            ->where('title', $title)
            ->where('research_line', $research_line)
            ->where('research_area', $research_area)
            ->where('status', $status)
            ->get();
        $this->assertCount(1, $projects);
        $project = $projects->first();

        $response->assertRedirect(route('projects.index'));
        $response->assertSessionHas('project.id', $project->id);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $project = Project::factory()->create();

        $response = $this->get(route('projects.show', $project));

        $response->assertOk();
        $response->assertViewIs('project.show');
        $response->assertViewHas('project');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $project = Project::factory()->create();

        $response = $this->get(route('projects.edit', $project));

        $response->assertOk();
        $response->assertViewIs('project.edit');
        $response->assertViewHas('project');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ProjectController::class,
            'update',
            \App\Http\Requests\ProjectUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $project = Project::factory()->create();
        $code = fake()->word();
        $title = fake()->sentence(4);
        $research_line = fake()->word();
        $research_area = fake()->word();
        $status = fake()->randomElement(/** enum_attributes **/);

        $response = $this->put(route('projects.update', $project), [
            'code' => $code,
            'title' => $title,
            'research_line' => $research_line,
            'research_area' => $research_area,
            'status' => $status,
        ]);

        $project->refresh();

        $response->assertRedirect(route('projects.index'));
        $response->assertSessionHas('project.id', $project->id);

        $this->assertEquals($code, $project->code);
        $this->assertEquals($title, $project->title);
        $this->assertEquals($research_line, $project->research_line);
        $this->assertEquals($research_area, $project->research_area);
        $this->assertEquals($status, $project->status);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $project = Project::factory()->create();

        $response = $this->delete(route('projects.destroy', $project));

        $response->assertRedirect(route('projects.index'));

        $this->assertModelMissing($project);
    }
}
