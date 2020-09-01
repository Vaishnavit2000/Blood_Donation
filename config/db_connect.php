<?php

//Local data base
// $user = 'Vaishnavi';
// $password = 'cake_14';
// $host ='localhost';
// $db = 'blood_donar';

//Remote database
$user = 'aADLB8x8gl';
$password = '6vEovCjtsv';
$host ='remotemysql.com';
$db = 'aADLB8x8gl';

//My sql connection
$conn = mysqli_connect($host, $user , $password , $db);

//check for any connection error
if(!$conn){
    echo 'Connection error ' . mysqli_connect_error();
}

?>
