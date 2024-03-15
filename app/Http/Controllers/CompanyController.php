<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyCreateRequest;
use App\Services\CompanyService;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CompanyController extends Controller
{
    /**
     * Show the form to create a new company.
     */
    public function create(): Response
    {
        return Inertia::render('Launcher/CreateCompany');
    }

    /**
     * Store a new company.
     */
    public function store(CompanyCreateRequest $request, CompanyService $service): RedirectResponse
    {
        $service->create(
            name: $request->name,
            description: $request->description,
            owner: $request->user()
        );

        return redirect()->to(route('app.launcher', absolute: false));
    }
}
