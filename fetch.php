<?php
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

<style>
  
 

.card-wrapper {
  width: 100%;
  max-width: 300px;
  min-height: 400px;
  background: white;
  border-radius: 4px;
  box-shadow: 0 7px 20px 0 rgba(0, 0, 0, 0.2);
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-flow: column wrap;
  position: relative;
  overflow: hidden;
  z-index: 10;
}

.card-wrapper img.brand-logo {
  width: 60px;
  margin:0 12px 7px;
}

.card-wrapper h5 {
  color: #222;
  text-transform: uppercase;
  margin: 12px 0 7px;
}

.card-wrapper p {
  color: #666;
  font-size: 13px;
  text-transform: uppercase;
  font-family: "Roboto", sans-serif;
}


/* WAVES ANIMATION */

.card-wrapper .wave {
  width: 1500px;
  height: 1500px;
  position: absolute;
  top: 100%; left: 50%;
  margin-left: calc(1500px / -2);
  background: #05e;
  border-radius: 43%;
  z-index: 11;
 animation: waves 20s infinite linear;
  opacity: 0.75;
}

.card-wrapper .wave.wave-two {
  animation: waves 30s infinite linear;
  background: yellow;
}

.card-wrapper .wave.wave-three {
  animation: waves 40s infinite linear;
  background: red;
}

@keyframes waves {
  from { transform: rotate(360deg); }
}



/* -- THIS IS FOR BRANDING PURPOSE ONLY -- */
/* ------- YOU MAY DELETE THIS CODE ------ */

.card-wrapper {
  margin-top: -50px;
}

.header-section{
width:100%;
height:inherit;
text-align:center;
position:relative;


}
.header-section h5{
  margin-top: 10%; 
}

.card-header{
      width:100%;
      height:inherit;
      background-color:orange; 
      background-size: cover;
      background-repeat: no-repeat;
      position:absolute;
      top:50%;
     left:50%
    transform:translate(-50%,-50%);

      clip-path: polygon(0% 0%,100% 0%,100% 75%,50% 100%,0% 75%);

    }
    tr{
      background-color: #F0E68C;
    }

  
        </style>
    </head>
    <body>

  <div class="container">
<h2 class="text-center text-success">WELCOME<br><?php echo $_SESSION['username'];?></h2>
<div>
<a href="regi.php" class="text-expand-rg">LOGOUT</a>
</div>
    <br>
    <br>
 <div id="divone">
        <div class="col-lg-4 m-auto d-block">
         <div class="container border-10">

        <div class="col-lg-8 m-auto d-block">
    <div class="card" style="width:300px">
  
   <div class="card-wrapper">
     <div class="wave wave-one"></div>
     <div class="wave wave-two"></div>
     <div class="wave wave-three"></div>

<section class="header-section">
  <div class="card-header text-center">

  <div class="center-div">

  <h5 class="pt-8">DADDY GROUP</h5>
     <img class="brand-logo" src="FB_IMG_1509008040509.jpg" alt="" style="border-radius: 100%">
  </div></div><br>
</section>

    <h6 class="card-title text-center">ID CARD</h6><br>
    

     <img class="brand-logo" src="vote-for-your-party-i-bharatiya-janata-party-symbols-pin-badge-500x500.png" alt="">
     <br>
  


      
      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>

                    <p class='card-text'><?php echo"<tr><td><img src='".$row['photo']."'' height='100' width='100' style='border-radius:100%'/></td><tr>";?></p>
                    <p class='card-text'>ID no:<?php echo $row['no'];?></p>
                    <p class='card-text'>Name:<?php echo $row['name'];?></p>
                    <p class='card-text'>State:<?php echo $row['class'];?></p>
                    <p class='card-text'>Email:<?php echo $row['email'];?></p>
                </tr><br>
                <?php endwhile;?>
            



    </div>

    <div>
        </div><br><br>
        </div>
    </div>
  </div>
</div>
</div></div>

        <div><br><br>
          <button onclick="myfun('divone')" class="btn btn-primary hidden-print" id="print" >PRINT HERE...</button></div>

          
    
        <script type="text/javascript">
    

   function myfun(paravalue){
    var backup=document.body.innerHTML;
    var divcontent=document.getElementById(paravalue).innerHTML;
    document.body.innerHTML=divcontent;
      window.print();

    document.body.innerHTML=backup;


   }


</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#search').on('click',function(){
      $('#search').toggle(4000,function(){
        alert('Toggled!');
      });
    });
  });
</script>

    </body>
</html>


