<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Database\Seeder;

class DemoUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(CreateNewUser $createNewUser): void
    {
        $createNewUser->create([
            'name' => 'Demo User',
            'email' => 'demo@example.test',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
    }
}
