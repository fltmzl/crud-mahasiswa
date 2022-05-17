<?php

require_once "db.php";

function findOne($table, $id) {
    global $conn;

    if($table == "mahasiswa") $whereQuery = "nim=$id";
    if($table == "dosen") $whereQuery = "nidn=$id";
    
    $queryString = "SELECT * FROM $table WHERE $whereQuery";
    $result = mysqli_query($conn, $queryString);
    
    if($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
    }

    return $row;
}

?>