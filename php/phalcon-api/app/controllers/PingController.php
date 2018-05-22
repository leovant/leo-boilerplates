<?php

namespace API\Controllers;

class PingController extends BaseController
{
    public function ping()
    {
        $this->response
            ->setStatusCode(200, 'OK')
            ->setContentType('application/json', 'UTF-8')
            ->setContent('pong');
        return $this->response;
    }
}
