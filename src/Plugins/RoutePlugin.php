<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 19/07/2017
 * Time: 19:17
 */

declare(strict_types=1);

namespace GENFin\Plugins;

use Aura\Router\RouterContainer;
use GENFin\ServiceContainerInterface;
use Interop\Container\ContainerInterface;
use Psr\Http\Message\RequestInterface;
use Zend\Diactoros\ServerRequestFactory;

class RoutePlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $routerContainer = new RouterContainer();

        /* Regitra a rota da aplicação */
        $map = $routerContainer->getMap();

        /* Identifica a rota que esta sendo acessada */
        $matcher = $routerContainer->getMatcher();

        /* Gera links com base nas rotas registradas */
        $generator = $routerContainer->getGenerator();

        $request = $this->getRequest();

        /* Regitra serviços */
        $container->add('routing', $map);
        $container->add('routing.matcher', $matcher);
        $container->add('routing.generator', $generator);
        $container->add(RequestInterface::class, $request);
        $container->addLazy('route', function (ContainerInterface $container){
            $matcher = $container->get('routing.matcher');
            $request = $container->get(RequestInterface::class);
            return $matcher->match($request);
        });
    }

    protected function getRequest(): RequestInterface
    {
        return ServerRequestFactory::fromGlobals(
            $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
        );
    }
}