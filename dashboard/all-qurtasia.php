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
    @$id = $_GET['id'];

    if (isset($id)) {
        $sql = "DELETE FROM qurtasia WHERE id = '$id'";
        $delt = mysqli_query($con, $sql);
    }
 
    ?>
    <!-- Page Heading -->


    <div class="content">
        <!-- <div class="continer-fluid"> -->
        <div class="row">
            <div class="col-md-12">

                <div class="posts mt-3 mb-4">
                    <h2 class="mb-4">كل القرطاسية</h2>
                    <table class="table table-hover">
                        <tr>
                            <th>رقم القرطاسية </th>
                            <th>اسم القرطاسية</th>
                            <th>سعر القرطاسية</th>
                            <th>صورة القرطاسية</th>
                            <th>تاريخ الاضافة </th>
                            <th>حذف </th>
                        </tr>
                        <?php

                        $sql = "SELECT * FROM qurtasia ORDER BY id DESC";
                        $res = mysqli_query($con, $sql);
                        $no = 0;
                        while ($row = mysqli_fetch_assoc($res)) {
                            $no++;
                        ?>

                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['qurtasianame']; ?></td>
                                <td><?php echo $row['qurtasiaprice']; ?></td>
                                <td> <img src="uploads/qurt/<?php echo $row['qurtasiaimage']; ?>" width="70px" alt="img"> </td>
                                <td><?php echo $row['qurtasiadate']; ?></td>
                                <td><a href="all-qurtasia.php?id=<?php echo $row['id'] ?>"><button class="btn btn-danger">حذف </button></a></td>

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