<?php 

require_once "query.php";

function find($keyword, $table) {
    if($table == "mahasiswa") {
        $queryString = "SELECT * FROM $table WHERE
                        nama LIKE '%$keyword%' OR
                        nim LIKE '%$keyword%' OR
                        kelas LIKE '%$keyword%' OR
                        telepon LIKE '%$keyword%'";    
    } else if ($table == "dosen") {
        $queryString = "SELECT * FROM $table WHERE
                        nama LIKE '%$keyword%' OR
                        nidn LIKE '%$keyword%' OR
                        telepon LIKE '%$keyword%'";
    }
   
    return query($queryString);
}

?>