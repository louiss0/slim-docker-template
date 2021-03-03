<?php

namespace Src\Utils\Functions;

use Psr\Http\Message\ResponseInterface as Response;
use Src\Enums\CommonHTTPStatusCodes;

function send_json(
    Response $response,
    array $json,
    $status_code = CommonHTTPStatusCodes::OK
): Response {
    # code...

    $response
        ->withStatus($status_code)
        ->getBody()
        ->write(json_encode($json));


    return $response;
}
