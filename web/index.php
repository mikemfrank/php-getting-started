<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

// Our web handlers

$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('index.twig');
});

$app->get('/opt-in-poc', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['twig']->render('opt-in-poc.twig');
});

$app->get('/tracking-code', function() use($app) {
    $app['monolog']->addDebug('logging output.');
    return $app['twig']->render('tracking-code.twig');
});

$app->run();
