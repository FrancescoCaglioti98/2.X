<?php

declare(strict_types=1);

use App\Routing\Router;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$base_path = implode('/', $current_directory);

require $base_path . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
define( 'STORAGE_PATH', $base_path . DIRECTORY_SEPARATOR . 'Storage' );
define( 'VIEW_PATH', $base_path . DIRECTORY_SEPARATOR . 'Views' );

session_start();

$router = new Router();

$router
    ->get('/', [App\Controllers\HomeController::class, 'index'])
    ->get('/invoices', [App\Controllers\InvoicesController::class, 'index'])
    ->get('/invoices/create', [App\Controllers\InvoicesController::class, 'createInvoice'])
    ->post('/invoices/create', [App\Controllers\InvoicesController::class, 'store'])
    ->post('/upload', [App\Controllers\HomeController::class, 'upload']);

$router->get('/secondHome', function () {
    echo 'Home';
});
$router->get('/invoices', function () {
    echo 'Invoices';
});

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER["REQUEST_METHOD"]);

// var_dump($_SESSION);