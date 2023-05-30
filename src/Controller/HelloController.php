<?php
// HelloController.php
declare(strict_types=1);

namespace Rcsvpg\Murls\Controller;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Container\ContainerInterface;

use Slim\Views\Twig;

class HelloController
{
    private $container ;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function sayHello(Request $request, Response $response, array $args): Response
    {
        $name = $args['name'] ?? 'World';
        $response->getBody()->write('Hello, ' . $name . '!');
        return $response;
    }

    public function sayHelloWithTemplate(Request $request, Response $response, array $args) : Response
    {
        $name = $args['name'] ?? 'World';
        $twig = $this->container->get('view');
        return $twig->render($response, 'hello.html.twig', ['name' => $name]);
    }

}
