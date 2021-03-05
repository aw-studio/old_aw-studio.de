<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * Routes that should not be tested (without prefix "/").
     *
     * @var array
     */
    protected $blacklist = [
        'admin',
        'api',
        'sanctum',
        'livewire',
        '_debugbar',
    ];

    /**
     * A basic test for public routes.
     *
     * @return void
     */
    public function test_no_public_route_returns_an_unexpected_response()
    {
        $routeCollection = Route::getRoutes();

        foreach ($routeCollection as $route) {
            if (! $this->routeShouldBeTested($route)) {
                continue;
            }
            $response = $this->get($route->uri);
            $this->assertNotEquals(500, $response->getStatusCode());
            $this->assertNotEquals(404, $response->getStatusCode());
        }
    }

    /**
     * Check if a routes should be tested.
     *
     * @param  [type] $route
     * @return bool
     */
    protected function routeShouldBeTested($route): bool
    {

        // Don't test post routes etc. right here
        if (! in_array('GET', $route->methods())) {
            return false;
        }

        // Don't test routes requiring a dynamic paramter
        $dynamicReg = '/{\\S*}/';

        if (preg_match($dynamicReg, $route->uri)) {
            return false;
        }

        // Ignore routes started with a blacklisted route / prefix
        foreach ($this->blacklist as $blacklistedRoute) {
            if (Str::startsWith($route->uri, $blacklistedRoute)) {
                return false;
            }
        }

        return true;
    }
}
