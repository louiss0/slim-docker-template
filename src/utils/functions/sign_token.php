<?php

namespace Src\Utils\Functions;

use DateTimeImmutable;
use Lcobucci\JWT\Configuration;

function sign_token(
    Configuration $configuration,
    $user,
    $now = new DateTimeImmutable()
): string {
    # code...

    extract($user);

    $key = $configuration->signingKey();

    $signer = $configuration->signer();

    return $configuration
        ->builder()
        ->withClaim("email", $email)
        ->withClaim("id", $id)
        ->withClaim("role", $role)
        ->expiresAt($now->modify("+90 days"))
        ->getToken($signer, $key)
        ->toString();
}
