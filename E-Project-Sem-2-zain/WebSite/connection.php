<?php
$con = mysqli_connect('localhost', 'root', '', 'salon');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>