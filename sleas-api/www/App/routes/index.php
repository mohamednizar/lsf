<?php

include 'user.route.php';


$dispatcher = new Phroute\Dispatcher($router);

try {

    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], ($_SERVER['REQUEST_URI']));

} catch (Phroute\Exception\HttpRouteNotFoundException $e) {

    print_r($e);
    die();

} catch (Phroute\Exception\HttpMethodNotAllowedException $e) {

    print_r($e);
    die();

}
