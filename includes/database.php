<?php
$hostName = "localhost";
$userName = "g00411296";
$password = "W2A(wVUPCa/NkYj";
$databaseName = "g00411296";
$connError = "no value";
$conn = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($conn->connect_error) {
    $connError = $conn->connect_error;
  die("Connection failed: " . $conn->connect_error);
}

function fetch_data($tableName, $columns, $orderBy, $limit)
{
    global $connError;
    global $conn;
    if (empty($conn)) {
        $msg = "Database connection error: " . $connError;
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName";
        if(!empty($orderBy) && strlen($orderBy) > 0){
          $query = $query . " ORDER BY " . $orderBy; 
        }
        if(!empty($limit) && strlen($limit) > 0){
          $query = $query . " LIMIT " . $limit; 
        }
        $result = $conn->query($query);
        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($conn);
        }
    }
    return $msg;
}
?>