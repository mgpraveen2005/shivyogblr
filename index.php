<?php

require 'vendor/autoload.php';
include 'modules/common.php';
include 'modules/db_methods.php';

mb_internal_encoding('UTF-8');

$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Smarty()
));

require 'config.php';

$view = $app->view();
$view->parserDirectory = dirname(__FILE__) . '/vendor/smarty';
$view->parserCompileDirectory = dirname(__FILE__) . '/templates/_compiled';
$view->parserCacheDirectory = dirname(__FILE__) . '/templates/_cache';

$response = $app->response();

$response['Content-type'] = 'text/html; charset=utf-8';

$app->notFound(function () use ($app) {
    $app->render('templates/404.html',array(
        'canonical_url' => '',
    ));
});

$app->error(function (\Exception $e) use ($app) {

    error_log($e);

    return $app->render('templates/500.html',array(
        'canonical_url' => '',
    )); 
});

include_once 'routes/homepage.php';
include_once 'routes/admin.php';

$app->run();
