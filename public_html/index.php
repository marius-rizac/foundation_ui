<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

$app = new \Silex\Application();
$app['debug'] = true;

$app->register(new \Silex\Provider\TwigServiceProvider(), [
    'twig.path' => dirname(__DIR__) . '/src/Spryker/Presentation/',
    'twig.options' => [
        'debug' => true,
    ]
]);

$app['twig']->addExtension(new Twig_Extension_Debug());

$app->get('/', function() use ($app){
    return $app['twig']->render('layout.twig');
});

$app->run();
