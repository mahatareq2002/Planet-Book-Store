<?php 
session_start();
if(!isset($_SESSION['id'])){
    echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
    header('location:login.php');

}
else{

include "inc/header.php";
 include "../file.php";
 ?>
<body>
    <div class="main">
        <h2 class="mx-3 my-4">جميع الطلبات</h2>
    <table class="table table-bordered" width>
    <thead >
        <tr class="table-primary">
            <th>الاسم الاول</th>
            <th>اسم الاب</th>
            <th>اسم العائلة</th>
            <th>البريد الالكتروني</th>
            <th>رقم الجوال</th>
            <th>العنوان</th>
            <th>اسم الكتاب</th>
            <th>تاريخ الشراء</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM orderbook";
        $res = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($res)){
            ?>
        
        
        <tr>
            <th><?php echo $row['firstname'] ?></th>
            <th><?php echo $row['secoundname'] ?></th>
            <th><?php echo $row['lastname'] ?></th>
            <th><?php echo $row['email'] ?></th>
            <th><?php echo $row['phone'] ?></th>
            <th><?php echo $row['addres'] ?></th>
            <th><?php echo $row['product'] ?></th>
            <th><?php echo $row['date'] ?></th>


        </tr>
        <?php
        } 
        ?>
    </tbody>
    </table>
    </div>
    
    <?php
}
    include "inc/footer.php" ?>


