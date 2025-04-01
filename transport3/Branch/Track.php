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


<nav class="nav">

 <ul class="nav nav-pills nav-justified">
  

  <li class="nav-item">
    <a class="nav-link " href="addConsignment.php"><strong>ADD CONSIGNMENT</strong></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="consStatus.php"><strong>CONSAIGNMENT STATUS</strong></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="Track.php"><strong>TRACK CONSIGNMENT</strong></a>
    </li>

     
  <li class="nav-item">
    <a class="nav-link " href="logout.php"><strong>LOGOUT</strong></a>
  </li>
</ul>

  
  
  
</nav>
<br>
<hr>



<div class="col-sm-8">
<form method="POST" action="#">

<label>Consignment Tracking ID</label><input type="text" class="form-control"  name="trackid" id="trackid" required="" placeholder="Consignment Tracking ID"><br>

  <input type="submit" name="Track" id="Track" value="TRACK" class="btn btn-danger">
  
</form>

</div>

  

<?php

if(isset($_POST['Track'])){

echo '<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Consignment ID</th>
      <th scope="col"> Status</th>
      <th scope="col"> Current Place </th>
      <th scope="col">Destination Place</th>
       <th scope="col">Time</th>
          <th scope="col">Distance</th>
    </tr>
  </thead>
  <tbody>
    ';
        include 'dbcon.php';


          $home_quer="SELECT * FROM consstatus Where CSid='".$_POST['trackid']."' ";
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
                  echo'<td> '.$row['CSid'].' </td>';
                    echo'<td> '.$row['status'].' </td>';
                      echo'<td> '.$row['presentBranch'].' </td>';
                        echo'<td> '.$row['destinationBranch'].' </td>';
                                 echo'<td> '.$row['dt'].' </td>';
                                     echo'<td> '.$row['dis'].' </td>';
                        
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



}
      ?>

</tbody>
</table>


</div>

<nav class="navbar fixed-top navbar-light bg-primary">
<marquee style="padding-top: 5px;">Welcome to Transport Management System</marquee>
</nav>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>