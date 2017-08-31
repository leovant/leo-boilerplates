<?php
/**
 * Load the set of Phalcon\Mvc\Micro\Collection from the collections directory
 * Solution got from https://github.com/cmoore4/phalcon-rest
 */
return call_user_func(function () {
    $collections = [];
    $files = scandir(dirname(__FILE__) . '/collections');
    foreach ($files as $file) {
        $pathinfo = pathinfo($file);
        if ($pathinfo['extension'] === 'php') {
            $collection = include(dirname(__FILE__) . '/collections/' . $file);
            
            if ($collection instanceof \Phalcon\Mvc\Micro\Collection) {
                $collections[] = $collection;
            }
        }
    }
    return $collections;
});
