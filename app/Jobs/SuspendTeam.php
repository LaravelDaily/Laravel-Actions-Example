<?php

namespace App\Jobs;

use App\Actions\DeleteTeam;
use App\Models\Team;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SuspendTeam implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Team $team)
    {}

    public function handle(DeleteTeam $action): void
    {
        // Do something before deleting the team

        $action->handle($this->team->user, $this->team);

        // Do something after deleting the team
    }
}
