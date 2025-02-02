<?php
include('connection.php');
session_start();
include('aside.php');
if(isset($_SESSION['username'])==null){
    echo"<script>window.location='login.php'</script>";
}
else{
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
                        <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone no</th>
                            <th>Password</th>
                            <th>Confrim Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone no</th>
                            <th>Password</th>
                            <th>Confrim Password</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <?php
                            $ffetch = mysqli_query($con, "SELECT * FROM `userregister`");
                            while ($rrow = mysqli_fetch_array($ffetch)) {
                                ?>
                                <td><?php echo $rrow[0] ?></td>
                                <td><?php echo $rrow[1] ?></td>
                                <td><?php echo $rrow[2] ?></td>
                                <td><?php echo $rrow[3] ?></td>
                                <td><?php echo $rrow[4] ?></td>
                                <td><?php echo $rrow[5] ?></td>
                                <td><a href="Update client.php?ID=<?php echo $rrow[0] ?>"><button type="button"
                                            class="btn btn-primary">Update</button></a>
                                    <a href="client.php?ID=<?php echo $rrow[0] ?>"><button type="button"
                                            onclick="return confirm('Are u Sure You Want To Delete This Client Record')"
                                            class="btn btn-Danger">Delete</button></a>
                                </td>
                          

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php
                if (isset($_GET['ID'])) {
                    $getid = $_GET['ID'];
                    $del = mysqli_query($con, "DELETE FROM `userregister` WHERE `ID`='$getid'");
                    if ($del) {
                        echo "<script>alert('Record Delete Sucessfully');
                        window.location.href='Client.php';</script>";
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
</div><?php }?>