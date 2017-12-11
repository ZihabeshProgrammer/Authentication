<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class User extends Model{

        protected $table = 'user';

        protected $fillable =[
            'email',
            'username',
            'password',
        ];


        public function setPassword($password)
        {
            $this->update([
                
            'password' => password_hash($password, PASSWORD_DEFAULT)

            ]);
        }

}