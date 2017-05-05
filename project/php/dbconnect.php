<?php
   // DB deployed in AWS cloud using RDS service.
   define('DB_SERVER', 'grocerybargain.cavbzzgm6wkd.us-west-1.rds.amazonaws.com');
   define('DB_USERNAME', 'master');
   define('DB_PASSWORD', 'master123');
   define('DB_DATABASE', 'grocery_db');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  else{
    echo "Connected successfully";
  }
?>
