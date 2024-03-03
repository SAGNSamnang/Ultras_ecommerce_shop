<?php
  // Connect to database
  function dbConn() 
  {
    
    // Constant variable not $ sign
    $conn = mysqli_connect(HOST, USER, PWD, DB);
    if (!mysqli_connect_error()) {
      return $conn;
    }
    else {
      echo "Error in connection database: " . mysqli_connect_error(); 
      exit();
    }
  }
  // Close a database
  function dbClose($conn) {
    mysqli_close($conn);
  }
  // Select a table from a database
  function dbSelect($table, $column="*", $criteria="", $clause="") {
    if (empty($table)) {
      return false;
    }
    $sql = "SELECT " . $column . " FROM ". $table;
    if (!empty($criteria)) {
      $sql .= " WHERE " . $criteria;
    }
    if (!empty($clause)) {
      $sql .= " " . $clause;
    }

    $conn = dbConn();
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "Error in selecting data: " . mysqli_error($conn);
      return false;
    }
    dbClose($conn);
    return $result;
  }

  // Insert a record in a database
  function dbInsert($table, $data=array()) {
    if (empty($table) || empty($data)){
      return false;
    }
    $conn = dbConn();
    $fields = implode(", ", array_keys($data));
    $values = implode("','", array_values($data));
    $sql = "INSERT INTO " . $table . " (" . $fields . ") VALUES ('" . $values . "')";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "Error Insert data: " . mysqli_error($conn);
      return false;
    }
    dbClose($conn);
    return true;
  }

  // Update 
  function dbUpdate($table, $data=array(), $criteria="") {
    if (empty($table) || empty($data) || empty($criteria)) {
      return false;
    }
    $fv = "";
    $conn = dbConn();
    foreach($data as $field=>$value) {
      $fv .= " " . $field . "='" . $value . "',";
    }
    $fv = substr($fv, 0, strlen($fv)-1);
    $sql = "UPDATE ". $table . " SET ". $fv . "WHERE " . $criteria;

    $result = mysqli_query($conn, $sql);

    if (!$result) {
      echo "Error updated: " . mysqli_error($conn);
      return false;
    }
    dbConn($conn);
    return true;
  }

  // Delete a record from a database
  function dbDelete($table, $criteria) {
    if (empty($table) || empty($criteria)) {
      return false;
    } 
    $sql = "DELETE FROM " . $table . " WHERE " . $criteria;
    $conn = dbConn();
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      echo "Error deleted: " . mysqli_error($conn);
      return false;
    }
    dbClose($conn);
    return true;
  }

  // Count records in database
  function dbCount($table="", $criteria="") {
    if (empty($table)) {
      return false;
    }
    $sql = "SELECT * FROM " . $table;
    if (!empty($criteria)) {
      $sql .= " WHERE " . $criteria;
    }
    $conn = dbConn();
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if (!$result) {
      echo "Error count: " . mysqli_error($conn);
      return false;
    }
    dbClose($conn);
    return $num;
  }