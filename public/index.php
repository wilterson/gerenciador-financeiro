<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 19/07/2017
 * Time: 19:49
 */

use GENFin\Plugins\RoutePlugin;
use GENFin\Plugins\ViewPlugin;
use GENFin\ServiceContainer;
use GENFin\Application;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequest;

require_once __DIR__ . '/../vendor/autoload.php';

$serviceContainer = new ServiceContainer();
$app = new Application($serviceContainer);

$app->plugin(new RoutePlugin());
$app->plugin(new ViewPlugin());

$app->get('/', function (RequestInterface $request) use ($app){
    $view = $app->service('view.renderer');
    return $view->render('test.html.twig', ['name' => '']);
});

$app->get('/home/{name}', function (ServerRequest $request){
    $response = new Response();
    $response->getBody()->write("response emitter");
    return $response;
});

$app->start();