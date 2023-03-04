<?php include "file.php"; 

$id = $_GET[@'id'];
$sql = "SELECT * FROM books WHERE id=$id";
$result = mysqli_query($con,$sql);
$data = mysqli_fetch_array($result);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--  font awesome libary-->
     <link rel="stylesheet" href="css/all.min.css">
     <!--  render  all elements  normally -->
    <link rel="stylesheet" href="css/normlize.css">
    <!-- main  teamplate css file -->
    <link rel="stylesheet" href="css/productdetails.css">
    <link rel="stylesheet" href="css/prod.css">

    <!-- goolr fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Open+Sans:wght@400;700&family=Tajawal:wght@500&family=Work+Sans:wght@300;600;700;800&display=swap" rel="stylesheet">

    <title>productdetails</title>
</head>
<body>
     <!-- Start header -->
     <header>
        <div class="container">
            <div class="addcart">
                
                <a href="/bookstore/dashboard/login.php">
                <button  type="submit" value="" name="">تسجيل دخول</button>
                </a>
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
    
        <!-- End header -->

        

                <!-- start landing -->
                <div class="landing">
                    <div class="images">
                    <img class="por"src="dashboard/uploads/book/<?php echo $data['BookImage']; ?>" alt="">
                    </div>
                    <div class="cotent">

                        <h6><?php echo $data['BookName'] ?> </h6>
                           <p> 
                           <?php echo $data['BookDesc'] ?>
                           </p>
                           <H5>: سعر الكتاب الواحد </H5>
                           <h4> <?php echo $data['BookPrice'] ?>   </h4>
                           
                           <a href="val.php?id=<?php echo $data['id'] ?>">
                           <button type="submit" name="submit">إضافة الى السلة </button>
                           </a>
                    </div>
                 
            </div>
            
             <!-- end landing  -->



<!-- start footer -->
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