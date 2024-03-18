<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCreateRequest;
use App\Http\Resources\PostResource;
use App\Models\Company;
use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;

class MessageBoardController extends Controller
{
    public function index(Company $company): Response
    {
        return Inertia::render('Company/MessageBoard');
    }

    public function create(Company $company): Response
    {
        return Inertia::render('Company/PostCreate');
    }

    public function store(Company $company, PostCreateRequest $request)
    {

    }

    public function edit(Company $company, Post $post): Response
    {
        return Inertia::render('Company/PostEdit', [
            'post' => new PostResource($post),
        ]);
    }
}
