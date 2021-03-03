<?php

namespace Src\Utils\Classes;

use Psr\Http\Message\StreamInterface;

use function Src\Utils\Functions\use_valitron_to_validate_fields_to_rules;

class AuthValidator  implements IAuthValidator
{



    function validateEmail(StreamInterface $body): void
    {
        $fields = [
            "email" => ["email", "required"],
        ];

        use_valitron_to_validate_fields_to_rules($body, $fields);
    }

    function validatePasswordAndPasswordConfirm(StreamInterface $body): void
    {


        $fields = [
            "password" => [
                "required",
                ["lengthMin", 8],
                ["equals", ["password-confirm"]]
            ],

            "password-confirm" => [
                ["requiredWith"["password"]],
                ["lengthMin", 8]
            ],
        ];


        use_valitron_to_validate_fields_to_rules($body, $fields);
    }

    function validateNameEmailAndPassword(StreamInterface $body): void
    {
        $fields = [
            "name" => ["required",  ["different",  ["password"]]],

            "password" => ["required",  ["lengthMin", 8],],

            "email" => [
                "email",
                ["requiredWith", ["password", "name"]],
            ],
        ];


        use_valitron_to_validate_fields_to_rules($body, $fields);
    }

    public function validateEmailAndPassword(StreamInterface $body): void
    {
        $fields = [
            "password" => ["required",  ["lengthMin", 8],],
            "email" => [
                "email",
                ["requiredWith"["password"]],
            ],
        ];


        use_valitron_to_validate_fields_to_rules($body, $fields);
    }

    function validatePasswordCurrentPasswordAndPasswordConfirm(StreamInterface $body): void
    {
        $fields = [
            "password" => [
                ["requiredWith", ["password-confirm", "password-current"]],
                ["lengthMin", 8],
            ],
            "password-confirm" => [
                "required",
                ["lengthMin", 8],
                ["equals", ["password"]]
            ],
            "password-current" => [
                "required",
                ["different", ["password", "password-confirm"]]
            ]
        ];


        use_valitron_to_validate_fields_to_rules($body, $fields);
    }
}
