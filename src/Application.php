<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 19/07/2017
 * Time: 18:48
 */

namespace GENFin;


class Application
{

    private $serviceContainer;

    /**
     * Application constructor.
     * @param $serviceContainer
     */
    public function __construct(ServiceContainerInterface $serviceContainer)
    {
        $this->serviceContainer = $serviceContainer;
    }

    public function service($name){
        return $this->serviceContainer->get($name);
    }

    public function addService(string $name, $service){
        if(is_callable($service)){
            $this->serviceContainer->addLazy($name, $service);
        }else{
            $this->serviceContainer->add($name, $service);
        }
    }
}