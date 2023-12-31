<?php

declare(strict_types=1);

use App\App;
use App\Config;
use App\View;
use App\Routing\Router;
use App\Exception\RouteNotFoundException;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$base_path = implode('/', $current_directory);

require $base_path . DIRECTORY_SEPARATOR . 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable($base_path);
$dotenv->load();

define('STORAGE_PATH', $base_path . DIRECTORY_SEPARATOR . 'Storage');
define('VIEW_PATH', $base_path . DIRECTORY_SEPARATOR . 'Views');

session_start();

$router = new Router();
$router
    ->get('/', [\App\Controllers\HomeController::class, 'index'])
    ->get('/download', [\App\Controllers\HomeController::class, 'download'])
    ->get('/invoices', [\App\Controllers\InvoicesController::class, 'index'])
    ->get('/invoices/create', [\App\Controllers\InvoicesController::class, 'createInvoice'])
    ->post('/invoices/create', [\App\Controllers\InvoicesController::class, 'store'])
    ->post('/upload', [\App\Controllers\HomeController::class, 'upload']);


$request = [ 
    'uri' => $_SERVER["REQUEST_URI"], 
    'method' => $_SERVER["REQUEST_METHOD"]
];


$config = new Config( $_ENV );

(new App($router, $request, $config ))->run();