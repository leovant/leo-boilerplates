<?php

return call_user_func(function () {
    //Loader
    $loader = new \Phalcon\Loader();
    //Register namespaces
    $loader->registerNamespaces([
        'API\Controllers'=>__DIR__ . '/../controllers/'
    ]);
    $loader->register();
    
    return $loader;
});
