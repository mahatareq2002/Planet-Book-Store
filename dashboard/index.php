<?php
session_start();

    if(!isset($_SESSION['id'])){
        echo "<div class = 'alert alert-danger'>" . "غير مصرح لك الدخول" . "</div>";
        header('location:login.php');
    
    }
    else{
include "inc/header.php" ;
include "../file.php" ?>


<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    @$id = $_GET['id']; 

    if (isset($id)) {
        $sql = "DELETE FROM books WHERE id = '$id'";
        $delt = mysqli_query($con, $sql);
    }

    ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"> كل الكتب </h1>


    <div class="content">
        <!-- <div class="continer-fluid"> -->
        <div class="row">
            <div class="col-md-12">

                <div class="posts mt-3 mb-4">
                    <table class="table table-hover">
                        <tr>
                            <th>رقم الكتاب</th>
                            <th>اسم الكتاب</th>
                            <th>كاتب الكتاب</th>
                            <th>تصنيف الكتاب</th>
                            <th>سعر الكتاب</th>
                            <th>صورة الكتاب</th>
                            <th>ملخص الكتاب</th>
                            <th>تاريخ الإضافة</th>
                            <th>حذف الكتاب</th>
                        </tr>
                        <?php

                        $sql = "SELECT * FROM books ORDER BY id DESC";
                        $res = mysqli_query($con, $sql);
                        $no = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $no++;
                        ?>

                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['BookName']; ?></td>
                                <td><?php echo $row['BookAuthor']; ?></td>
                                <td><?php echo $row['bookCat']; ?></td>
                                <td><?php echo $row['BookPrice']; ?></td>
                                <td> <img src="uploads/book/<?php echo $row['BookImage']; ?>" width="70px" alt="img"> </td>
                                <td><?php echo $row['BookDesc']; ?></td>
                                <td><?php echo $row['BookDate']; ?></td>
                                <td><a href="all-book.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger">حذف </button></a></td>

                            </tr>
                        <?php

                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- </div> -->
    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?php
    }
include "inc/footer.php" ?>