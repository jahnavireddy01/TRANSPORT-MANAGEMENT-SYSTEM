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
    <a class="nav-link " href="addBranch.php"><strong>ADD BRANCH</strong></a>
  </li>

   <li class="nav-item">
    <a class="nav-link " href="viewBranch.php"><strong>VIEW BRANCHES</strong></a>

  </li>

   <li class="nav-item">
    <a class="nav-link " href="viewAll.php"><strong>VIEW ALL CONSIGNMENTS</strong></a>
  </li>

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

<label>Branch Name</label><input type="text" class="form-control"  name="bname" id="bname" required="" placeholder="Enter Branch Name"><br>
<label>Branch Code </label><input type="text" class="form-control"  name="bcode" id="bcode" required="" placeholder="Enter Branch Code"><br>
<label>Branch Password</label><input type="text" class="form-control"  name="bpassword" id="bpassword" required="" placeholder="Enter Branch Password"><br>
  <input type="submit" name="createBranch" id="createBranch" value="CREATE" class="btn btn-danger">
  
</form>

</div>
<?php


include "dbcon.php";

if (isset($_POST['createBranch']))
{

$query="INSERT INTO branches (branchName,branchCode,branchPassword) VALUES('".$_POST['bname']."' ,'".$_POST['bcode']."','".$_POST['bpassword']."')";
$result=$con->prepare($query);
$result->execute();


                if($result)  
                {  
                    echo "<script>alert('Branch Addes Successfully');
            window.location='index.php';
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
<nav class="navbar fixed-top navbar-light bg-primary">
<marquee style="padding-top: 5px;">Welcome to Transport Management System</marquee>
</nav>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>