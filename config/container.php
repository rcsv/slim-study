<?php
// container.php (DI Container Settings)
declare(strict_types=1);

// make twig setting with DI\ContainerBuilder
use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;

$container = new Container();
$container->set('view', function() {
    $twig = Twig::create(__DIR__ . '/../templates', [
        'cache' => __DIR__ . '/../var/cache/twig',
        'debug' => true,
    ]);
});

// set container to AppFactory
AppFactory::setContainer($container);