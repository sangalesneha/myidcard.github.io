<?php

error_reporting(0);
include("conn.php");
session_start();
error_reporting(0);

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $id=$_POST['id'];

    $query = "SELECT * FROM `stud` WHERE CONCAT('photo',`no`, `name`, `class`, `email`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `stud` WHERE no='$no'";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "studid");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>


?>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

  <div class="container">
<h2 class="text-center text-success">WELCOME<br><?php echo $_SESSION['username'];?></h2>
<div>
<a href="regi.php" class="text-expand-rg">LOGOUT</a>
</div>
<div class="container">
	
		<div class="col-lg-8 m-auto d-block">

	<h2 class="text-center">ID CARD FORM</h2><br>
	<br>

<form action="" method="POST" enctype="multipart/form-data">
<div><label>Upload file</label>
<input type="file" name="photo">
</div>
<div>
<lable>Adhar No</lable>
	<input type="text" name="no" id="no" class="form-control" required="No" >
</div>
<div><lable>Name</lable><input type="text" name="name" id="name" class="form-control" required="name"></div>
<div><lable>State</lable><input type="text" name="class" class="form-control" required="State"></div>
<div><lable>EmailId</lable><input type="email" name="email" class="form-control" required="email"></div>



<div><br><br>
  <button type="submit" name="submit" value="Submit" class="btn btn-primary" onclick="myfun()">
    Submit
  </button></div>
  if yo already fiil the form<a href="search.php"> click here...</a>

  
</form>

<?php
if($_POST['submit'])
{

$rn=$_POST['no'];
$sn=$_POST['name'];
$cl=$_POST['class'];
$em=$_POST['email'];
$filename=( $_FILES["photo"]["name"]);
$tempname=( $_FILES["photo"]["tmp_name"]);
$folder="student/".$filename;

move_uploaded_file($tempname,$folder);

	if($rn!="" && $sn!="" && $cl!="" && $em!=""  && $filename!="")
	{
		
       $query="INSERT  INTO stud VALUES ('$rn','$sn','$cl','$em','$folder')";
       $data=mysqli_query($conn,$query);

$num=mysqli_num_rows($data);

     
if($num==1)
{
	$_SESSION['username']=$rn;

	header('location:idd.php');
}else
{
header('location:search.php');
}

}

}


?>

<script>
	function myfun(){
		var x1=document.getElementById('no').value;
		alert("YOUR ID CARD NUMBER IS: "+x1);
	}
</script>
</body>
</html>