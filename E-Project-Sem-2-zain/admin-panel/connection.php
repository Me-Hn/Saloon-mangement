<?php
$con=mysqli_connect("localhost","root","","salon");
if(mysqli_connect_errno()){
    echo"Database Connection Failed";}
    else{
        echo"DataBase Connected Sucessfully";
    }

?>