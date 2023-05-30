<?php
// container.php (DI Container Settings)
declare(strict_types=1);

// make twig setting with DI\ContainerBuilder
use DI\Container;
use Slim\Views\Twig;
use Slim\Factory\AppFactory;

// logger
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$container = new Container();
$container->set('view', 
    function () {
        $twig = Twig::create(__DIR__ . '/../templates');
        return $twig;
    });
$container->set('logger', 
    function () {
        $logger = new Logger('murls_logger_debug');
        $file_handler = new StreamHandler(__DIR__ . '/../var/logs/app.log');
        $logger->pushHandler($file_handler);
        return $logger;
    });

// set container to AppFactory
AppFactory::setContainer($container);
