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

                @$qTitle = $_POST['qurt-name'];
                @$qurtPrice = $_POST['qurt-price'];
                @$qurtImage = $_POST['qurt-image'];
                @$qAdd = $_POST['qurt-save'];

                @$imageName = $_FILES['qurt-image']['name'];
                @$imageTemp = $_FILES['qurt-image']['tmp_name']; 

                if(isset($qAdd)){
                    if(empty($qTitle)){
                        echo "<div class='alert alert-danger'>لا يجب ترك الحقول فارغة</div>";
                    }
                    else{

                    
                    $qurtImage = rand(0,1000) . "_" . $imageName;
                   
                    move_uploaded_file($imageTemp,"uploads\qurt\\".$qurtImage);
                    
            
                    $sql = "INSERT INTO qurtasia(qurtasianame,qurtasiaprice,qurtasiaimage) 
                    VALUES('$qTitle','$qurtPrice','$qurtImage')";
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
                    <h1 class="h3 mb-4 text-gray-800">إضافة القرطاسية </h1>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label for=""> اسم القرطاسية</label>
                            <input type="text" name="qurt-name" class="form-control" placeholder="اضف اسم الكتاب">
                        </div>

                        <div class="form-group">
                        <label for="">ارفع صورة القرطاسية</label>
                            <input type="file" name="qurt-image" class="form-control">
                        </div>
                        <div class="form-group">
                        <label for="">  سعر القرطاسية</label>
                            <input type="number" name="qurt-price" class="form-control" placeholder="اضف  سعر القرطاسية">
                        </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary px-5" name="qurt-save">حفظ</button>
                        </div>
                    </form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 <?php 
 
            }}
            include "inc/footer.php" ?>
