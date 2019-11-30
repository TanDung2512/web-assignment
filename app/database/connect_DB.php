<?php 

 /**
  * @package database
  * This class is managing database connection
  *
  * @method static getInstance()
  * @method getConnection()
  */
class connectDB {

  private static $instance = null;
  private $conn;
  private $host = 'localhost';
  private $user = 'root';
  private $pass = '';
  private $name = 'ass';

/**
  * A database connection is established.
  *
  * @return void
  */

  private function __construct() {
    $this->conn = new PDO(
      "mysql:host={$this->host};
      dbname={$this->name}",
      $this->user,
      $this->pass
    );
    $this->conn->exec("SET NAME utf8");
  }

 /**
  * Get the db connection instance. 
  * Implemented with the singleton pattern, restrict number of instances to only one.
  *
  * @return instance
  */
  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new connectDB();
    }
    return self::$instance;
  }

  /**
  * Get the db connection. 
  *
  * @return conn
  */
  public function getConnection() {
    return $this->conn;
  }
}

?>