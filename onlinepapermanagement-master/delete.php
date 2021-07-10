<?php
include 'connection.php';
$id=$_GET["id"];

$q="DELETE  FROM `papers` WHERE id=$id";

// mysqli_query($con,$q);

if(mysqli_query($con,$q)) $_COOKIE['alert'] = "Deletion Success";


header("Location:paperlibarary.php")
?>