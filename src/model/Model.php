<?php

namespace model;

class Model {

  static function connect()
  {
    $dsn = "mysql:host=localhost;dbname=webstore;charset=UTF8";
    $user = "root";
    $pass = "";
    return new \PDO($dsn, $user, $pass);
  }

}