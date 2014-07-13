<?php
$app->get('/', function() use ($app) {
    $content = file_get_contents('pages/home.html');
    $app->render('../templates/home.tpl', array(
        'title'=>'Shivirs and Satsangs',
        'content'=> $content
    ));
});

$app->get('/durga-saptashati', function() use ($app) {
    $content = file_get_contents('pages/dss.html');
    $app->render('../templates/home.tpl', array(
        'title'=>'Durga Saptashati',
        'content'=> $content
    ));
});
