<?php
//constant
define("PROJECT_NAME","My New Project - A messenger for you");


//connection work
$connect=mysqli_connect("localhost","root","","pakhi") or die("db failed");

//session
session_start();

//redirect function
function redirect($page){
    echo "<script>window.open('$page','_self')</script>";
}
function alert($msg){
    echo "<script>alert('$msg')</script>";
}

if(isset($_SESSION['account'])){
    $email=$_SESSION['account'];
    $query = mysqli_query($connect, "select * from accounts where email='$email'");
    $getUserData = mysqli_fetch_array($query);
}

//get my user id
//$myUserId = $getUserData['user_id'];
$myUserId = isset($getUserData['user_id']) ? $getUserData['user_id'] : null;
?>