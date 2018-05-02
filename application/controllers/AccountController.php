<?php

namespace application\controllers;


use application\core\Controller;
use application\core\views;

class AccountController extends Controller
{
  public function loginAction() {
    if ($this->checkAccess(0)) {
      $this->view->render("Логин");
    }
    else die ("У вас нет доступа!");
  }

  public function registerAction() {
    if ($this->checkAccess(0)) {
      $this->view->render("Регистрация");
    }
    else die ("У вас нет доступа!");
  }
}
