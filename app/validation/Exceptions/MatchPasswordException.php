<?php


namespace App\validation\Exceptions;

use Respect\Validation\Exceptions\ValidationException;



class MatchPasswordException extends ValidationException
{

    public static $defaultTemplate =[
        self::MODE_DEFAULT =>[

            self::STANDARD => 'does not much',

       
        ],
    ];

}