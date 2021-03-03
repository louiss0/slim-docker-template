<?php



namespace Src\Utils\Functions;

use Psr\Http\Message\StreamInterface as Body;
use Slim\Exception\HttpUnauthorizedException;
use Valitron\Validator as V;

function use_valitron_to_validate_fields_to_rules(Body $body,  array $fields)
{
    # code...

    $valitron = new V($body);


    $valitron->mapFieldsRules($fields);


    $validation_fails = !$valitron->validate();

    if ($validation_fails) {


        throw $valitron->errors();
    }
}
