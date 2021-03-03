<?php


namespace Src\Utils\Classes;

use Psr\Http\Message\StreamInterface as Body;

interface IAuthValidator
{


    function validateEmailAndPassword(Body $body): void;
    function validateEmail(Body $body): void;

    function validateNameEmailAndPassword(Body $body): void;

    function validatePasswordAndPasswordConfirm(Body $body): void;

    function validatePasswordCurrentPasswordAndPasswordConfirm(Body $body): void;
}
