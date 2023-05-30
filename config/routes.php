<?php
// routes.php
declare(strict_types=1);

include __DIR__ . '/../src/Controller/HelloController.php';
use Rcsvpg\Murls\Controller\HelloController;

$app->any('/', function ($request, $response, $args) {
    $response->getBody()->write('Hello, World!');
    return $response;
});

$app->any('/hello/{name}', HelloController::class . ':sayHello');
$app->any('/hello/{name}/template', HelloController::class . ':sayHelloWithTemplate');
