<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud_mahasiswa";

    $conn = mysqli_connect($servername, $username, $password, $database);
    
    if(!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // echo "Connection successfully";
 ?>