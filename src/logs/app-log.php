[2021-03-02T17:41:52.062302+00:00] request-logger.DEBUG:              Request received with              1.1://localhost8000             Method GET          {"host":"localhost","method":"GET","protocolVersion":"1.1","port":8000} {"uid":"96effda"}
[2021-03-02T17:49:29.476810+00:00] request-logger.DEBUG:              Request received with              1.1://localhost8000             Method GET          {"host":"localhost","method":"GET","protocolVersion":"1.1","port":8000} {"uid":"c6a900b"}
[2021-03-02T17:49:31.536873+00:00] error-logger.ERROR: 404 Not Found Type: Slim\Exception\HttpNotFoundException Code: 404 Message: Not found. File: /var/www/html/vendor/slim/slim/Slim/Middleware/RoutingMiddleware.php Line: 91 Trace: #0 /var/www/html/vendor/slim/slim/Slim/Middleware/RoutingMiddleware.php(58): Slim\Middleware\RoutingMiddleware->performRouting(Object(Slim\Psr7\Request)) #1 /var/www/html/vendor/slim/slim/Slim/MiddlewareDispatcher.php(147): Slim\Middleware\RoutingMiddleware->process(Object(Slim\Psr7\Request), Object(Slim\Routing\RouteRunner)) #2 /var/www/html/vendor/slim/slim/Slim/Middleware/BodyParsingMiddleware.php(68): Psr\Http\Server\RequestHandlerInterface@anonymous->handle(Object(Slim\Psr7\Request)) #3 /var/www/html/vendor/slim/slim/Slim/MiddlewareDispatcher.php(147): Slim\Middleware\BodyParsingMiddleware->process(Object(Slim\Psr7\Request), Object(Psr\Http\Server\RequestHandlerInterface@anonymous)) #4 /var/www/html/Middleware/RequestLoggerMiddleware.php(51): Psr\Http\Server\RequestHandlerInterface@anonymous->handle(Object(Slim\Psr7\Request)) #5 /var/www/html/vendor/slim/slim/Slim/MiddlewareDispatcher.php(147): Src\Middleware\RequestLoggerMiddleware->process(Object(Slim\Psr7\Request), Object(Psr\Http\Server\RequestHandlerInterface@anonymous)) #6 /var/www/html/vendor/slim/slim/Slim/Middleware/ErrorMiddleware.php(107): Psr\Http\Server\RequestHandlerInterface@anonymous->handle(Object(Slim\Psr7\Request)) #7 /var/www/html/vendor/slim/slim/Slim/MiddlewareDispatcher.php(147): Slim\Middleware\ErrorMiddleware->process(Object(Slim\Psr7\Request), Object(Psr\Http\Server\RequestHandlerInterface@anonymous)) #8 /var/www/html/vendor/slim/slim/Slim/MiddlewareDispatcher.php(81): Psr\Http\Server\RequestHandlerInterface@anonymous->handle(Object(Slim\Psr7\Request)) #9 /var/www/html/vendor/slim/slim/Slim/App.php(215): Slim\MiddlewareDispatcher->handle(Object(Slim\Psr7\Request)) #10 /var/www/html/vendor/slim/slim/Slim/App.php(199): Slim\App->handle(Object(Slim\Psr7\Request)) #11 /var/www/html/index.php(24): Slim\App->run() #12 {main} [] {"uid":"c6a900b"}
