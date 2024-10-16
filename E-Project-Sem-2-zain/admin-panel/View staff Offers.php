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


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!--  -->
                <?php
                $offers = mysqli_query($con, "SELECT * FROM `deals`");
                while ($row = mysqli_fetch_array($offers)) {
                    ?>
                    <h4 class="text-primary"><b>Deal &nbsp; <?php echo $row[1] ?></b></h4>
                    <div class="card mb-3" style="max-width: 800px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <img src="img/<?php echo $row[4] ?>" style="height:200px ; width:100% ;"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row[2] ?> </h5>
                                    <p class="card-text"><?php echo $row[3] ?></p>
                                    <p class="card-text">PKR<small class="text-body-secondary"><?php echo $row[5] ?></small>
                                    </p>
                                   <!--  <a href="update_deal.php?ID=<?php echo $row[0]; ?>"><button type="button"
                                            class="btn btn-primary">Update</button></a>
                                    <a href="View offers.php?ID=<?php echo $row[0]; ?>"><button type="button"
                                            class="btn btn-Danger">Delete</button></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
                <?php
                if (isset($_GET['ID'])) {
                    $id = $_GET['ID'];
                    $delquery = mysqli_query($con, "DELETE FROM `deals` WHERE `ID`='$id'");
                    if($delquery) {
                        echo "<script>alert('Deal Deleted Sucessfully');
                     window.location='View offers.php';</script>";
                    }
                }
                ?>
                <!--  -->
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