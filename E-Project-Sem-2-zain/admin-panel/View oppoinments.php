<?php
include('connection.php');
session_start();
include('aside.php');
if (isset($_SESSION['username']) == null) {
    echo "<script>window.location='login.php'</script>";
} else {
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
            For more information about DataTables, please visit the <a target="_blank"
                href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Staff Records</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Slote</th>
                                <th>Date</th>
                                <th>PhoneNo</th>
                                <th>Hair Style</th>
                                <th>Beard Style</th>
                                <th>Face Treat</th>
                                <th>Hair Treat</th>
                                <th>Dealno</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Client ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Slote</th>
                                <th>Date</th>
                                <th>PhoneNo</th>
                                <th>Hair Style</th>
                                <th>Beard Style</th>
                                <th>Face Treat</th>
                                <th>Hair Treat</th>
                                <th>Dealno</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <?php
                                $fetch = mysqli_query($con, "SELECT * FROM `appointement`");
                                while ($row = mysqli_fetch_array($fetch)) {
                                    ?>
                                    <td><?php echo $row[1] ?></td>
                                    <td><?php echo $row[2] ?></td>
                                    <td><?php echo $row[3] ?></td>
                                    <td><?php echo $row[4] ?></td>
                                    <td><?php echo $row[5] ?></td>
                                    <td><?php echo $row[6] ?></td>
                                    <td><?php echo $row[7] ?></td>
                                    <td><?php echo $row[8] ?></td>
                                    <td><?php echo $row[9] ?></td>
                                    <td><?php echo $row[10] ?></td>
                                    <td><?php echo $row[11]?></td>
                                    <td><a href="update tables.php?ID=<?php echo $row[0] ?>"><button type="button"
                                                class="btn btn-primary">Update</button></a>
                                        <a href="View oppoinments.php?IDD=<?php echo $row[1] ?>"><button type="button"
                                                onclick="return confirm('Are u Sure This Customer Arrived ')"
                                                class="btn btn-PRimary">Arrived</button></a>
                                    </td>


                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php
                    if (isset($_GET['IDD'])) {
                        $ggetid = $_GET['IDD'];
                        $dfetch = mysqli_query($con, "SELECT * FROM `appointement` WHERE `client_id`='$ggetid'");
                        $datarow = mysqli_fetch_array($dfetch);

                        $ceid = $datarow[1];
                        $cename = $datarow[2];
                        $ceemail = $datarow[3];
                        $ceslote = $datarow[4];
                        $cedate = $datarow[5];
                        $cephone = $datarow[6];
                        $cehairst = $datarow[7];
                        $cebest = $datarow[8];
                        $cefate = $datarow[9];
                        $cehate = $datarow[10];
                        $deall=$datarow[11];
                        $insertdata = mysqli_query($con, "INSERT INTO `history_appointment`(`client_id`, `Name`, `Email`, `Slote`, `Date`, `Phone_No`, `Hair_Style`, `Beard_Style`, `Face_Treat`, `Hair_Treat`, `Deal_no`) 
                        VALUES (' $ceid','$cename','$ceemail','$ceslote',' $cedate','$cephone','$cehairst','$cebest','$cefate','$cehate','$deall')");
                        if ($insertdata) {
                            echo "<script>alert('Record Added in History Sucessfully');
                            window.location.href='View oppoinments.php';</script>";
                            $dell = mysqli_query($con, "DELETE FROM `appointement`WHERE `client_id`='$ggetid'");
                            if ($dell) {

                                echo "<script>alert('Record Delete Sucessfully');
                            window.location.href='View oppoinments.php';</script>";
                            }
                        }


                    }
                    ?>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2020</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div><?php } ?>