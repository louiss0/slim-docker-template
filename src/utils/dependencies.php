<?php

use DI\Container;
use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Src\Enums\MonoLoggers;
use Src\Enums\SettingsStrings;
use Src\Middleware\RequestLoggerMiddleware;

$container = new Container();

$container->set(
    SettingsStrings::ERROR_SETTINGS,
    fn () => [
        "displayErrorDetails" => true,
        "logErrors" => true,
        "logErrorDetails" => true,
    ]
);

$container->set(
    MonoLoggers::REQUEST_LOGGER,
    function () {
        # code...

        $logger = new Logger(MonoLoggers::REQUEST_LOGGER);

        $logger
            ->pushProcessor(new UidProcessor())
            ->pushHandler(
                new StreamHandler(
                    __DIR__  . "/../logs/app-log.php",
                )
            )
            ->pushHandler(new FirePHPHandler());

        return $logger;
    }
);

$container->set(
    MonoLoggers::ERROR_LOGGER,
    function (ContainerInterface $container) {
        # code...

        $error_logger = $container->get(
            MonoLoggers::REQUEST_LOGGER
        )->withName(
            MonoLoggers::ERROR_LOGGER
        );

        $error_logger->toMonologLevel(Logger::ERROR);

        return $error_logger;
    }

);


$container->set(
    RequestLoggerMiddleware::class,
    function (ContainerInterface $container) {
        # code...

        $request_logger = $container->get(
            MonoLoggers::REQUEST_LOGGER
        );

        return new RequestLoggerMiddleware($request_logger);
    }
);








































return $container;
