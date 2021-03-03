<?php

namespace Src\Utils\Functions;

use Slim\App;
use Slim\Factory\ServerRequestCreatorFactory;
use Src\Enums\ErrorMiddlewareSettings;
use Src\Enums\MonoLoggers;
use Src\Enums\SettingsStrings;
use Src\Middleware\RequestLoggerMiddleware;
use Src\Utils\Classes\HttpErrorHandler;
use Src\Utils\Classes\ShutdownHandler;

function set_global_middleware(App $app)
{
    # code...
    $callableResolver = $app->getCallableResolver();
    $responseFactory = $app->getResponseFactory();

    $container = $app->getContainer();


    $error_settings = $container
        ->get(SettingsStrings::ERROR_SETTINGS);


    $error_logger = $container->get(
        MonoLoggers::ERROR_LOGGER
    );




    $serverRequestCreator = ServerRequestCreatorFactory::create();
    $request = $serverRequestCreator->createServerRequestFromGlobals();

    $errorHandler = new HttpErrorHandler(
        $callableResolver,
        $responseFactory,
        $error_logger
    );
    $shutdownHandler = new ShutdownHandler(
        $request,
        $errorHandler,
        $error_settings[ErrorMiddlewareSettings::DISPLAY_ERROR_DETAILS]
    );

    register_shutdown_function($shutdownHandler);

    // Add Routing Middleware
    $app->addRoutingMiddleware();

    $app->addBodyParsingMiddleware();


    $request_logger_middleware =
        $container->get(RequestLoggerMiddleware::class);

    $app->addMiddleware($request_logger_middleware);


    // Add Error Handling Middleware

    // This must always be last 

    $errorMiddleware = $app->addErrorMiddleware(
        $error_settings[ErrorMiddlewareSettings::DISPLAY_ERROR_DETAILS],

        $error_settings[ErrorMiddlewareSettings::LOG_ERRORS],

        $error_settings[ErrorMiddlewareSettings::LOG_ERROR_DETAILS],
    );
    $errorMiddleware->setDefaultErrorHandler($errorHandler);
}
