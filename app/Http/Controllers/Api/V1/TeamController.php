<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\DeleteTeam;
use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteTeamRequest;
use App\Models\Team;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    public function destroy(DeleteTeamRequest $request, Team $team, DeleteTeam $action): Response
    {
        $action->handle($request->user(), $team);

        return response()->noContent();
    }
}
