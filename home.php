
<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
header('location:regi.php');
}

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $id=$_POST['id'];

    $query = "SELECT * FROM `student` WHERE CONCAT('photo',`no`, `name`, `class`, `email`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `student` WHERE id='$id'";
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


<!DOCTYPE html>
<html>
<head>
	<title></title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
<h2 class="text-center text-success">WELCOME<br><?php echo $_SESSION['username'];?></h2>
<a href="destroy.php">LOGOUT</a>
<div class="container">
    
        <div class="col-lg-8 m-auto d-block">
        <form action="registration.php" method="post">
            <div>
               <label>PLEASE ENTER YOUR LAST 8 DIGIT ADHAR HERE... </label><input type="text" name="valueToSearch" placeholder="Value To Search" class="form-control"><br></div>

            <div><input type="submit" name="search" value="Search" class="btn btn-success"><br><br></div>
            <div id="divone">
                <div class="container">
  <div class="card" style="width:400px">
    <div class="card-body">
      <h4 class="card-title">ID CARD</h4>
  
  


            
    <div class="container">
                <div class="col-lg-8 m-auto d-block">
   
  </div>
</div>
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>

                    <p class='card-text'><?php echo"<tr><td><img src='".$row['photo']."'' height='100' width='100'/></td><tr>";?></p>
                    <p class='card-text'>Roll no:<?php echo $row['no'];?></p>
                    <p class='card-text'>:Name:<?php echo $row['name'];?></p>
                    <p class='card-text'>Class:<?php echo $row['class'];?></p>
                    <p class='card-text'>Email:<?php echo $row['email'];?></p>
                </tr>
                <?php endwhile;?>
            


    </div>

    <div>
        </div><br><br>
        <div>
          <button onclick="myfun('divone')" class="btn btn-primary">PRINT HERE...</button></div>
        </div>
    </div>
  


    
        <script type="text/javascript">
    

   function myfun(paravalue){
    var backup=document.body.innerHTML;
    var divcontent=document.getElementById(paravalue).innerHTML;
    document.body.innerHTML=divcontent;
      window.print();

    document.body.innerHTML=backup;


   }

</script>



</div>
</body>
</html>