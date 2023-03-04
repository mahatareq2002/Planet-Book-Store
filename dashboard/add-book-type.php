<!-- <?php
// جلسة الحماية
session_start();
// فحص تسجيل الدخول 
if(!isset($_SESSION['id'])){
    echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
    header('location:login.php');

}
// تضمين الصفحات 
else{
 include "inc/header.php";
 include "../file.php";


                //استدعاء البيانات الموجودة في حقل الادخال وتخزينها في متغير 
                @$cname = $_POST['booktype'];
                @$csend = $_POST['send'];

                @$id = $_GET['id'];

                // جملة استعلام لحذ البيانات + كود تنفيذ الاستعلام     
                if (isset($id)) {
                    $sql = "DELETE FROM booktype WHERE id = '$id'";
                    $delt = mysqli_query($con, $sql);
                }
                

            
                ?>
               <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">إضافة نوع الكتاب  </h1>

                    <div class="content">
                        <div class="continer-fluid">
                            <div class="row">
                                <div class="col-md-2 das">
                                </div>
                                <div class="col-md-10">

                                    <!-- التحقق من المدخلات -->
                                    <?php
                                    if (isset($csend)) {
                                        if (empty($cname)) {
                                            echo "<div class='alert alert-danger'> الحقل فارغ </div>";
                                        } elseif ($cname > 100) {
                                            echo "<div class='alert alert-danger'>اسم التصنيف كبير جدا</div>";
                                        } else {
                                            // جملة استعلام لتخزين البيانات + كود التنفيذ
                                            $query = "INSERT INTO booktype(type) VALUES('$cname')";
                                            mysqli_query($con, $query);
                                            echo "<div class='alert alert-success'>تم اضافة التصنيف بنجاح</div>";
                                        }
                                    }

                                    ?>
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <!-- <label class="ml-2" for=""> اسم التصنيف </label><br> -->
                                            <input type="text" class="form-control" name="booktype" placeholder="ادخل الاسم">
                                        </div><!-- /input-group -->
                                        <button type="submit" class="btn btn-primary mt-3 mb-3 " name="send">إضافة</button>
                                    </form>

                                    <div class="booktype">
                                        <h2 class="py-4">كل الانواع </h2>
                                        <table class="table">
                                            <thead>

                                                <!-- عرض البيانات على شكل جدول -->
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">اسم نوع الكتاب </th>
                                                    <th scope="col">تاريخ الاضافة </th>
                                                    <th scope="col">حذف </th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                // جملة تنفيذ الاستعلام + كود التنفيذ
                                                $query = "SELECT * FROM booktype ORDER BY id DESC";
                                                $res = mysqli_query($con, $query);
                                                $id = 0;
                                                // جملة تكرار لاستمرار الطباعة 
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $id++;
                                                ?>
                                                           <!-- طباعة البيانات  -->
                                                    <tr>
                                                        <th scope="row"><?php echo $id ?></th>
                                                        <td><?php echo $row['type'] ?></td>
                                                        <td><?php echo $row['date'] ?></td>
                                                        <td><a href="add-book-type.php?id=<?php echo $row['id'] ?>"><button type="submit" class="btn btn-danger">حذف</button></a></td>

                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php 
        }
        include "inc/footer.php";
         ?> -->
