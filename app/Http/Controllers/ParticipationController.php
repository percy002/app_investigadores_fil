<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipationStoreRequest;
use App\Http\Requests\ParticipationUpdateRequest;
use App\Models\Participation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ParticipationController extends Controller
{
    public function index(Request $request): Response
    {
        $participations = Participation::all();

        return view('participation.index', [
            'participations' => $participations,
        ]);
    }

    public function create(Request $request): Response
    {
        return view('participation.create');
    }

    public function store(ParticipationStoreRequest $request): Response
    {
        $participation = Participation::create($request->validated());

        $request->session()->flash('participation.id', $participation->id);

        return redirect()->route('participations.index');
    }

    public function show(Request $request, Participation $participation): Response
    {
        return view('participation.show', [
            'participation' => $participation,
        ]);
    }

    public function edit(Request $request, Participation $participation): Response
    {
        return view('participation.edit', [
            'participation' => $participation,
        ]);
    }

    public function update(ParticipationUpdateRequest $request, Participation $participation): Response
    {
        $participation->update($request->validated());

        $request->session()->flash('participation.id', $participation->id);

        return redirect()->route('participations.index');
    }

    public function destroy(Request $request, Participation $participation): Response
    {
        $participation->delete();

        return redirect()->route('participations.index');
    }
}
