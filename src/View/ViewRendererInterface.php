<?php
/**
 * Created by PhpStorm.
 * User: Wilterson Garcia
 * Date: 23/07/2017
 * Time: 20:52
 */

declare(strict_types=1);

namespace GENFin\View;


use Psr\Http\Message\ResponseInterface;

interface ViewRendererInterface
{
    public function render(string $template, array $context = []): ResponseInterface;
}