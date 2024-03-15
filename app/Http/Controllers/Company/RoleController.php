<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Inertia\Inertia;
use Inertia\Response;

class RoleController extends Controller
{
    public function index(Company $company): Response
    {
        return Inertia::render('Company/RoleIndex', [
            // 'teams' => TeamResource::collection($company->teams),
        ]);
    }
}
