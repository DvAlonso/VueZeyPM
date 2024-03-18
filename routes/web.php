<?php

use App\Http\Controllers\Company\DashboardController;
use App\Http\Controllers\Company\MessageBoardController;
use App\Http\Controllers\Company\RoleController;
use App\Http\Controllers\Company\TeamController;
use App\Http\Controllers\Company\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LauncherController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\EnsureUserBelongsToCompany;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('launcher')->group(function () {
        Route::get('/', [LauncherController::class, 'show'])->name('app.launcher');
        Route::get('/create-company', [CompanyController::class, 'create'])->name('app.companies.create');
        Route::post('/create-company', [CompanyController::class, 'store'])->name('app.companies.store');
        Route::get('/join-company', [LauncherController::class, 'showJoinCompany'])->name('app.launcher.join');
    });

    // This routes require the user to belong to the company
    Route::prefix('{company}')->middleware(EnsureUserBelongsToCompany::class)->group(function () {

        // Company routes
        Route::get('dashboard', [DashboardController::class, 'show'])->name('app.companies.dashboard');

        // Team  management
        Route::prefix('teams')->group(function () {
            Route::get('/', [TeamController::class, 'index'])->name('app.teams.index');
            Route::get('/create', [TeamController::class, 'create'])->name('app.teams.create');
            Route::post('/store', [TeamController::class, 'store'])->name('app.teams.store');
            // Route::get('/{team}', ShowTeam::class)->name('app:teams:show');
            // Route::get('/{team}/edit', UpdateTeam::class)->name('app:teams:update');
        });

        // User management
        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('app.users.index');
            // Route::get('/create', CreateTeam::class)->name('app:teams:create');
            // Route::get('/{team}', ShowTeam::class)->name('app:teams:show');
            // Route::get('/{team}/edit', UpdateTeam::class)->name('app:teams:update');
        });

        Route::prefix('message-board')->group(function () {
            Route::get('/', [MessageBoardController::class, 'index'])->name('app.message-board.index');
            Route::get('/create', [MessageBoardController::class, 'create'])->name('app.message-board.create');
            Route::post('/store', [MessageBoardController::class, 'store'])->name('app.message-board.store');
            Route::get('/{post}/edit', [MessageBoardController::class, 'edit'])->name('app.message-board.edit');
            Route::post('/{post}/update', [MessageBoardController::class, 'update'])->name('app.message-board.update');
        });

        // Role management
        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('app.roles.index');
            // Route::get('/create', CreateTeam::class)->name('app:teams:create');
            // Route::get('/{team}', ShowTeam::class)->name('app:teams:show');
            // Route::get('/{team}/edit', UpdateTeam::class)->name('app:teams:update');
        });
    });

    // Format these
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
