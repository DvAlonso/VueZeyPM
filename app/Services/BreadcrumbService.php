<?php

namespace App\Services;

use Illuminate\Http\Request;

class BreadcrumbService
{
    public static function getBreadcrumbsForRoute(Request $request): array
    {
        if (is_null($request->route()->getName())) {
            return [];
        }
        $config = self::findForRoute($request->route()->getName());
        $breadcrumbs = [];
        foreach ($config as $crumb) {
            $params = [];
            foreach ($crumb['params'] as $required_param) {
                $params[$required_param] = $request->route()->parameter($required_param);
            }
            array_push($breadcrumbs, [
                'label' => $crumb['label'],
                'route' => route($crumb['route'], $params),
            ]);
        }

        return $breadcrumbs;
    }

    private static function findForRoute(string $routeName): array
    {
        $breadcrumbs = self::breadcrumbs();

        return $breadcrumbs[$routeName] ?? [];
    }

    private static function breadcrumbs(): array
    {
        return [
            'app.companies.dashboard' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'app.companies.dashboard',
                    'params' => ['company'],
                ],
            ],
            'app.message-board.index' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'app.companies.dashboard',
                    'params' => ['company'],
                ],
                [
                    'label' => 'Message Board',
                    'route' => 'app.message-board.index',
                    'params' => ['company'],
                ],
            ],
            'app.message-board.create' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'app.companies.dashboard',
                    'params' => ['company'],
                ],
                [
                    'label' => 'Message Board',
                    'route' => 'app.message-board.index',
                    'params' => ['company'],
                ],
                [
                    'label' => 'New post',
                    'route' => 'app.message-board.create',
                    'params' => ['company'],
                ],
            ],
            'app.users.index' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'app.companies.dashboard',
                    'params' => ['company'],
                ],
                [
                    'label' => 'Users',
                    'route' => 'app.users.index',
                    'params' => ['company'],
                ],
            ],
            'app.teams.index' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'app.companies.dashboard',
                    'params' => ['company'],
                ],
                [
                    'label' => 'Teams',
                    'route' => 'app.teams.index',
                    'params' => ['company'],
                ],
            ],
            'app.teams.create' => [
                [
                    'label' => 'Dashboard',
                    'route' => 'app.companies.dashboard',
                    'params' => ['company'],
                ],
                [
                    'label' => 'Teams',
                    'route' => 'app.teams.index',
                    'params' => ['company'],
                ],
                [
                    'label' => 'Create',
                    'route' => 'app.teams.create',
                    'params' => ['company'],
                ],
            ],
        ];
    }
}
