<?php

namespace App\Http\Controllers;

use App\Actions\CreateTeam;
use App\Actions\DeleteTeam;
use App\Http\Requests\DeleteTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TeamController extends Controller
{
    public function index(): View
    {
        $teams = auth()->user()->teams;

        return view('teams.index', compact('teams'));
    }

    public function create(): View
    {
        return view('teams.create');
    }

    public function store(StoreTeamRequest $request, CreateTeam $action): RedirectResponse
    {
        $action->handle($request->user(), $request->validated());

        return to_route('teams.index');
    }

    public function destroy(DeleteTeamRequest $request, Team $team, DeleteTeam $action): RedirectResponse
    {
        $action->handle($request->user(), $team);

        return to_route('teams.index');
    }
}
