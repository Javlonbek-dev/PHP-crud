<?php
$servername= "localhost";
$username="root";
$password="";
$dbname="crud_1";


$con =new mysqli($servername,$username,$password,$dbname);

if(!$con){
    die("Connection failed" . mysqli_connect_error());
}
// echo "Connect succesfully";
?>