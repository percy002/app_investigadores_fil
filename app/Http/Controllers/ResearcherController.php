<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearcherStoreRequest;
use App\Http\Requests\ResearcherUpdateRequest;
use App\Models\Researcher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Inertia\Inertia;
use Inertia\Response;
class ResearcherController extends Controller
{
    public function index(Request $request)
    {
        $researchers = Researcher::all();

        return Inertia::render('researchers/index', [
            'researchers' => $researchers,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('researcher.create');
    }

    public function store(ResearcherStoreRequest $request): Response
    {
        $researcher = Researcher::create($request->validated());

        $request->session()->flash('researcher.id', $researcher->id);

        return redirect()->route('researchers.index');
    }

    public function show(Request $request, Researcher $researcher): Response
    {
        return view('researcher.show', [
            'researcher' => $researcher,
        ]);
    }

    public function edit(Request $request, Researcher $researcher): Response
    {
        return view('researcher.edit', [
            'researcher' => $researcher,
        ]);
    }

    public function update(ResearcherUpdateRequest $request, Researcher $researcher): Response
    {
        $researcher->update($request->validated());

        $request->session()->flash('researcher.id', $researcher->id);

        return redirect()->route('researchers.index');
    }

    public function destroy(Request $request, Researcher $researcher): Response
    {
        $researcher->delete();

        return redirect()->route('researchers.index');
    }
}
