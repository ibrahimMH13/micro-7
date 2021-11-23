<?php


namespace Micro7;


class Router
{
    protected $path;
    protected $routes = [];

    public function addRoute($uri,$handler)
    {
        $this->routes[$uri] = $handler;

    }
    public function setPath($path ='/'){
        $this->path = $path;
    }

    public function getResponse(){
     return  $this->routes[$this->path];
    }

}
