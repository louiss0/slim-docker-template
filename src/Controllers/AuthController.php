<?php


namespace Src\Controllers;

use Lcobucci\JWT\Configuration;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Src\Interfaces\IAuthController;
use Src\Utils\Classes\AuthValidator;

use function Src\Utils\Functions\sign_token;

class AuthController implements IAuthController
{


    public function __construct(
        private AuthValidator $authValidator,
        private Configuration $configuration,
    ) {
    }

    public function signIn(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $body = $request->getBody();

        $this->authValidator->validateEmailAndPassword($body);




        $token = sign_token(
            $this->configuration,
            $body
        );




        return $response;
    }

    function signUp(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $body = $request->getBody();

        $this->authValidator->validateNameEmailAndPassword($body);


        return $response;
    }

    function forgotPassword(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $body = $request->getBody();

        $this->authValidator->validateEmail($body);


        return $response;
    }

    function resetPassword(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $body = $request->getBody();

        $this->authValidator->validatePasswordAndPasswordConfirm($body);

        return $response;
    }

    function updatePassword(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {

        $body = $request->getBody();

        $this->authValidator->validatePasswordCurrentPasswordAndPasswordConfirm($body);


        return $response;
    }
}
