<?php


namespace App\Controllers;  

use App\Models\User;
use  \Slim\Views\Twig as View;

class H_control extends controller
{


    public function index($request, $response){   

    //$user = User::find(1);

    //var_dump($user->email);
   // die();
        //$this->flash->addMessage('error', 'test flah message');

       return $this->view->render($response, 'home.twig');
    }

}