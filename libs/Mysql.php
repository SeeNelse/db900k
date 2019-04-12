<?php

class Mysql
{
  public function connect($selectQuery = "SELECT id FROM ".MYSQL_TABLE) {
    try {
      $mysqlConnect = new PDO("pgsql:host=".MYSQL_SERVER.";dbname=".MYSQL_DB, MYSQL_USER, MYSQL_PASS);
      $state = $mysqlConnect -> query($selectQuery);
      return $selectResult = $state->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      return false;
    }
      // $selectQuery = "INSERT INTO ".MYSQL_TABLE." (id,name,descr) VALUES (1, name1, dessad);";
      // $selectQuery = "DELETE FROM ".MYSQL_TABLE." WHERE id=3;";
  }

  public function lastId() {
    $arrResult = $this->connect();
    if (!$arrResult)
    {
      return $lastId = 1;
    } else {
      $count = count($arrResult)-1;
      return $lastId = (int)$arrResult[$count]["id"] + 1;
    }
  }

  public function randomVal($quant) {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = [];
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < $quant; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
  }
}