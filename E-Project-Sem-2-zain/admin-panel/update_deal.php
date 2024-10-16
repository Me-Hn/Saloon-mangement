<?php
include('connection.php');
session_start();
include('aside.php');
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
                <?php
                if (isset($_GET['ID'])) {
                    $id = $_GET['ID'];
                    $getData = mysqli_query($con, "SELECT * FROM `deals` WHERE `ID`='$id'");
                    $row = mysqli_fetch_array($getData);
                }
                ?>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Deal No</label>
                        <input type="text" name="update_no" value="<?php echo $row[1] ?> " class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Name</label>
                        <input type="text" name="update_name" value="<?php echo $row[2] ?> "class=" form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Description</label>
                        <input type="text" name="update_description" value="<?php echo $row[3] ?>" class=" form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Image</label>
                        <input type="file" name="update_image" value="<?php echo $row[4] ?>" class=" form-control"
                            id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Deal Price</label>
                        <input type="text" name="update_price" value="<?php echo $row[5] ?>" class=" form-control"
                            id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="update_btn" class="btn btn-primary">Update</button>
                    <?php
                    if (isset($_POST['update_btn'])) {
                        $dealno = $_POST['update_no'];
                        $dealname = $_POST['update_name'];
                        $dealdescription = $_POST['update_description'];
                        $dealimage = $_FILES['update_image']['name'];
                        $dealimage_temp = $_FILES['update_image']['tmp_name'];
                        $extension = pathinfo($dealimage, PATHINFO_EXTENSION);
                        $destination = "img/" . $dealimage;
                        $dealprice = $_POST['update_price'];
                        if ($extension == 'jpg' || $extension == 'jped' || $extension == 'png') {
                            if (move_uploaded_file($dealimage_temp, $destination)) {
                                $updatequery = mysqli_query($con, "UPDATE `deals` SET `Deal_no`='$dealno',`Name`=' $dealname',`Description`='$dealdescription',`image`='$dealimage',`Price`='$dealprice' WHERE `ID`='$id'");
                                if ($updatequery) {
                                    echo "<script>alert('Deal Updated Sucessfully');
                                    window.location='View offers.php';
                                    </script>";
                                }

                            }
                        } else {
                            echo "<script>alert('Extension Dosenot Matched');</script>";
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
</div>