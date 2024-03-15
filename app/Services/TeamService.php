<?php

namespace App\Services;

use App\Models\Company;
use App\Models\Team;

class TeamService
{
    /**
     * Create a team.
     */
    public function createTeam(Company $company, string $name, string $description, array $userIds = []): Team
    {
        $team = $company->teams()->create([
            'name' => $name,
            'description' => $description,
        ]);

        $this->attachUsers($team, $userIds);

        return $team;
    }

    /**
     * Attach users to a team.
     */
    public function attachUsers(Team $team, array $userIds): void
    {
        $team->users()->attach($userIds);
    }

    /**
     * Attach a user to a team.
     */
    public function attachUser(Team $team, int $userId): void
    {
        $team->users()->attach($userId);
    }
}
