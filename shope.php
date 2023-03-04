<?php include "file.php"; ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منتجاتنا</title>
    <!--  font awesome libary-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--  render  all elements  normally -->
    <link rel="stylesheet" href="css/normlize.css">
    <!-- main  teamplate css file -->
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/shopee.css">
    <!-- goolr fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Open+Sans:wght@400;700&family=Tajawal:wght@500&family=Work+Sans:wght@300;600;700;800&display=swap" rel="stylesheet">

</head>

<body>
    <!-- Start header -->
    <header>
        <div class="container">
            <div class="addcart">
            
                <button type="submit" value="" name="">تسجيل دخول</button>
            </div>
            <nav>
                <!-- <i class="fas fa-bars toogle-menu"></i> -->
                <ul>

                    <!-- <li> <a href=""> تسجيل دخول </a></li> -->
                    <li> <a href=""> تواصل معنا</a></li>
                    <li> <a href=""> خدماتنا</a></li>
                    <li> <a href=""> منتجاتنا</a></li>
                    <li> <a href=""> من نحن </a></li>
                    <li> <a href="/bookstore" class="active"> الرئيسية</a></li>
                </ul>
                <a href="/bookstore" class="logo">
                    <img src="img/logo.png" alt="">
                    
                </a>
            </nav>
        </div>
    </header>
    <!--start discounts -->
    <!-- قسم الكتب الورقية -->
    <div class="discounts">
        <div class="container">
            <div class="main-heading">
                <h6> كتب مدفوعة </h6>
            </div>
        </div>
        <div class="imgs-container">
            <?php
            $sql = "SELECT * FROM books WHERE bookType = 'كتب مدفوعة' ORDER BY id DESC LIMIT 3";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="box">
                    <img class="por" src="dashboard/uploads/book/<?php echo $row['BookImage']; ?>" alt="">
                    <div class="caption">
                        <h4><?php echo $row['BookName']; ?></h4>
                        
                        <a href="productdetails.php?id=<?php echo $row['id'] ?>">
                            <button type="submit" name="submit">عرض المنتج</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- نهاية قسم الكتب الورقية -->

        <!-- بداية قسم الكتب المجانية -->
        <div class="container">
            <div class="main2-heading">
                <h6> كتب مجانية </h6>
            </div>
        </div>
        <div class="imgs-container">
            <?php
            $sql = "SELECT * FROM books WHERE bookType = 'كتب مجانية' ORDER BY id DESC LIMIT 3";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="box">
                    <img class="por" src="dashboard/uploads/book/<?php echo $row['BookImage']; ?>" alt="">
                    <div class="caption">
                        <h4><?php echo $row['BookName']; ?></h4>
                       
                        <a href="productdetails.php?id=<?php echo $row['id'] ?>">
                            <button type="submit" name="submit">عرض المنتج</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- نهاية قسم الكتب المجانية -->

        <!-- بداية قسم  القرطاسية -->

        <div class="container">
            <div class="main3-heading">
                <h6> قرطاسية </h6>
            </div>
        </div>
        <div class="imgs-container">
            <?php
            $sql = "SELECT * FROM qurtasia ORDER BY id DESC LIMIT 3";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="box">
                    <img class="por" src="dashboard/uploads/qurt/<?php echo $row['qurtasiaimage']; ?>" alt="">
                    <div class="caption">
                        <h4><?php echo $row['qurtasianame']; ?></h4>
                        
                        <a href="productdetailsqurt.php?id=<?php echo $row['id'] ?>">
                            <button type="submit" name="submit">عرض المنتج</button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!-- نهاية قسم  القرطاسية -->

    </div>

    <!--end  discounts -->

    <footer>
        <div class="container">

            <div class="social">
                <i class="fa-brands fa-facebook-square"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
            <div class="text">
                <p>جميع الحقوق محفوظة-حقوق الطبع والنشر&copy; كوكب كتب</p>
            </div>


        </div>

    </footer>


    <!-- end footer -->




</body>

</html>