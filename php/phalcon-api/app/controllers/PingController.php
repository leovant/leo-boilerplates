<?php

namespace API\Controllers;

class PingController extends BaseController
{
    public function ping()
    {
        $this->response->setStatusCode(200, 'OK')->setContent('pong');
        return $this->response;
    }
}
