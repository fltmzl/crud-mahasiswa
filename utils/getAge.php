<?php 

function getAge ($dateOfBirth) {
    $currentYear = date("Y");
    $yearOfDateOfBirth = date("Y", strtotime($dateOfBirth));

    $age = $currentYear - $yearOfDateOfBirth;
    return $age;
}

?>