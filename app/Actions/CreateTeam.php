<?php

namespace App\Actions;

use App\Models\User;

class CreateTeam
{
    public function handle(User $user, array $teamData): void
    {
        $user->teams()->create($teamData);

        // More operations to complete
    }
}
