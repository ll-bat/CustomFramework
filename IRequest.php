<?php

namespace app;


interface IRequest
{
    public function getMethod();
    public function getPath();
    public function getBody();
}