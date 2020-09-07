<?php
function db_init($dbHost, $dbName, $dbChar){
  // PDO 객체 생성 & DB 접속
  $dsn = "mysql:host={$dbHost};dbname={$dbName};charset={$dbChar}";
  return $dsn;
}



?>
