<?php

namespace App\Controllers;

use App\View;
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
                'mysql:host=localhost;dbname=my_db',
                'root',
                '',
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                ]
            );

            // $query = "SELECT * FROM users";

            // // $stt = $db->query( $query );
            // // $result = $stt->fetchAll();
            // // echo'<pre>';var_dump($result);die();

            // foreach ($db->query($query) as $user) {
            //     echo '<pre>';
            //     var_dump( $user );
            //     echo '</pre>';
            // }


            // $query = "SELECT * FROM users WHERE email = ?";
            // $stt = $db->prepare($query);
            // $stt->execute([$email]);

            // foreach ($stt->fetchAll() as $user) {
            //     echo '<pre>';
            //     var_dump( $user );
            //     echo '</pre>';
            // }

            // $query = "INSERT INTO users (email, full_name, is_active, created_at)
            //             VALUES( ?,?,?,?)";


            // $stt = $db->prepare($query);
            // $stt->execute([$email, $name, $isActive, $createdAt]);

            // $id = $db->lastInsertId();

            // $user = $db->query( "SELECT * FROM users WHERE id = $id" )->fetch();

            // echo'<pre>';var_dump($user);die();


            $query = "INSERT INTO users (email, full_name, is_active, created_at)
                        VALUES( :email, :full_name, :is_active, :created_at)";

            $stt = $db->prepare($query);

            $email = 'jonathan@doe.com';
            $name = "Jonny Doe";
            $isActive = 1;
            $createdAt = date('Y-m-d H:i:s');

            $stt->bindValue( ':email', $email );
            $stt->bindValue( ':full_name', $name );
            $stt->bindValue( ':is_active', $isActive, PDO::PARAM_BOOL );
            $stt->bindValue( ':created_at', $createdAt );

            $stt->execute();

            $id = $db->lastInsertId();

            $user = $db->query("SELECT * FROM users WHERE id = $id")->fetch();

            echo '<pre>';
            var_dump($user);
            die();

        } catch (\PDOException $e) {
            throw new PDOException($e->getMessage(), (int) $e->getCode());
        }

        echo '<pre>';
        var_dump($db);
        die();


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
