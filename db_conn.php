<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="crud_1";


$con =mysqli_connect($servername,$username,$password,$dbname);

if(!$con){
    die("Connection failed" . mysqli_connect_error());
}
// echo "Connect succesfully";
?>