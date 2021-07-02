<?php
namespace ism\lib;

class Request {

    public function getUri():array{
        $uri = $_SERVER["REQUEST_URI"];
        $array_uri = explode("/", $uri);
        unset($array_uri[0]);
        return array_values($array_uri);
    }

    public function isGet():bool{
        return $_SERVER["REQUEST_METHOD"]=="GET";
    }
    public function isPost():bool{
        return $_SERVER["REQUEST_METHOD"]=="POST";
    }
    
    public function getBody():array{
        return $_POST;
    }

    public function getParams():array{
        $array_uri = $this->getUri();
        unset($array_uri[0]);
        unset($array_uri[1]);
        return array_values($array_uri);
    }

}
