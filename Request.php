<?php
namespace app;

class Request implements IRequest
{

    public function __construct()
    {
        foreach ($_SERVER as $key => $item){
            $result = $this->toCamelCase($key);
            $this->{$result} = $item;
        }
    }
    public function toCamelCase($key){
        $result = strtolower(($key));

        preg_match_all('/_[a-z]/', $result, $matches);
//        var_dump($matches);
        foreach ($matches[0] as $match){
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }
    public function getBody(){
        $body = [];
        if ($this->getMethod() === "get"){
            foreach ($_GET as $key => $value){
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        else {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }
        return $body;
    }
    public function getMethod(){
        return strtolower($this->requestMethod);
    }
    public function getPath(){
        return $this->pathInfo ?? '/';
    }
}