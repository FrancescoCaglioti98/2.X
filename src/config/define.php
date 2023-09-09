<?php

$document_root = str_replace( '/src/public', '', $_SERVER['DOCUMENT_ROOT'] );

define( 'CLASS_FOLDER', $document_root . '/src/classes/' );


include_once CLASS_FOLDER . 'Transaction.php';