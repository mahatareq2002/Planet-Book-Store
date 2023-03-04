<?php
session_start();
if(!isset($_SESSION['id'])){
    echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
    header('location:login.php');

}
else{
 include "inc/header.php";
 include "../file.php";

                @$id = $_GET['id'];

                if (isset($id)) {
                    $sql = "DELETE FROM contact WHERE id = '$id'";
                    $delt = mysqli_query($con, $sql);
                }
                

                //  
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->

                    <div class="content">
                        <div class="continer-fluid">
                            <div class="row">
                                <div class="col-md-2 das">
                                </div>
                                <div class="col-md-10">

                                    <div class="booktype">
                                        <h2 class="py-4">كل السائل</h2>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">اسم المرسل</th>
                                                    <th scope="col">بريد المرسل</th>
                                                    <th scope="col"> نص الرسالة</th>
                                                    <th scope="col">تاريخ الرسالة </th>
                                                    <th scope="col">حذف </th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $query = "SELECT * FROM contact ORDER BY id DESC";
                                                $res = mysqli_query($con, $query);
                                                $id = 0;
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    $id++;
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $id ?></th>
                                                        <td><?php echo $row['name'] ?></td>
                                                        <td><?php echo $row['email'] ?></td>
                                                        <td><?php echo $row['message'] ?></td>
                                                        <td><?php echo $row['date'] ?></td>
                                                        <td><a href="contact.php?id=<?php echo $row['id'] ?>"><button type="submit" class="btn btn-danger">حذف</button></a></td>

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
         ?>
