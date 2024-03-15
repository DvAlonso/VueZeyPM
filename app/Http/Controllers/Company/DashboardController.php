<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Company/Dashboard');
    }
}
