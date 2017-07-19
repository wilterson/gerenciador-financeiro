<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 19/07/2017
 * Time: 19:00
 */

namespace GENFin\Plugins;

use GENFin\ServiceContainerInterface;

interface PluginInterface
{

    public function register(ServiceContainerInterface $container);

}