<?php
include "file.php";

$idqur = $_GET['id'];
$sqlqur = "SELECT * FROM qurtasia WHERE id=$idqur";
$resultqur = mysqli_query($con, $sqlqur);
$dataqur = mysqli_fetch_array($resultqur);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard/css/sb-admin-2.min.css">
    <title>إدخال البيانات</title>
</head>

<body>
    <?php

    @$product_name = $dataqur['qurtasianame'];
    @$firstname = $_POST['firstname'];
    @$secoundname = $_POST['secoundname'];
    @$lastname = $_POST['lastname'];
    @$email = $_POST['email'];
    @$phone = $_POST['phone'];
    @$addres = $_POST['addres'];
    @$shopsave = $_POST['shopsave'];

if(isset($shopsave)){
    if(empty($firstname) || empty($lastname) || empty($email) || empty($phone) || empty($addres)){
        echo "<div class='alert alert-danger'>لا يجب ترك الحقول فارغة</div>";
    }
    else{

        $sql = "INSERT INTO orderbook(firstname,secoundname,lastname,email,phone,addres,product)
        VALUES('$firstname','$secoundname','$lastname','$email','$phone','$addres','$product_name')
        ";
    $res = mysqli_query($con,$sql);
    if(isset($res)){
        echo "<div class='alert alert-success'>تمت الاضافة بنجاح</div>";
    }
    else{
        echo "هناك خطأ ما ";
    }
}
}


    ?>
    <div class="container">
        <h2 class="my-4 text-center">اضف بياناتك الخاصة لاتمام عملية الشراء</h2>

        <form action="" method="post">
            <div class="form-group">
                <label for=""> الاسم الاول</label>
                <input type="text" name="firstname" class="form-control" placeholder="اضف  اسمك الاول">
            </div>
            <div class="form-group">
                <label for=""> اسم الأب</label>
                <input type="text" name="secoundname" class="form-control" placeholder="اضف  اسم الاب">
            </div>
            <div class="form-group">
                <label for=""> اسم العائلة</label>
                <input type="text" name="lastname" class="form-control" placeholder="اضف  اسم العائلة">
            </div>

            <div class="form-group">
                <label for=""> الايميل</label>
                <input type="text" name="email" class="form-control" placeholder="اضف البريد الالكتروني">
            </div>
            <div class="form-group">
                <label for=""> رقم الهاتف</label>
                <input type="text" name="phone" class="form-control" placeholder="اضف رقم الهاتف">
            </div>
            <div class="form-group">
                <label for=""> العنوان بالكامل</label>
                <input type="text" name="addres" class="form-control" placeholder="اضف  العنوان">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary px-5" name="shopsave">حفظ</button>
            </div>
        </form>
    </div>

</body>

</html>