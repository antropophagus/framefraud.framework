<?php

namespace application\lib;

use PDO;

class db
{

  protected $db;

  function __construct()
  {
    $config = require 'application/config/db.php';
    $this->db = new PDO('mysql:host='.$config["host"].';dbname='.$config["name"].'', $config["user"], $config["password"]);
  }

  public function query($sql, $params = [])
  {
    $quary = $this->db->prepare($sql);
    //var_dump($params);
    if (!empty($params)) {
      foreach ($params as $key => $value) {
        $quary->bindValue(':'.$key, $value);
      }
    }
    $quary->execute();
    $records = $quary->fetchAll(PDO::FETCH_ASSOC);
    return $records;
  }
}
