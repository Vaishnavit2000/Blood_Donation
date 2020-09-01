<?php

//My sql connection
$conn = mysqli_connect('localhost' , 'Vaishnavi' , 'cake_14' , 'blood_donar');

//check for any connection error
if(!$conn){
    echo 'Connection error ' . mysqli_connect_error();
}

?>