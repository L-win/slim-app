<?php

session_start();

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\App([
    'settings' => [
        'displayErrorDetails' => true
    ]
] );


$container = $app -> getContainer( );
$container['view'] = new \Slim\Views\PhpRenderer('views/', ['cache' => 'cache/' ]);
$container['flash'] = function () {return new \Slim\Flash\Messages();};
?>