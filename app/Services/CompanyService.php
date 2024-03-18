<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;

class CompanyService
{
    /**
     * Create a new company for current user.
     */
    public function create(string $name, string $description, User $owner): Company
    {
        $company = Company::create([
            'name' => $name,
            'description' => $description,
        ]);

        $this->attachUser(
            company: $company,
            user: $owner
        );

        return $company;
    }

    /**
     * Attach users to a company.
     */
    public function attachUsers(Company $company, array $userIds): void
    {
        $company->users()->attach($userIds);
    }

    /**
     * Attach an user to a company.
     */
    public function attachUser(Company $company, User $user): void
    {
        $company->users()->attach($user);
    }
}
