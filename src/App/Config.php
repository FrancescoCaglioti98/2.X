<?php
namespace App;


class Config
{
    
    protected array $config = [];

    public function __construct( array $env )
    {
        $this->config = [
            "db" =>
                [
                    "host" => $env["DB_HOST"],
                    "db_name" => $env["DB_DATABASE"],
                    "user" => $env["DB_USER"],
                    "pass" => $env["DB_PASS"],
                    "driver" => $env["DB_DRIVER"] ?? 'mysql'
                ]
        ];
    }

    public function __get( string $name)
    {
        return $this->config[$name] ?? null ;
    }

}
