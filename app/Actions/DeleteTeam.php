<?php

namespace App\Actions;

use App\Models\Team;
use App\Models\User;
use App\Notifications\TeamDeletedNotification;

class DeleteTeam
{
    public function handle(User $user, Team $team): void
    {
        $team->delete();
        // $user->notify(TeamDeletedNotification::class);
    }
}
