<?php
require_once('config.php');

class DB{
  var $conn;

  function __construct(){
    $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
  }

  function fetch($query){
    $data = array();
    $results = $this->conn->query($query);

    if($results){
      if($results->num_rows > 0){
        while($result = $results->fetch_assoc()){
          array_push($data, $result);
        }
      }
    }
    else{
      return false;
    }

    return $data;
  }

  function store($query){
    $this->conn->query($query);
    return $this->conn->affected_rows;
  }
}

$db = new DB();

?>