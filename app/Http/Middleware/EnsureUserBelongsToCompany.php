<?php

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserBelongsToCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $company = $request->route()->parameter('company');
        if (! $company instanceof Company) {

            $company = Company::find($request->route()->parameter('company'));
        }

        if (! $company->users()->where('user_id', $request->user()->id)->exists()) {
            return redirect()->route('app.launcher');
        }

        return $next($request);
    }
}
