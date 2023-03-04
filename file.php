<?php


$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bookstore";

$con = new mysqli($host,$user,$pass,$dbname);


//connection
if(@$con){
    $dbsec = 1;
}
else{
    $dbsec =0;
}

 
?>