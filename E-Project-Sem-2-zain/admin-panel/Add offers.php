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
            <h6 class="m-0 font-weight-bold text-primary">Add Deals Form</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Deal No</label>
                        <input type="number" name="deal_no" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Name</label>
                        <input type="text" name="deal_name" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Description</label>
                        <input type="text" name="deal_description" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Image</label>
                        <input type="file" name="deal_image" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Price</label>
                        <input type="text" name="deal_price" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="sumbit_btn" class="btn btn-primary">Submit</button>
                    <?php
                    if (isset($_POST['sumbit_btn'])) {
                        $dealno = $_POST['deal_no'];
                        $dealname = $_POST['deal_name'];
                        $dealdescription = $_POST['deal_description'];
                        $dealimage = $_FILES['deal_image']['name'];
                        $dealimage_temp = $_FILES['deal_image']['tmp_name'];
                        $extension=pathinfo($dealimage,PATHINFO_EXTENSION);
                        $destination="img/".$dealimage;
                        $dealprice = $_POST['deal_price'];
                        if($extension=='jpg'||$extension=='jped'||$extension=='png'){
                            if(move_uploaded_file($dealimage_temp,$destination)){
                                $offerquery=mysqli_query($con,"INSERT INTO `deals`( `Deal_no`, `Name`, `Description`, `image`, `Price`) VALUES ('$dealno','$dealname','$dealdescription','$dealimage',' $dealprice')");
                           if($offerquery){
                            echo"<script>alert('Deal Submitted Sucessfully');</script>";
                           }
                           
                            }
                        }else{
                            echo"<script>alert('Extension Dosenot Matched');</script>";
                        }
                    }
                    ?>
                </form>
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