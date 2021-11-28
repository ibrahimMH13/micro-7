<?php


namespace Micro7;


use Micro7\Exceptions\NotAllowedMethodException;
use Micro7\Exceptions\RouteNotExistsException;

class Router
{
    protected $path;
    protected $routes = [];
    private   $methods = [];

    public function addRoute($uri,$handler,array $methods=['GET '])
    {
        $this->routes[$uri] = $handler;
        $this->methods[$uri] = $methods;

    }
    public function setPath($path ='/'){
        $this->path = $path;
    }

    public function getResponse(){
        if (!isset($this->routes[$this->path])){
            throw new RouteNotExistsException('route not exists');
        }
        if(!in_array($_SERVER['REQUEST_METHOD'],$this->methods[$this->path])){
            throw new NotAllowedMethodException();
        }
     return  $this->routes[$this->path];
    }

}
