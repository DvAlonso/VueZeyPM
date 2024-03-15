<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompanyResource;
use Inertia\Inertia;
use Inertia\Response;

class LauncherController extends Controller
{
    /**
     * Show the launcher.
     */
    public function show(): Response
    {
        return Inertia::render('Launcher', [
            'companies' => CompanyResource::collection(auth()->user()->companies),
        ]);
    }

    public function showJoinCompany(): Response
    {
        return Inertia::render('Launcher/JoinCompany');
    }
}
