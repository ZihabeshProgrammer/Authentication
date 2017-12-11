<?php

namespace App\validation\Rules;

use Respect\Validation\Rules\AbstractRule;

use App\Models\user;

class UserAvailable extends AbstractRule
{

    public function validate($input){

          return User::where('email', $input)->count()=== 0;
    }

}