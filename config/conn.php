<?php
require("./config/config_cafe24/config_cafe24.php");
require("./config/lib_cafe24/db_cafe24.php");

$dsn = db_init($config['host'],$config['dbName'], $config['dbChar']);
$pdo = new PDO($dsn, $config['dbUser'], $config['dbPass']);

 ?>
