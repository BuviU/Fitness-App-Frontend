<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\API\v1\Auth\User\UserAuthController;
use App\Controllers\API\v1\User\UserProfileController;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/************ API (V1) ENDPOINTS *************/

$routes->group('v1', function ($routes) {
    // Auth Routes
    $routes->group('auth', function ($routes) {
        $routes->post('login', [UserAuthController::class, 'login']); // route : base_url/api/v1/auth/login
        $routes->post('refreshToken', [UserAuthController::class, 'refreshToken']); // route : base_url/api/v1/auth/refreshToken
        $routes->post('register', [UserAuthController::class, 'register']); // route : base_url/api/v1/auth/register
    });
    // User Routes
    $routes->group('user', function ($routes) {
        $routes->group('profile', function ($routes) {
            $routes->get('/', [UserProfileController::class, 'getProfile']); // route : base_url/api/v1/user/profile?username=user@email.com
        });
        $routes->get('profileDetails', [UserProfileController::class, 'profileDetails']); // route : base_url/api/v1/user/profileDetails?username=user@email.com
    });
});
