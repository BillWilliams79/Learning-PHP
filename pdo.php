<?php
   function db_connect() {

      # database type, name and charset
      $db_details = "mysql:host=localhost;dbname=pool_maintenance;charset=utf8mb4";

      # default PDO options - note prepping for full prepared statements, exceptions and fetch as arracy
      $options = [
         PDO::ATTR_EMULATE_PREPARES   => false,
         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      ];

      # try/catch to protected for db connection fails.
      try {
         $pdo = new PDO($db_details, "root", "root", $options);
      } catch (Exception $e) {
         error_log($e->getMessage());
         exit('Unable to connect to MySQL database, error: ' . $e->getMessage());
      }

      return $pdo;
   }
    
?>