<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;

class CompanyService
{
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

    public function attachUser(Company $company, User $user): void
    {
        $company->users()->attach($user);
    }
}
