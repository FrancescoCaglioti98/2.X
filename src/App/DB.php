<?php
namespace App;

use PDO;
use PDOException;

class DB
{

    private $pdo;
    
    public function __construct( array $config )
    {

        try {


            $defaultOptions = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];

            $this->pdo = new PDO(
                $config["driver"] . ':host='. $config["host"] .';dbname=' . $config["db_name"],
                $config["user"],
                $config["pass"],
                $config["options"] ?? $defaultOptions
            );

        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

    }

    public function __call( string $name, array $arguments )
    {
        return call_user_func_array( [$this->pdo, $name], $arguments );
    }

}
