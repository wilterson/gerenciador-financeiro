<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 19/07/2017
 * Time: 20:33
 */

namespace GENFin\Plugins;


use GENFin\ServiceContainerInterface;
use Psr\Container\ContainerInterface;

class ViewPlugin implements PluginInterface
{
    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container){
            $loader = new \Twig_Loader_Filesystem(__DIR__.'/../../templates');
            $twig = new \Twig_Environment($loader);
            return $twig;
        });
    }
}