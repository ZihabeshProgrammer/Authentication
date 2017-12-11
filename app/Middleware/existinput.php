<?php


namespace App\Middleware;


class existinput extends Middleware
{

    public function __invoke($request, $response, $next)
    {
         $this->container->view->getEnvironment()->addGlobal('old', $_SESSION['old']);

         $_SESSION['old'] = $request->getparams();

            $response = $next($request, $response);

            return $response;
        }


}