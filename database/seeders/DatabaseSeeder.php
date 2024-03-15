<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\CompanyService;
use App\Services\TeamService;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
        ]);

        $company_service = new CompanyService();
        $company = $company_service->create('Test Company', 'test-company', $user);

        $team_service = new TeamService();
        $team = $team_service->createTeam($company, 'Laravel developers', 'The group of users that make this application possible.', [$user->id]);

        $users = User::factory()->count(10)->create();
        $team_service->attachUsers($team, $users->pluck('id')->toArray());
    }
}
