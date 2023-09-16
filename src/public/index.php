<?php
declare(strict_types=1);

$current_directory = __DIR__;

$current_directory = explode('\\', $current_directory);
array_pop($current_directory);
array_pop($current_directory);
$current_directory = implode('/', $current_directory);

require $current_directory . DIRECTORY_SEPARATOR . 'vendor/autoload.php';


$ar_fields = [
    // new \App\Classes\Fields\Field('baseField'),  //ELIMINATA PERCHÈ TRASFORMATA IN ASTRATTA
    new \App\Classes\Fields\Text('textField'),
    // new \App\Classes\Fields\Boolean('booleandField'),    //ELIMINATA PERCHÈ TRASFORMATA IN ASTRATTA
    new \App\Classes\Fields\Checkbox('checkboxField'),
    new \App\Classes\Fields\Radio('radioField'),
];


foreach ($ar_fields as $key => $field) {
    echo $field->render() . '<br>';
}