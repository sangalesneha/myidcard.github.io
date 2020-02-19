
<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    </head>
    <body>
        
  <div class="container">
<h2 class="text-center text-success">WELCOME<br><?php echo $_SESSION['username'];?></h2>
<div>
<a href="regi.php" class="text-expand-rg">LOGOUT</a>
</div>
<div class="container">
    
        <div class="col-lg-8 m-auto d-block">
        <form action="fetch.php" method="post" onsubmit="return myfun()">
            <div>
               <label>PLEASE ENTER LAST 8 DIGIT OF ADHAR HERE... </label><input type="text" id="adhar" name="valueToSearch" placeholder="LAST 8 DIGIT OF ADHAR" class="form-control" required autocomplete="off">
               <span id="message"></span><br></div>

            <div><input type="submit" name="search" value="Search" id="search" class="btn btn-success"><br></div>


<script type="text/javascript">
  function myfun(){
    var adhar=document.getElementById('adhar').value;
    if(adhar.lenght<2){
      document.getElementById('message').innerHTML="*****LAST 8 DIGIT REQIRED";
      return false;
    }
  }
</script>
</form>
</div>
</div>
</div>
</body>
</html>

           
           