<?php

namespace App;
use App\DB;
use App\Routing\Router;


class App
{
    private static DB $db;

    public function __construct(protected Router $router, protected array $request, protected Config $config)
    {
        self::$db = new DB($this->config->db);
    }


    public static function db() : DB
    {
        return static::$db;
    }


    public function run()
    {
        try {
            echo  $this->router->resolve(
                $this->request['uri'],
                $this->request['method']
            );
        } catch (\App\Exception\RouteNotFoundException $th) {
            // header('HTTP/1.1 404 Not Found');
            http_response_code(404);
            echo( View::render('Errors/404') );
        }
    }
}
