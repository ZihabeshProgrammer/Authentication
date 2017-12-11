<?php


namespace App\validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;



class UserAvailableException extends ValidationException
{

    public static $defaultTemplate =[
        self::MODE_DEFAULT =>[

            self::STANDARD => 'Email is already taken',

        ],
    ];

}