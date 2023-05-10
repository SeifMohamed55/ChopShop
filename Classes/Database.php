<?php

// 2 database notification tables Profile_update, paymentNotfication
class Database {
    private $serverName;
    private $connectionInfo;
    private $conn;
  
    // Constructor - called when the class is instantiated
     function __construct() {
      $this->serverName = "localhost";  
      $this->connectionInfo = array(  "Database"=>"Shop", "UID"=>"Admin", "PWD"=>"admin");
      // Create connection
      $this->conn = sqlsrv_connect( $this->serverName, $this->connectionInfo);  
  
      // Check connection
      if (!($this->conn)) {
        die("Connection failed: " . print_r(sqlsrv_errors(), true));
      }
    }
  
    // Execute a SQL query
    public function execute($sql, array|null $param) {
      $stmt = sqlsrv_query($this->conn,$sql , $param);
      return $stmt;
    }


     // Destructor - called when the class is destroyed
    function __destruct() {
      sqlsrv_close($this->conn);
    }
  }
  
//to insert
/*
$sql = "INSERT INTO Table_1 (id, data) VALUES (?, ?)";
$params = array(1, "some data");

$stmt = sqlsrv_query( $conn, $sql, $params);
*/


//to read
/*

$sql = "SELECT FirstName, LastName FROM SomeTable";
$stmt = sqlsrv_query( $conn, $sql );
if( $stmt === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
      echo $row['LastName'] . ", " . $row['FirstName'];
}

sqlsrv_free_stmt($stmt);

*/
/*
 $rows_affected = sqlsrv_rows_affected($stmt);
          if ($rows_affected == 0)
              return false;
          return true;
  */


/*$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

// Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch( $stmt ) === false) {
     die( print_r( sqlsrv_errors(), true));
}

// Get the row fields. Field indices start at 0 and must be retrieved in order.
// Retrieving row fields by name is not supported by sqlsrv_get_field.
$name = sqlsrv_get_field( $stmt, 0);
echo "$name: ";

$comment = sqlsrv_get_field( $stmt, 1);
echo $comment;*/
?>

