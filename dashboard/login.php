<?php
session_start();

 include "../file.php";

@$email = $_POST['email'];
@$password = $_POST['password'];

?>
<html>

<head>
    <!--  font awesome libary-->
    <link rel="stylesheet" href="css/all.min.css">
    <!--  render  all elements  normally -->
    <link rel="stylesheet" href="css/normlize.css">
    <!-- main  teamplate css file -->
    <link rel="stylesheet" type="text/css" href="css/sb-admin-2.min.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="css/stylee.css">
    <!-- goolr fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Open+Sans:wght@400;700&family=Tajawal:wght@500&family=Work+Sans:wght@300;600;700;800&display=swap" rel="stylesheet">

    <title> تسجيل دخول </title>

    

</head>

<body>
    <div class="login-box">
        <img src="../img/logoo.png" class="avatar">
        <h1>تسجيل دخول </h1>
        <form method="POST">
            <?php
            if (isset($_POST['submit'])) {

                if (empty($email) || empty($password)) {

                    echo "<div class ='alert alert-danger'>" . "  يجب ادخال الحقول " . "</div>";
                } else {
                    $sql = "SELECT * FROM admin WHERE email='$email' && password='$password'";
                    $res = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($res);

                    if (in_array($email, $row) && in_array($password, $row)) {
                        echo "<div class = 'alert alert-success'" . "سيتم تحويلك  الى لوحة التحكم" . "</div>";
                          $_SESSION['id'] = $row['id'];

                        header('REFRESH:3;URL=index.php');
        
                }
                else{
                    echo "<div class = 'alert alert-danger'" . " البيانات غير متطابقة" . "</div>";
        
                }

            }

    }
            ?>
            <input type="text" name="email" placeholder="البريد الالكتروني">

            <input type="password" name="password" placeholder="كلمة المرور">
            <input type="submit" name="submit" value="تسجيل دخول">

        </form>
       
    </div>
    <!-- start footer -->
    <footer>
        <div class="contain">

            <div class="social">
                <i class="fa-brands fa-facebook-square"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
            </div>
            <div class="textt">
                <p>جميع الحقوق محفوظة-حقوق الطبع والنشر&copy; كوكب كتب</p>
            </div>


        </div>

    </footer>


    <!-- end footer -->


</body>

</html>