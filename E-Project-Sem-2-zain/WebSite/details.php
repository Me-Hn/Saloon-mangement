<?php
include('connection.php');
session_start(); // Make sure to start the session
if (isset($_POST['submitbtn'])) {
    $_SESSION['Cart'][0] = array(
        'pid' => $_POST['cid'],
        'pname' => $_POST['cname'],
        'pemail' => $_POST['cemail'],
        'pslote' => $_POST['cslote'],
        'pdate' => $_POST['cdate'],
        'pnumber' => $_POST['cnumber'],
        'phairs' => $_POST['hser'],
        'pbeards' => $_POST['bser'],
        'pfaect' => $_POST['fser'],
        'phairt' => $_POST['hhser']
    );
    echo "<script>alert('Appointment done'); window.location='viewappointment.php';</script>";
}


if (isset($_POST['offerbtn'])) {
    $_SESSION['offerCart'][0] = array(
        'dealno'=>$_POST['dealno'],
        'image' => $_POST['image'],
        'name' => $_POST['name'],
        'descrip' => $_POST['des'],
        'price'=>$_POST['prics']


    );
    echo "<script> window.location='slots.php';</script>";
}
if(isset($_POST['osumit'])){
$_SESSION['finalcard'][0]=array(
    'did'=>$_POST['cid'],
    'dname'=>$_POST['cname'],
    'demial'=>$_POST['cemail'],
    'dslote'=>$_POST['cslote'],
    'ddate'=>$_POST['cdate'],
    'dphone'=>$_POST['cnumber'],
    'ddeal'=>$_POST['dealer']

); echo "<script> window.location='view offer oppointment.php';</script>";

}
?>