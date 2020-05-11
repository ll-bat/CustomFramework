<?php


class HomeController
{

      public function contact(IRequest $req, Router $route){

          return $route->view('/contact', [
              "errors" => [],
              "data"   => []
          ]);
      }
      public function postContact(IRequest $req, Router $route){

          $data = $req->getBody();
          $errors = [];
          if ($data['email'] == '') $errors['email'] = 'Email is required';

          return $route->view('/contact',[
              "errors" => $errors,
              "data"   => $data
          ]);
      }
}