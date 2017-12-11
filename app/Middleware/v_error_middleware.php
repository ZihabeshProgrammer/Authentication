<?php


namespace App\Middleware;
//session_start();

class v_error_middleware extends Middleware
{

    public function __invoke($request, $response, $next)
    {
        if(isset($_SESSION['errors'])){
         $this->container->view->getEnvironment()->addGlobal('errors', $_SESSION['errors']);

        }

            $response = $next($request, $response);

            return $response;
        }


}