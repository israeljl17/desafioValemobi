<?php
  class Database{

      // specify your own database credentials
      private $host = "us-cdbr-iron-east-04.cleardb.net";
      private $db_name = "ad_4bcf87e05d1b2ff";
      private $username = "b54ecb828b4ca5";
      private $password = "75f3e7d5";
      private $conn;

      // get the database connection
      public function getConnection(){ $this->conn = null;

          try{
              $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
          }catch(PDOException $exception){
              echo "Connection error: " . $exception->getMessage();
          }

          return $this->conn;
      }
  }
?>
