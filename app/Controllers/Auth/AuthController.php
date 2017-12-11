<?php

namespace App\Controllers\Auth;

use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;


class AuthController extends Controller
{

    public  function    getSignOut($request, $response)
    {
            $this->auth->logout();

            return $response->withRedirect($this->router->pathFor('home'));
            
    }

    public function getSignIn($request, $response)
    {

        return $this->view->render($response, 'auth/signin.twig');
        
    }


    public function postSignIn($request, $response)
    {
        $auth = $this->auth->attempt(
                $request->getParam('email'),

                $request->getParam('password')

        ); 

        if(!$auth){
            $this->flash->addMessage('error', 'Wrong Details');
            
            return $response->withRedirect($this->router->pathFor('auth.signin'));
           
        }

        return $response ->withRedirect($this->router->pathFor('home'));
    }

    public function getSignUp($request, $response){
            return $this->view->render($response, 'auth/signup.twig');
         }
    
    public function postSignUp($request, $response)
    {

        $val = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->UserAvailable(),
            'username' => v::notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),

        ]);

        if($val->failed()){

            return $response->withRedirect($this->router->pathfor('auth.signup'));
            
        }


       $user = User::create([
            'email' => $request->getparam('email'),
            'username' => $request->getparam('username'),
            'password'=> password_hash($request->getparam('password'), PASSWORD_DEFAULT),
        ]);

        $this->flash->addMessage('info', 'you have signed up successfully');

        $this->auth->attempt($user->email, $request->getParam('password'));

        return $response->withRedirect($this->router->pathfor('home'));
    }

}