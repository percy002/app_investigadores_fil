<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResearcherStoreRequest;
use App\Http\Requests\ResearcherUpdateRequest;
use App\Models\Researcher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ResearcherController extends Controller
{
    public function index(): View
    {
        $researchers = Researcher::all();

        return view('researcher.index', [
            'researchers' => $researchers,
        ]);
    }

    public function create(Request $request): View
    {
        return view('researcher.create');
    }

    public function store(ResearcherStoreRequest $request): View
    {
        $researcher = Researcher::create($request->validated());

        $request->session()->flash('researcher.id', $researcher->id);

        return redirect()->route('researchers.index');
    }

    public function show(Request $request, Researcher $researcher): View
    {
        return view('researcher.show', [
            'researcher' => $researcher,
        ]);
    }

    public function edit(Request $request, Researcher $researcher): View
    {
        return view('researcher.edit', [
            'researcher' => $researcher,
        ]);
    }

    public function update(ResearcherUpdateRequest $request, Researcher $researcher): View
    {
        $researcher->update($request->validated());

        $request->session()->flash('researcher.id', $researcher->id);

        return redirect()->route('researchers.index');
    }

    public function destroy(Request $request, Researcher $researcher): View
    {
        $researcher->delete();

        return redirect()->route('researchers.index');
    }
}
