<?php

ini_set('max_execution_time', 360);

include 'config.php';
include 'libs/Mysql.php';

$mysqlObj = new Mysql();
$lastId = $mysqlObj->lastId();


for ($lastId; $lastId <= 900000; $lastId++)
{
  $insertQuery = "INSERT INTO ".MYSQL_TABLE." (id,name,descr) VALUES ('$lastId', '".$mysqlObj->randomVal(250)."', '".str_repeat($mysqlObj->randomVal(250), 3)."');";
  $mysqlObj->connect($insertQuery);
}

// for ($i = 890000; $i <= 900000; $i++)
// {
//   $insertQuery = "DELETE FROM ".MYSQL_TABLE." WHERE id=$i";
//   $mysqlObj->connect($insertQuery);
// }
