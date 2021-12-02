<?php


namespace Micro7;


class Response
{
    protected $body;
    protected $status = 200;

    public function setBody($body){
        $this->body = $body;
        return $this;
    }

    public function getBody(){
        return $this->body;
    }

    public function withStatus($code){
        $this->status = $code;
    }

    public function status(){
        return $this->status;
    }
}
