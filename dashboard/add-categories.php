
<?php 
session_start();

    if(!isset($_SESSION['id'])){
        echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
        header('location:login.php');
    
    }
    else{
include "inc/header.php" ;
 include "../file.php" ?>
                <?php
               

                @$cname = $_POST['category'];
                @$csend = $_POST['send'];

                @$id = $_GET['id'];

                if (isset($id)) {
                    $sql = "DELETE FROM categories WHERE id = '$id'";
                    $delt = mysqli_query($con, $sql);
                }

                if(!isset($_SESSION['id'])){
                    echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
                    header('REFRESH:3;URL=login.php');
                
                }
                else{
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">إضافة تصنيف </h1>

                    <div class="content">
                        <div class="continer-fluid">
                            <div class="row">
                                <div class="col-md-2 das">
                                </div>
                                <div class="col-md-10">

                                    <?php
                                    if (isset($csend)) {
                                        if (empty($cname)) {
                                            echo "<div class='alert alert-danger'> الحقل فارغ </div>";
                                        } elseif ($cname > 100) {
                                            echo "<div class='alert alert-danger'>اسم التصنيف كبير جدا</div>";
                                        } else {
                                            $query = "INSERT INTO categories(categoryname) VALUES('$cname')";
                                            mysqli_query($con, $query);
                                            echo "<div class='alert alert-success'>تم اضافة التصنيف بنجاح</div>";
                                        }
                                    }

                                    ?>
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <!-- <label class="ml-2" for=""> اسم التصنيف </label><br> -->
                                            <input type="text" class="form-control" name="category" placeholder="ادخل الاسم">
                                        </div><!-- /input-group -->
                                        <button type="submit" class="btn btn-primary mt-3 mb-3 " name="send">إضافة</button>
                                    </form>

                                    <div class="categories">
                                        <h2 class="py-4">كل التصنيفات</h2>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">اسم التصنيف</th>
                                                    <th scope="col">تاريخ الاضافة </th>
                                                    <th scope="col">حذف </th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM categories ORDER BY id DESC";
                                                $res = mysqli_query($con, $query);
                                                $id = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $id++;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $id ?></th>
                                                        <td><?php echo $row['categoryname'] ?></td>
                                                        <td><?php echo $row['categorydate'] ?></td>
                                                        <td><a href="add-categories.php?id=<?php echo $row['id'] ?>"><button type="submit" class="btn btn-danger">حذف</button></a></td>

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
                }}
            include "inc/footer.php" ?>
