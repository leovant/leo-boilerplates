<?php

return call_user_func(function () {
    //Injector
    $di = new \Phalcon\DI\FactoryDefault();

    return $di;
});
