
<?php


namespace Src\Routes;

use Slim\Routing\RouteCollectorProxy;
use Src\Controllers\AuthController;
use Src\Enums\Paths;

function auth_router(RouteCollectorProxy $group)
{
    # code...


    $group->post(
        Paths::SIGN_IN,
        [AuthController::class, AuthController::SIGN_IN]
    );
    $group->post(
        Paths::SIGN_UP,
        [AuthController::class, AuthController::SIGN_UP]
    );

    $group->post(
        Paths::FORGOT_PASSWORD,
        [AuthController::class, AuthController::FORGOT_PASSWORD]
    );

    $group->patch(
        Paths::RESET_PASSWORD,
        [AuthController::class, AuthController::RESET_PASSWORD]
    );

    $group->patch(
        Paths::UPDATE_PASSWORD,
        [AuthController::class, AuthController::UPDATE_PASSWORD]
    );
}
