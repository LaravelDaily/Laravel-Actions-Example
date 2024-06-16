<?php

test('user can delete their team', function () {
    $user = \App\Models\User::factory()->create();
    $team = \App\Models\Team::factory()->create(['user_id' => $user->id]);
    $response = $this->actingAs($user)->delete('teams/' . $team->id);

    $response->assertRedirect(route('teams.index'));
    $this->assertDatabaseMissing('teams', $team->toArray());
});

test('user cannot delete someone elses team', function () {
    $user = \App\Models\User::factory()->create();
    $team = \App\Models\Team::factory()->create(['user_id' => $user->id]);

    $user2 = \App\Models\User::factory()->create();
    $response = $this->actingAs($user2)->delete('teams/' . $team->id);

    $response->assertForbidden();
    $this->assertDatabaseHas('teams', $team->toArray());
});
