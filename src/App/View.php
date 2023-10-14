<?php

namespace App;

use App\Exception\ViewNotFoundException;

class View
{

    public static function render( string $view, array $params = [] ): string
    {

        $viewPath = VIEW_PATH . DIRECTORY_SEPARATOR . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        // include VIEW_PATH . DIRECTORY_SEPARATOR . $view . '.php';


        foreach ($params as $key => $value) {
            $$key = $value;
        }


        ob_start();
        include $viewPath;
        return (string) ob_get_clean();
    }

}
