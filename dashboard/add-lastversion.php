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


                <!-- Begin Page Content -->
                <div class="container-fluid">

                <?php

                @$bookTitle = $_POST['book-name'];
                @$bookdes = $_POST['book-des'];
                @$bookImage = $_POST['book-image'];
                @$writerName = $_POST['writer-name'];
                @$lAdd = $_POST['book-save'];

                @$imageName = $_FILES['book-image']['name'];
                @$imageTemp = $_FILES['book-image']['tmp_name']; 

              
                if(isset($lAdd)){
                    if(empty($bookTitle)){
                        echo "<div class='alert alert-danger'>لا يجب ترك الحقول فارغة</div>";
                    }
                    else{

                    
                    $bookImage = rand(0,1000) . "_" . $imageName;
                    move_uploaded_file($imageTemp,"uploads\lastversion\\".$bookImage);
                  
        
            
                    $sql = "INSERT INTO lastversion(BookName,BookDes,BookImage,WriterName) 
                    VALUES('$bookTitle','$bookdes','$bookImage','$writerName')";
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
                    <h1 class="h3 mb-4 text-gray-800">إضافة أخر إصدار  </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for=""> اسم الكتاب </label>
                            <input type="text" name="book-name" class="form-control" placeholder="اضف اسم الكتاب">
                        </div>

                        <div class="form-group">
                        <label for="">ارفع صورة الكتاب </label>
                            <input type="file" name="book-image" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="">  وصف الكتاب </label>
                        <textarea class="form-control" name="book-des" id="" rows="5" placeholder="ادخل وصف الكتاب"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="">اسم الكاتب </label>
                        <input type="text" name="writer-name" class="form-control" placeholder="اضف اسم الكاتب">
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
