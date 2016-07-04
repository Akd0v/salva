<?php
use Silex\Application;

require_once __DIR__ . '/../vendor/autoload.php';


$app = new Application();
$app->get('/', function ()
{
    return 'hi';
});

$app->run();