<?

namespace application\controllers;

use application\core\Controller;
use application\core\Views;
use application\lib\db;
use application\models\Main;

class MainController extends Controller
{
  public function IndexAction()
  {
    $states = $this->model->getStates();
    $vars = [
      'states' => $states,
    ];
    if ($this->checkAccess(3)){
      $this->view->render("Главная", $vars);
    }else {
        die ("У вас нет доступа!");
    }

  }

}
