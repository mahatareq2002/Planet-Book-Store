<?php include "file.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>متجر كوكب الكتب </title>
     <!--  font awesome libary-->
     <link rel="stylesheet" href="css/all.min.css">
     <!--  render  all elements  normally -->
    <link rel="stylesheet" href="css/normlize.css">
    <!-- main  teamplate css file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylee.css">
  
    <!-- goolr fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Open+Sans:wght@400;700&family=Tajawal:wght@500&family=Work+Sans:wght@300;600;700;800&display=swap" rel="stylesheet">
</head>
<body stely="background-colore:red">
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
                    <li> <a href="#contactus"> تواصل معنا</a></li>
                    <li> <a href="#serives"> خدماتنا</a></li>
                    <li> <a href="shope.php"> منتجاتنا</a></li>
                    <li> <a href="#whoare"> من نحن </a></li>
                    <li> <a href="/bookstore/index.php" class="active"> الرئيسية</a></li>
                </ul>
                <a href="/bookstore/index.php" class="logo">
                    <img src="img/logo.png" alt="">
                    
                </a>
            </nav>
        </div>
    </header>
    
        <!-- End header -->
                <!-- start hero -->
                <div class="hero" id="hero">
                   
                  
                        <div class="images">
                            <img src="img/img - section 1.png" alt="">
                        </div>
                        <div class="cotent">
                            <h2 class="text1"> متجر  كوكب الكتب  </h2>
                               <p>للحصول على كتابك المفضل من خلال موقعنا بكل سهولة و بطريقة مميزة ، مع امكانية التوصيل بغلاف جميل وأنيق  
                               </p>
                              
                        </div>
                     
                </div>
                
                
                
                
                 <!-- end landing  -->
        <!-- start landing -->
        <div class="landing">
        <?php
            $sql = "SELECT * FROM lastversion  ORDER BY id DESC LIMIT 1";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
            ?>
                <div class="text">
                  <h3> !! أحدث إصداراتنا</h3>
                </div>
                <div class="images">
                    <img src="dashboard/uploads/lastversion/<?php echo $row['BookImage']; ?>" alt="">
                </div>
                <div class="cotent">
                    <h6 ><?php echo $row['BookName']; ?></h6>
                       <p><?php echo $row['BookDes']; ?></p>
                       <H5><?php echo $row['WriterName']; ?></H5>
                </div>
                <?php } ?>
        </div>
        
      
        
        
         <!-- end landing  -->
         <!-- start who are -->
         <div class="whoare" id="whoare">
            <div class="container">
                <h6>من نحن</h6>
                <div class="images">
                    <img class="pic1" src="img/img 1.png" alt="">
                    <img class="pic2" src="img/img 2.png" alt="">
                </div>
                <div class="cont">
                
                <p>مموقع كوكب الكتب هو عبارة عن متجر الكتروني فريد من نوعه في قطاع غزة ، مختص ببيع الكتب بنوعيها : الورقية  و Pdf  والقرطاسية  ، مع امكانية التوصيل لباب البيت بغلاف مميز وأنيق  </p>
                </div>
          
        </div>


         </div>
         <!-- end who are -->

         <!--start Portfolio -->
         <div class="portfolio" id="portfolio">
              <div class="overlay"></div>
            <div class="container">
              <div class="main-heading">
                  <h6> اقتراحتنا</h6>
              </div>
            </div>
         <div class="imgs-container">
         <?php
            $sql = "SELECT * FROM books ORDER BY id DESC LIMIT 3";
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
            
            <!-- <div class="box">
                <img class="por" src="img/book2.jpg" alt="">
                    <div class="caption">
                        <h4>كتاب: م وراء الشتاء</h4>
                        <a href="productdetails.php?id=<?php echo $row['id'] ?>">
                            <button type="submit" name="submit">عرض المنتج</button>
                        </a>
                    </div>
            </div>
            <div class="box">
                
                <img src="img/book3.jpg" alt="">
                 <div class="caption">
                    <h4>كتاب: مدينة الأقوياء</h4>
                    <a href="productdetails.php?id=<?php echo $row['id'] ?>">
                            <button type="submit" name="submit">عرض المنتج</button>
                        </a>
                 </div>
            </div>
            <div class="box">
                <img src="img/book4.jpg" alt="">
                <div class="caption">
                     <h4>كتاب: وعد الأخرة </h4>
                     <a href="productdetails.php?id=<?php echo $row['id'] ?>">
                            <button type="submit" name="submit">عرض المنتج</button>
                        </a>
              </div>
            </div> -->

            </div>
          </div>

         <!--end  Portfolio -->




<!--start serives -->
<div class="serives" id="serives">
   
  <div class="container">
    <div class="main-heading">
        <h6> خدماتنا</h6>
    </div>
  </div>
<div class="imgs-container">
    <div class="box">
        <!-- <i class="fa-light fa-headphones"></i> -->
        <img src="img/icon2.png" alt="">
    
              <div class="caption">
                  <h4>قرطاسية ومسلتزمات مكتبية</h4>
                  <!-- <button>عرض المنتج</button> -->
              </div>
      </div>
      <div class="box">
      
        <img class="icon" src="img/icon.png" alt="">
         <div class="caption">
            <h4>تحميل الكتاب ك ملف على جهازك  </h4>
          
         </div>
    </div>

  <div class="box">
      
      <img src="img/icon5.png" alt="">
       <div class="caption">
          <h4>ألاف العناوين من الكتب والروايات  </h4>
        
       </div>
  </div>
  <div class="box">
      <img src="img/icon4.png" alt="">
      <div class="caption">
           <h4>توصيل الطلبية حتى باب البيت   </h4>
    
    </div>
  </div>
 
 
 
 
</div>
</div>
<!--end  serives-->
<!-- start contactus -->
<div class="contactus" id="contactus">
    <div class="container">
    <?php
        if (isset($_POST['send'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                $query = "INSERT INTO contact(name , email , message) VALUES('$name','$email','$message')";
                mysqli_query($con, $query);
                echo "<div class='alert alert-success'>تم اضافة الرسالة بنجاح</div>";
            
        }

        ?>
        <div class="main-heading">
            <h6> تواصل معنا</h6>
        </div>
        <form action="" method="post">
            <input type="text" name="name" placeholder="الاسم كاملا"><br> <br>
            <input type="text" name="email" placeholder="البريد الالكتروني"><br> <br>
        
            <textarea name="message" id="" cols="30" rows="10" placeholder="اكتب هنا رسالتك"></textarea><br>
            <button name="send">إرسال</button>
        </form>
      </div>





</div>

<!-- end  contactus -->
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