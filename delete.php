<?php
include "db_conn.php";
$id= $_GET['id'];
$sql= "DELETE FROM persons WHERE id=$id";
$result=$con->query($sql);

if($result){
    header("Location:index.php?msg=Data delete successfully");
}
else{
    echo "Failed: ". mysqli_error($con); 
}
