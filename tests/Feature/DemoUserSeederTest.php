<?php

use App\Models\Team;
use App\Models\User;
use Database\Seeders\DemoUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

pest()->use(RefreshDatabase::class);

test('demo user seeder creates the demo user with a personal team', function () {
    $this->seed(DemoUserSeeder::class);

    $user = User::query()
        ->with('currentTeam')
        ->where('email', 'demo@example.test')
        ->firstOrFail();

    expect($user->name)->toBe('Demo User');
    expect($user->currentTeam)->toBeInstanceOf(Team::class);
    expect($user->currentTeam?->name)->toBe("Demo User's Team");
    expect($user->currentTeam?->is_personal)->toBeTrue();
    expect($user->personalTeam()?->id)->toBe($user->currentTeam?->id);
});
