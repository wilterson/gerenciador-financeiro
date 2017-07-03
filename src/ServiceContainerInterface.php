<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 03/07/2017
 * Time: 08:36
 */

declare(strict_types=1);

namespace GENFin;

interface ServiceContainerInterface
{
    public function add(string $name, $service);

    public function addLazy(string $name, callable $callable);

    public function get(string $name);

    public function has(string $name);
}