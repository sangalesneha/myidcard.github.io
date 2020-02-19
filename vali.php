<?php
error_reporting(0);
session_start();
$con=mysqli_connect('localhost','root','');
if($con){
	echo "connection successfull";

}else
{
	echo"no connection";
}

mysqli_select_db($con,'idprint');

$name=$_POST['user'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$date=$_POST['date'];
$address=$_POST['address'];
$pass=$_POST['password'];

$q="SELECT * FROM info WHERE name='$name' && email='$email' && mobile='$mobile' && date='$date' && address='$address' && password='$pass' ";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);


if($num==1){
	$_SESSION['username']=$name;
	header('location:fo.php');
}else
{
header('location:vali.php');
}
?>