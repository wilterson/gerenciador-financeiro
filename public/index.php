<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 19/07/2017
 * Time: 19:49
 */

use GENFin\Plugins\RoutePlugin;
use GENFin\ServiceContainer;
use GENFin\Application;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());

$app->get('/', function (RequestInterface $request){
    var_dump($request->getUri());die();
    echo "Hello World!";
});

$app->get('/home/{name}', function (ServerRequest $request){
    echo "Home";
    echo "<br/>";
    echo $request->getAttribute('name');
    echo "<br/>";
});

$app->start();