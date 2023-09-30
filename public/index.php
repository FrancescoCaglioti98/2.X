<?php
declare(strict_types=1);

use App\Routing\Router;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$router = new Router();

$router->register( '/', [App\Classes\Home::class, 'index'] )
        ->register('/invoices', [App\Classes\Invoices::class, 'index'])
        ->register('/invoices/create', [App\Classes\Invoices::class, 'createInvoice']);

        
$router->register('/secondHome', function(){
    echo 'Home';
});
$router->register( '/invoices', function(){
    echo 'Invoices';
} );

echo $router->resolve( $_SERVER['REQUEST_URI'] );