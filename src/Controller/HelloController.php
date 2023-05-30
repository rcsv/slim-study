<?php
// HelloController.php
declare(strict_types=1);

namespace Rcsvpg\Murls\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Container\ContainerInterface;

use Slim\Views\Twig;

class HelloController
{
    private $container ;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function sayHello(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $name = $args['name'] ?? 'World';
        $response->getBody()->write('Hello, ' . $name . '!');
        return $response;
    }
}