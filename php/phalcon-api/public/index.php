<?php

require __DIR__ . '/../vendor/autoload.php';

$loader = include(__DIR__ . '/../app/config/loader.php');
$services = include(__DIR__ . '/../app/config/services.php');
// Instantiate Phalcon Micro App
$app = new \Phalcon\Mvc\Micro($services);
// Set routes
$collections = include(__DIR__ . '/../app/config/routes.php');
foreach ($collections as $collection) {
    $app->mount($collection);
}
// Set not found response
$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "OK")->sendHeaders();
});
// Set OPTIONS response (CORS)
$app->options('/{catch:(.*)}', function () use ($app) {
    $app->response->setStatusCode(200, "OK")->sendHeaders();
});

$app->handle();
