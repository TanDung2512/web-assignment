<?php 

require_once(__DIR__."/../database/connect_DB.php");
require_once(__DIR__."/../services/users.php");

class testdb {
  public __construct() {
    try {
      $db = DB::getInstance();
    } catch (Exception $e) {
      print $e->getMessage();
      exit();
    }
  }
}
?>