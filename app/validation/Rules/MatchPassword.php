<?php


namespace App\validation\Rules;


use Respect\Validation\Rules\AbstractRule;

use App\Models\user;

class MatchPassword extends AbstractRule
{
    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function validate($input)
    {
        
        return password_verify($input, $this->password);

     }



}