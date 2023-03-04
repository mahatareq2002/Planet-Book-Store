<?php 
include "file.php";
@$id = $_GET['id'];

if (isset($id)) {
    $sql = "DELETE FROM cart WHERE id = '$id'";
    $delt = mysqli_query($con, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard/css/sb-admin-2.min.css">
    <title>عربة التسوق</title>
    <style>
    .main{
        width: 800px;
        text-align: center;
        margin: 50px auto;
    }
    h2{
        margin-bottom: 20px;
    }
    </style>

</head>
<body>
    <div class="main">
        <h2>جميع المنتجات</h2>
    <table class="table table-bordered" width>
    <thead >
        <tr class="table-primary">
            <th>اسم المنتج</th>
            <th>سعر المنتج</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql = "SELECT * FROM cart";
        $res = mysqli_query($con,$sql);
        
        while($row = mysqli_fetch_array($res) ){
            ?>
        
        
        <tr>
            <!-- $rowqurtasi['qurtasianame'] -->
            <th><?php echo $row['name']; ?></th>
            <th><?php echo $row['price'] ?></th>
            <th>
                <a class="btn btn-success" href="order.php?id=<?php echo $row['id'] ?>">شراء الان</a>
                <a class="btn btn-danger" href="cart.php?id=<?php echo $row['id'] ?>">حذف الكتاب</a>

            </th>

        </tr>
        <?php
        } 
        ?>
    </tbody>
    </table>
    </div>
    
</body>
</html>

