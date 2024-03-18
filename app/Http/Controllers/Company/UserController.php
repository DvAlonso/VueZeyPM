<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Company;
use Inertia\Inertia;
use Inertia\Response;

class UserController extends Controller
{
    public function index(Company $company): Response
    {
        return Inertia::render('Company/UserIndex', [
            'users' => UserResource::collection($company->users),
        ]);
    }
}
