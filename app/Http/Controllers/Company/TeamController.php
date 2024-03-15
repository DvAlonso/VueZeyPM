<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\TeamCreateRequest;
use App\Http\Resources\TeamResource;
use App\Models\Company;
use App\Services\TeamService;
use Inertia\Inertia;
use Inertia\Response;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Company $company): Response
    {
        return Inertia::render('Company/TeamIndex', [
            'teams' => TeamResource::collection($company->teams()->with([
                'users' => fn($query) => $query->limit(5)
            ])->get()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company): Response
    {
        return Inertia::render('Company/TeamCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamCreateRequest $request, Company $company, TeamService $service)
    {
        $service->createTeam(
            company: $company,
            name: $request->name,
            description: $request->description,
        );

        return redirect()->route('app.teams.index', $company);
    }
}
