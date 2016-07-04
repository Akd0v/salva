<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$app = Application();

/*$app->get('/', function(){
    return "Hello world";
});*/

$app->get('/', function(){
    return new Symfony\Component\HttpFoundation\Response("Hello world");
});

$app['debug'] = true;

$app->run();