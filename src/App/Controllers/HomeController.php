<?php
namespace App\Controllers;

use App\App;
use App\View;
use App\Models\User;
use App\Models\SignUp;
use App\Models\Invoice;

class HomeController
{
    public function index(): string
    {

        
        $db = App::db();

        $email  = 'Jhonny@doe.com';
        $name   = 'Jhonny Doe';
        $amount = 25;


        $userModel = new User();
        $invoiceModel = new Invoice();

        $userInfo = [
            "email" => $email,
            "name" => $name
        ];

        $invoiceInfo = [
            "amount" => $amount
        ];


        $invoiceId = ( new SignUp( $userModel, $invoiceModel ) )->register( $userInfo, $invoiceInfo );

        return (string) View::render('index', ['invoice' => $invoiceModel->find( $invoiceId ) ]);
        
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
