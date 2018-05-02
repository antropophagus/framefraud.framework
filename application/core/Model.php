<?

namespace application\core;

use application\lib\db;

abstract class Model
{

  public $db;

  function __construct()
  {
    $this->db = new db;
  //  var_dump($this->db);
  }

  public function getStates()
  {
    $params = [];
    $states = $this->db->query("SELECT * FROM `states`");
    return $states;
  }
}
