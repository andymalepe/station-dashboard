<?php

require_once('../config.php');

function startPDO(){
   $options = array(
      \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
      \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
      \PDO::ATTR_EMULATE_PREPARES   => false,
   );

   $dsn = "mysql:host=".DB_HOST.";dbname=".DB_DATABASE.";charset=".CHARSET;
   try {
       $pdo = new \PDO($dsn, DB_USER, DB_PASSWORD, $options);
   } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }
   return $pdo;
}
 
?>
