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

                //استدعاء البيانات الموجودة في حقل الادخال وتخزينها في متغير
                @$bTitle = $_POST['book-name'];
                @$bAuthor = $_POST['book-author'];
                @$bCat = $_POST['cate'];
                @$btype = $_POST['type'];
                @$bookPrice = $_POST['book-price'];
                @$bookImage = $_POST['book-image'];
                @$bookFile = $_POST['book-file'];               
                @$bContent = $_POST['discription'];
                @$bAdd = $_POST['book-save'];

                @$imageName = $_FILES['book-image']['name'];
                @$imageTemp = $_FILES['book-image']['tmp_name']; 
                
                if(isset($bAdd)){
                    if(empty($bTitle) || empty($bContent)){
                        echo "<div class='alert alert-danger'>لا يجب ترك الحقول فارغة</div>";
                    }
                    else{

                    
                    $bookImage = rand(0,1000) . "_" . $imageName;
                   
                    move_uploaded_file($imageTemp,"uploads\book\\".$bookImage) ;
                   
        
            
                    $sql = "INSERT INTO books(BookName,BookAuthor,bookCat,bookType,BookPrice,BookImage,BookFile,BookDesc) 
                    VALUES('$bTitle','$bAuthor','$bCat','$btype','$bookPrice','$bookImage','$bookFile','$bContent')";
                    $res = mysqli_query($con,$sql);
                    if(isset($res)){
                        echo "<div class='alert alert-success'>تمت الاضافة بنجاح</div>";
                    }
                    else{
                        echo "هناك خطأ ما ";
                    }
                }
            } if(!isset($_SESSION['id'])){
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
            <label for="">تصنيف الكتاب </label>
            <select class="form-control" name="cate" id="">
            <?php
                  $sql = "SELECT * FROM categories";
                  $res = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option><?php echo $row['categoryname']; ?></option>
                    <?php
                  }
                ?>

            </select>
          </div>
          <div class="form-group">
            <label for="">نوع الكتاب </label>
            <select class="form-control" name="type" id="">
            <?php
                  $sql = "SELECT * FROM booktype";
                  $res = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_assoc($res)){
                    ?>
                    <option><?php echo $row['type']; ?></option>
                    <?php
                  }
                ?>

            </select>
          </div>
                        <div class="form-group">
                        <label for="">  سعر الكتاب</label>
                            <input type="number" name="book-price" class="form-control" placeholder="اضف  سعر الكتاب">
                        </div>
                        <div class="form-group">
                        <label for="">ارفع صورة الكتاب</label>
                            <input type="file" name="book-image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">ارفع الكتاب</label>
                            <input type="text" name="book-file" class="form-control" placeholder="ادخل رابط درايف">
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
 <?php }}
 include "inc/footer.php" ?>
