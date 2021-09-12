<?php

  namespace App\Mvc;

  use PDO;

  class Model
  {

    private $DB_NAME = "estacionamento";
    private $DB_HOST = "localhost";
    private $DB_PORT = "3306";
    private $DB_PASSWORD = "";
    private $DB_USER = "root";

    private $conn;

    public function __construct()
    {
      $this->conn = new PDO("mysql:dbname={$this->DB_NAME};host={$this->DB_HOST};port={$this->DB_PORT};user={$this->DB_USER};password={$this->DB_PASSWORD}");
    }

    public function query($query)
    {
      $stmt = $this->conn->prepare($query);
      return $stmt->execute();
    }

    public function select($query)
    {
      $result = $this->conn->query($query);
      return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function update($query)
    {
      $stmt = $this->conn->prepare($query);
      return $stmt->execute();
    }
  }
