<?

namespace application\core;

use application\core\Views;
use application\models\Main;

class Controller
{
  public $route;
  public $view;

  function __construct($route)
  {
    $this->route = $route;
    $this->view = new Views($this->route);
    $this->model = $this->loadModel($this->route["controller"]);
  }

  public function loadModel($name)
  {
    $path = 'application\models\\'.ucfirst($name);
    if (class_exists(ucfirst($path))) {
      return new $path;
    }
    return 'Class not exist';
  }

  public function checkAccess($p1)
  {
    if ($p1 == 0 and $_SESSION["USER_LOG_IN"]) return false; //Only for guests
    if ($p1 == 1 and !$_SESSION["USER_LOG_IN"]) return false; //Only for autorized
    if ($p1 == 2 and !$_SESSION["USER_LOG_IN"] and $_SESSION["USER_ROOT_RULES"] == 0) return false; // Only for admins
    return true;
  }
}
