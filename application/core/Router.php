<?php

namespace application\core;

class Router
{
  protected $url;
  protected $params = [];

  function __construct() {
    $this->url = explode('/', trim($_SERVER["REQUEST_URI"], '/'));
    if (!$this->url[1]) {
      if ($this->url[0] == "") {
        $this->url = [
          0 => 'main',
          1 => 'index'
        ];
      } else {
        $this->url = [
          0 => 'main',
          1 => $this->url[0]
        ];
      }
    }
    $this->params = [
      'controller' => $this->url[0],
      'action' => $this->url[1],
    ];
    //var_dump($this->param);
  }

  public function issetController($p1)
  {
    if (class_exists($p1))
      return true;
    return false;
  }

  public function issetMethod($p1, $p2)
  {
    if (method_exists($p1, $p2))
      return true;
    return false;
  }

  public function run()
  {
    $path = 'application\controllers\\'.ucfirst($this->url[0]).'Controller';
    if ($this->issetController($path)) {
      $action = $this->url[1].'Action';
      if ($this->issetMethod($path, $action)) {
        $controller = new $path($this->params);
        $controller->$action();
      } else {
        die ('<h1>404 Method not found</h1>');
      }
    } else {
      die ('<h1>404 Controller not found</h1>');
    }
  }
  // protected $routes = [];
  // protected $params = [];
  //
  // function __construct()
  // {
  //   // $arr = require 'application/config/routes.php';
  //   // foreach ($arr as $key => $value) {
  //   //   $this->add($key, $value);
  //   // }
  //
  // }
  //
  // public function add($route, $param){
  //   $route = '#^'.$route.'$#';
  //   $this->routes[$route] = $param;
  //
  // }
  //
  // public function match(){
  //
  //   foreach ($this->routes as $route => $params) {
  //     if (preg_match($route, $url, $matches)) {
  //       $this->params = $params;
  //       return true;
  //     }
  //   }
  //   return false;
  // }
  //
  // public function run(){
  //   if($this->match()) {
  //     $path = 'application\controllers\\'.ucfirst($this->params["controller"]).'Controller';
  //     if (class_exists($path)) {
  //       $action = $this->params["action"].'Action';
  //         if (method_exists($path, $action)) {
  //           $controller = new $path($this->params);
  //           $controller->$action();
  //         } else {
  //           echo "Action not found";
  //         }
  //     } else {
  //       echo "Class not found";
  //     }
  //   } else {
  //     die ('404 Page Not Found');
  //   }
  // }
}
