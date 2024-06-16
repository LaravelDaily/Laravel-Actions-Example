<?php

test('team delete action works correctly', function () {
    $user = \App\Models\User::factory()->create();
    $team = \App\Models\Team::factory()->create(['user_id' => $user->id]);

    $action = new App\Actions\DeleteTeam();
    $action->handle($user, $team);

    $this->assertDatabaseMissing('teams', $team->toArray());
});
