<?php
declare(strict_types=1);

use App\Routing\Router;

$current_directory = __DIR__;
$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$router = new Router();

$router->get( '/', [App\Classes\Home::class, 'index'] )
        ->get('/invoices', [App\Classes\Invoices::class, 'index'])
        ->get('/invoices/create', [App\Classes\Invoices::class, 'createInvoice'])
        ->post('/invoices/create', [App\Classes\Invoices::class, 'store']);

        
$router->get('/secondHome', function(){
    echo 'Home';
});
$router->get( '/invoices', function(){
    echo 'Invoices';
} );

echo $router->resolve( $_SERVER['REQUEST_URI'], $_SERVER["REQUEST_METHOD"] );