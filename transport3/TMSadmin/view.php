<?php
session_start();if ($_SESSION['Email']==null) {
//sleep(5);
 echo "<script>alert('Session Expired . Please Login Again');
            window.location='../index.php';
            </script>";

}?>
<!DOCTYPE html>
<html>
<head>
	<title>TMS Admin Panel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
</head>
<body>
<header style="height: 45px; padding-left: 9px; padding-top: 9px;" class="bg-primary text-white"><b>Transport Management System Admin Panel</b></header>
<div class="container">

<br>



<?php 

$consignmentid=$_GET['CSid'];

echo $consignmentid;




?>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
       <th scope="col">Sender Name</th>
      <th scope="col">Reciever Name</th>
      <th scope="col">Sender Address</th>
        <th scope="col">Reciver Address</th>
          <th scope="col">Details</th>
           <th scope="col">Distance</th>
      
    </tr>
  </thead>
  <tbody>
   <?php



        include 'dbcon.php';


          $home_quer="SELECT * FROM consdetails WHERE consID=$consignmentid  ";
          $home_quer_res=$con->prepare($home_quer);
          $home_quer_res->execute();

            try 
              {
                if ($home_quer_res)
                {
                  $home_quer_res_as=$home_quer_res->fetchAll();
                  foreach ($home_quer_res_as as $row) 
                  {   
                  echo"<tr>";
                  echo'<td><b><u> '.$row['consID'].' </u></b> </td>';
                   echo'<td> '.$row['senderName'].' </td>';
                    echo'<td> '.$row['recieverName'].' </td>';
                      echo'<td> '.$row['senderAddress'].' </td>';
                        echo'<td> '.$row['recieverAddress'].' </td>';
                           echo'<td> '.$row['details'].' </td>';
                               echo'<td> '.$row['distance'].' </td>';
                         
                        
  //echo ;
                    
                  }
                }
                else {
                      echo "Error In Fetching";
                }

              }

              catch(PDOException $pe)
              {
                echo $pe;
              }




      ?>

  </tbody>
</table>
<hr>



<div class="col-sm-8">
<h2><b>Update Status</b></h2>
<form method="POST" action="#">

<label>ID</label><input type="text" class="form-control"  name="senderName"  value ="<?php echo $consignmentid; ?>" readonly id="senderName"  required="" placeholder="Enter Sender Name"><br>
<label>Status</label>

<select  class="form-control"  name="Status" id="Status" required="" >
	<option>In Transit</option>
	<option>Delivered</option>
	<option>Cancelled</option>
</select>

<br>
<label>Present Branch</label>

<select  class="form-control"  name="pb" id="pb" required="" >
	<?php



        include 'dbcon.php';


          $home_quer="SELECT * FROM branches ";
          $home_quer_res=$con->prepare($home_quer);
          $home_quer_res->execute();

            try 
              {
                if ($home_quer_res)
                {
                  $home_quer_res_as=$home_quer_res->fetchAll();
                  foreach ($home_quer_res_as as $row) 
                  {   
                 
                    echo'<option> '.$row['branchName'].' </option>';
                     
                        
  //echo ;
                    
                  }
                }
                else {
                      echo "Error In Fetching";
                }

              }

              catch(PDOException $pe)
              {
                echo $pe;
              }




      ?>

</select>
<label>Destination Branch</label><select  class="form-control"  name="db" id="db" required="" >
	<?php



        include 'dbcon.php';


          $home_quer="SELECT * FROM branches ";
          $home_quer_res=$con->prepare($home_quer);
          $home_quer_res->execute();

            try 
              {
                if ($home_quer_res)
                {
                  $home_quer_res_as=$home_quer_res->fetchAll();
                  foreach ($home_quer_res_as as $row) 
                  {   
                 
                    echo'<option> '.$row['branchName'].' </option>';
                     
                        
  //echo ;
                    
                  }
                }
                else {
                      echo "Error In Fetching";
                }

              }

              catch(PDOException $pe)
              {
                echo $pe;
              }




      ?>
</select><br>

<br>

  <input type="submit" name="statusupdate" id="statusupdate" value="Record Status" class="btn btn-dstatusupdate"/>
</form>

</div>
<?php


include "dbcon.php";

if (isset($_POST['statusupdate']))
{

$query="INSERT INTO consstatus (CSid,status,presentBranch,destinationBranch,distance) VALUES('$consignmentid' ,'".$_POST['Status']."','".$_POST['pb']."','".$_POST['db']."')";
$result=$con->prepare($query);
$result->execute();


                if($result)  
                {  
                    echo "<script>alert('Location Status Updated Successfully');
            window.location='consStatus.php';
            </script>";
                }  
else

{
    //$errMsg = 'Username and Password are not found<br>';
    echo '<script language="javascript">';
echo 'confirm("Something Went Wrong!!!!?")';
echo '</script>';

}
}

 ?>
</div>
<br>



</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>