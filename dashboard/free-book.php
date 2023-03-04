<?php 
session_start();

if(!isset($_SESSION['id'])){
    echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
    header('location:login.php');

}
else{

include "inc/header.php";
 include "../file.php" ?>


                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php

                @$bTitle = $_POST['book-name'];
                @$bAuthor = $_POST['book-author'];
                @$bookImage = $_POST['book-image'];
                @$bookFile = $_POST['book-file'];               
                @$bContent = $_POST['discription'];
                @$bAdd = $_POST['book-save'];

                @$imageName = $_FILES['book-image']['name'];
                @$imageTemp = $_FILES['book-image']['tmp_name']; // مجلد الصورة

                // @$imageFile = $_FILES['book-file']['name'];
                // @$imageTemp = $_FILES['book-file']['tmp_name']; // مجلد الكتاب
                
                if(isset($bAdd)){
                    if(empty($bTitle) || empty($bContent)){
                        echo "<div class='alert alert-danger'>لا يجب ترك الحقول فارغة</div>";
                    }
                    else{

                    
                    $bookImage = rand(0,1000) . "_" . $imageName;
                    //  $fileImage = rand(0,1000) . "_" . $imageFile;
                    move_uploaded_file($imageTemp,"uploads\book\\".$bookImage);
                    //  move_uploaded_file($imageTemp,"uploads\bookfile\\".$fileImage);
        
            
                    $sql = "INSERT INTO  freebooks(BookName,BookAuthor,BookImage,BookFile,BookDesc) 
                    VALUES('$bTitle','$bAuthor','$bookImage','$bookFile','$bContent')";
                    $res = mysqli_query($con,$sql);
                    if(isset($res)){
                        echo "<div class='alert alert-success'>تمت الاضافة بنجاح</div>";
                    }
                    else{
                        echo "هناك خطأ ما ";
                    }
                }
            }
            if(!isset($_SESSION['id'])){
                echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
                header('REFRESH:3;URL=login.php');
            
            }
            else{
                ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">إضافة كتاب </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for=""> اسم الكتاب</label>
                            <input type="text" name="book-name" class="form-control" placeholder="اضف اسم الكتاب">
                        </div>
                        <div class="form-group">
                        <label for=""> اسم الكاتب</label>
                            <input type="text" name="book-author" class="form-control" placeholder="اضف اسم المؤلف">
                        </div>
                        <div class="form-group">
                        <label for="">ارفع صورة الكتاب</label>
                            <input type="file" name="book-image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">ارفع الكتاب</label>
                            <input type="file" name="book-file" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for=""> ادخل مختصر عن الكتاب</label>
                        <textarea class="form-control" name="discription" id="" rows="5" placeholder="ادخل مختصر عن الكتاب"></textarea>
                        </div>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary px-5" name="book-save">حفظ</button>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 <?php 
            }}
 include "inc/footer.php" ?>
