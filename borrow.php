<?php
session_start();
include_once("dbconfig/config.php");
if($_SESSION["User_ID"]==true){
    
}else{
    header('location:index.html');
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>CROWD BASED LENDING & BORROWING</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
 <link rel="stylesheet" type="text/css" href="css/borrow.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<script src="https://kit.fontawesome.com/a076d05399.js" ></script>



</head>
<body>

<header class="site-header clearfix">
 <nav>
  <div class="logo">
     <h1><img src="img/LOGO.png" height="70" width="70"></h1>
   
  </div>
  <div class="menu"> 
   <ul>
   <li ><a href="#"><button type="button">Welcome <?php echo $_SESSION['User_ID']; ?></button></a></li> 
    <li ><a href="LendBorrow.php"><button type="button">Lend/Borrow</button></a></li>
    <li ><a href="accountDetails.php"><button type="button">Update Account</button></a></li>
	<li ><a href="logout.php"><button type="button">Logout</button></a></li>
    
   </ul>
  </div>
 </nav>
 <section class="d-flex justify-content-center">
  
  <div class="rightside"> 
  <a href="newprojectform.php"><button class="button1">Create a new project</button></a></br></br>
  

   <div class="div1"><h3>Existing or previous borrows</h3></br>
   <?php
  
  
  
          $conn = config::conectphp();
                  $User_ID=$_SESSION['User_ID'];
                  
                  
          
                  try{
                  $sql = "SELECT  * FROM `project` WHERE `User_ID` = :User_ID";
                  // use exec() because no results are returned 
                  $stmt = $conn->prepare($sql);
                  $stmt->execute(array(":User_ID"=>$User_ID));
                  
              
                  foreach($stmt as $row){
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead class="thead-dark">
                      <tr class="table-dark">
                      
                          <th >User ID:</th>

                          <th>'.$row ["User_ID"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead>
                      <tr>
                      
                          <th >Project Name:</th>

                          <th>'.$row ["Name"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead>
                      <tr>
                      
                          <th >Category:</th>

                          <th>'.$row ["Category"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr>
                      
                          <th >Region:</th>

                          <th>'.$row ["Region"].'</th>
                      </tr>
                      </thead>';
                          
                          
                      
                          
                      
                      
                          
                      echo '</table>';
                      
                      

                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Borrowing Start Date:</th>

                          <th>'.$row ["Start_Date"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';

                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Borrowing End Date:</th>

                          <th>'.$row ["End_Date"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';

                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Amount Required:</th>

                          <th>'.$row ["Amount_Required"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Amount Gathered:</th>

                          <th>'.$row ["Amount_Gathered"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';
                      echo '<table class="table" width="70%" border="2" cellpadding="5" cellspacing="5">
                      <thead >
                      <tr >
                      
                          <th >Amount Pending:</th>

                          <th>'.$row ["Amount_Pending"].'</th>
                      </tr>
                      </thead>';
                      echo '</table>';
                          
                          
                      }
                      
                  }
                  catch(PDOException $e){
  
                  }
                  ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script> 
   </div></br></br>
   <a href="repaymentpage.php"><button class="button1">Repay</button></a>
   
  </div>
  
 </section>

</header>
<script>
     function change(src){
          window.location=src;
          
     }
</script>


</body>
</html>



