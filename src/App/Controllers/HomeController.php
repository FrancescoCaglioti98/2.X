<?php

namespace App\Controllers;

use App\View;
use Exception;
use PDO;
use PDOException;

class HomeController
{
    public function index(): string
    {

        /**
         * La variabile $_REQUEST contiene tutte le informazioni prese da $_GET, $_POST e $_COOKIE e le propone come un unico array
         * 
         * Nota bene:
         *      - Se sono presenti gli stessi indici sia in $_GET che in $_POST vinceranno sempre quelli di $_POST
         *
         * $_POST["amount"] => 100
         * $_GET["amount"] => 250
         * 
         * $_REQUEST["amount"] => 100
         * 
         * 
         * Nota bene pt2:
         *      - La presenza/ordine di alcune di queste variabili dipende dalla configurazione del file php.ini
         *        Di base, per esempio, non viene accorpato il $_COOKIE per motivi di sicurezza
         * 
         * Le variabili di gestione per il php.ini sono:
         *      -request_order
         *      - variables_order
         * 
         * Generalmente non è consigliato utilizzare $_REQUEST a meno a che non siano presenti delle ottime attenuanti
         * 
         */
        // echo'<pre>';var_dump($_REQUEST);echo'</pre>';
        // echo'<pre>';var_dump($_GET);echo'</pre>';

        // echo'<pre>';var_dump($_POST);echo'</pre>';

        // $_SESSION['count'] = ( $_SESSION["count"] ?? 0 ) + 1;
        // setcookie('userId', 15, time() + 10, "/", '', false, false);

        // return ( new View('index') )->render();


        try {

            $db = new PDO(
                'mysql:host='. $_ENV["DB_HOST"] .';dbname=' . $_ENV["DB_DATABASE"],
                $_ENV["DB_USER"],
                $_ENV["DB_PASS"],
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]
            );

        } catch (\PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        $email  = 'jonny@doe.com';
        $name   = 'John Doe';
        $amount = 25;


        try {
            $db->beginTransaction();

            $newUserInsert = $db->prepare(
                "INSERT INTO users ( email, full_name, is_active, created_at )
                VALUES ( ?, ?, 1, NOW() )"
            );
    
            $newInvoiceInsert = $db->prepare(
                "INSERT INTO invoices ( amount, user_id )
                VALUES ( ?, ? )"
            );
    
            $newUserInsert->execute([ $email, $name ]);
            $userID = (int) $db->lastInsertId();
    
            throw new Exception('TEST');

            $newInvoiceInsert->execute([$amount, $userID]);
    
            $db->commit();
        } catch (\Throwable $th) {
            if( $db->inTransaction() ){
                $db->rollBack();
            }
        }

        $fetch = $db->prepare(
            "SELECT invoices.id as invoice_id,
                    amount,
                    user_id,
                    full_name
            FROM    invoices
            INNER JOIN users ON user_id = users.id
            WHERE   email = ?"
        );

        $fetch->execute([$email]);

        echo'<pre>';var_dump($fetch->fetchAll());die();

        return (string) View::render('index', ['foo' => 'bar']);
        
    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.pdf"');
        readfile(STORAGE_PATH . '/FILE_NAME');
    }

    public function upload()
    {
        $file_path = STORAGE_PATH . DIRECTORY_SEPARATOR . $_FILES["recepit"]["name"];

        move_uploaded_file(
            $_FILES["recepit"]["tmp_name"],
            $file_path
        );

        header('Location: /');
    }
}
