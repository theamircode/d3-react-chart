<?php

declare(strict_types=1);

$autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (!file_exists($autoload)) {
    http_response_code(500);
    echo 'Composer autoload file is missing. Please run "composer install" in the project root.';
    exit;
}

require $autoload;

use Core\App;

$app = new App();
$app->run();
