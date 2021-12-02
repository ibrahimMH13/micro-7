<?php

namespace Micro7\Controllers;
use Micro7\Response;

class HomeController
{
    public  function index(Response $response){
        return $response->setBody("home");
    }
}
