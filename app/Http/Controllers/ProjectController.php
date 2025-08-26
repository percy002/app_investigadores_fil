<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): Response
    {
        $projects = Project::all();

        return view('project.index', [
            'projects' => $projects,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('project.create');
    }

    public function store(ProjectStoreRequest $request): Response
    {
        $project = Project::create($request->validated());

        $request->session()->flash('project.id', $project->id);

        return redirect()->route('projects.index');
    }

    public function show(Request $request, Project $project): Response
    {
        return view('project.show', [
            'project' => $project,
        ]);
    }

    public function edit(Request $request, Project $project): Response
    {
        return view('project.edit', [
            'project' => $project,
        ]);
    }

    public function update(ProjectUpdateRequest $request, Project $project): Response
    {
        $project->update($request->validated());

        $request->session()->flash('project.id', $project->id);

        return redirect()->route('projects.index');
    }

    public function destroy(Request $request, Project $project): Response
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
