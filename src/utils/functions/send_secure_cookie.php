<?php

namespace Src\Utils\Functions;



function send_secure_cookie(
    string $name,
    $expires = time() + intval(24 * 60 ** 2 * 1000 * 90),
    string $phpEnv = $_ENV["PHP_ENV"]
) {
    # code...

    $cookieOptions = [
        "secure" => false,
        "httpOnly" => true,
        "expires" => $expires,
    ];

    if ($phpEnv === "production") {

        $cookieOptions["secure"] = true;

        return setcookie(
            name: $name,
            options: $cookieOptions
        );
    }

    setcookie(name: $name, options: $cookieOptions);
}
