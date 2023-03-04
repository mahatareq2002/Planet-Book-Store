<?php
include "file.php"; 

$idqurtasia = $_GET['id'];
$sqlqurtasia = "SELECT * FROM qurtasia WHERE id=$idqurtasia";
$resultqurtasia = mysqli_query($con,$sqlqurtasia);
$dataqurtasia = mysqli_fetch_array($resultqurtasia);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تأكيد عملية الشراء</title>
    
    <style>
        input{
            display: none;
        }
        .main{
            width: 30%;
            padding: 20px;
            box-shadow: 1px 1px 10px silver;
            margin-top: 20px;
        }
        button{
            margin-bottom: 15px;
            background-color:#403054;
            color: #fff;
            font-size: 18px;
            padding: 15px;

        }
    </style>

</head>
<body>
    
<center>
    <div class="main">
        <form action="insert-cart.php" method="post">
            <input type="text" name="id" value="<?php echo $dataqurtasia['id'] ; ?>">
            <input type="text" name="namequrtasi" value="<?php echo $dataqurtasia['qurtasianame'] ; ?>">
            <input type="text" name="pricequrtasi" value="<?php echo $dataqurtasia['qurtasiaprice'] ; ?>">
            <button type="submit" name="addqurtasia">تأكيد الاضافة الى عربة التسوق</button><br>
            <a href="shope.php">الرجوع الى صفحة الكتب</a>

        </form>
    </div>
</center>


</body>
</html>