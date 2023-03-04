<?php
include "file.php"; 

if(isset($_POST['add'])){
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO cart(name,price) VALUES('$name','$price')";
     mysqli_query($con,$sql);
     header('location:cart.php');

}

if(isset($_POST['addqurtasia'])){
    $namequrtasia = $_POST['namequrtasi'];
    $pricequrtasia = $_POST['pricequrtasi'];

    $sqlqurtasi = "INSERT INTO qurtasia(qurtasianame,qurtasiaprice) VALUES('$namequrtasia','$pricequrtasia')";
     mysqli_query($con,$sqlqurtasi);
     header('location:cart.php');

}