<?php

namespace App\Controllers;

use App\View;

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

        return (string) View::render('index', [ 'foo'=> 'bar' ]);

    }

    public function download()
    {
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.pdf"');
        readfile( STORAGE_PATH . '/FILE_NAME' );
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
