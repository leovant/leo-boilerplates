<?php
use \Phalcon\Mvc\Micro\Collection;

/**
 * Set a collection of routes.
 */
return call_user_func(function () {
    $collection = new Collection();
    $collection
        ->setPrefix('/')
        ->setHandler(new \API\Controllers\PingController());
    
    $collection->get('ping', 'ping');

    return $collection;
});
