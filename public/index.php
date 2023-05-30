<?php
// entrypoint for this application (Slim framework 4)
use Slim\Factory\AppFactory;

error_reporting(E_ALL);
ini_set('display_errors', '1');

// require composer autoload
require __DIR__ . '/../vendor/autoload.php';

// load container settings below config directory
require __DIR__ . '/../config/container.php';

// create slim app
$app = AppFactory::create();

// load routes
require __DIR__ . '/../config/routes.php';

// run app
$app->run();

