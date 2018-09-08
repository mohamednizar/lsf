<?php


$router = new Phroute\RouteCollector(new Phroute\RouteParser);


$router->group( ['prefix'=>'v2'],  function($router){
     
    /** 
     * Swagger documentation
     */

    
    $router->any('v2', function () {
        $api = new \Controllers\ApiController();
        return ($api->get());
    });

    $router->filter('auth', function () {
        $auth = new Lib\Auth();
        if (!$auth->isValidToken()) {
            return 1;
        }
    });
    
    $router->group(array('before' => 'auth'), function ($router) {
        $router->get('v2/user/{id}', function ($id) {
            $user = new Controllers\UserController();
            return $user->get($id);
        });
    
    });
    

    $router->post('v2/user/register',function(){
        $user = new \Controllers\UserController();
        return $user->post();
    });

    $router->post('v2/user/login', function () {
        $login = new \Controllers\LoginController();
        return $login->post();
    });

  
    
});

