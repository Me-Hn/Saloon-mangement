<?php
include('connection.php');
session_start();
include('aside.php');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Form</h1>
    <p class="mb-4">You Can Add New Staff Members Who Join Your Salon. </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Staff Members Record</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post">
                    <?php
                    if (isset($_GET['ID'])) {
                        $getid = $_GET['ID'];
                        $fetch = mysqli_query($con, "SELECT * FROM `staff` WHERE `ID`='$getid'");
                        $row = mysqli_fetch_array($fetch);
                    } ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">ID</label>
                        <input type="text" name="updateID" value="<?php echo $row['0'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="updatename" value="<?php echo $row['1'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Position</label>
                        <input type="text" name="updateposition" value="<?php echo $row['2'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Phone No</label>
                        <input type="number" name="updatephone_no" value="<?php echo $row['3'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Cnic No</label>
                        <input type="number" name="updatecnic_no" value="<?php echo $row['4'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Age</label>
                        <input type="number" name="updateage" value="<?php echo $row['5'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Start Date</label>
                        <input type="date" name="updatedate" value="<?php echo $row['6'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Salary</label>
                        <input type="text" name="updatesalary" value="<?php echo $row['7'] ?>" class="form-control"
                            id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" name="addmember_btn" 
                        class="btn btn-primary">Submit</button>
                    <?php
                    if (isset($_POST['addmember_btn'])) {
                        $update_id = $_POST['updateID'];
                        $name = $_POST['updatename'];
                        $position = $_POST['updateposition'];
                        $phone_no = $_POST['updatephone_no'];
                        $cnic = $_POST['updatecnic_no'];
                        $age = $_POST['updateage'];
                        $date = $_POST['updatedate'];
                        $salary = $_POST['updatesalary'];
                        $update = mysqli_query($con, "UPDATE `staff` SET `ID`='$update_id',`Name`='$name',`Position`='$position',`Phone No`='$phone_no',
                        `Cnic No`='$cnic',`Age`='$age',`Start date`='$date',`Salary`='$salary' WHERE `ID`='$getid'");
                        if ($update) {
                            echo "<script>alert('Staff Member Record Update Sucessfully');
                            window.location.href='tables.php';</script>";
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