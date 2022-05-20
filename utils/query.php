<?php 
require_once 'db.php';

function query($queryString) {
    global $conn;

    $result = mysqli_query($conn, $queryString);

    // Jika ada data di database, maka ambil data-nya
    $rows = [];
    if($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
    } else {
        $error = mysqli_error($conn);
    }
    
    return $rows;
}

?>