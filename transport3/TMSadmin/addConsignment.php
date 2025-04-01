<?php
session_start();
if ($_SESSION['Email'] == null) {
    echo "<script>alert('');
            window.location='../GOI.php';
            </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
</head>
<body>
<header style="height: 45px; padding-left: 9px; padding-top: 9px;" class="bg-primary text-white"><b>GOVERNMENT OF INDIA Admin Panel</b></header>
<div class="container">

<br>

<nav class="nav">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link" href="AADHAAR CARD VALIDATION.php"><strong>AADHAAR CARD VALIDATION</strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="PAN CARD VALIDATION.php"><strong>PAN CARD VALIDATION</strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="VOTER ID VALIDATION.php"><strong>VOTER ID VALIDATION</strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="PASSPORT VALIDATION.php"><strong>PASSPORT VALIDATION</strong></a>
        </li>
           </ul>
</nav>
<br>
<hr>

<div class="col-sm-8">
    <form method="POST" action="#">
        <label>Sender Name</label>
        <input type="text" class="form-control" name="senderName" id="senderName" required placeholder="Enter Sender Name"><br>
        <label>Reciv.Name</label>
        <input type="text" class="form-control" name="RecivrName" id="RecivrName" required placeholder="Enter Reciever Name"><br>
        <label>Sender Addrs.</label>
        <input type="text" class="form-control" name="senderAddress" id="senderAddress" required placeholder="Enter Sender Addrs"><br>
        <label>Recivr. Addrs.</label>
        <input type="text" class="form-control" name="RecivrAddress" id="RecivrAddress" required placeholder="Enter Reciver Addrs"><br>
        <label>Details (Mobile Num , etc)</label>
        <input type="text" class="form-control" name="details" id="details" required placeholder="Enter Details"><br>
        <label>Distance</label>
        <input type="text" class="form-control" name="distance" id="distance" required placeholder="Enter Distance">
        <br>

        <input type="submit" name="createCons" id="createCons" value="ADD" class="btn btn-danger">
    </form>
</div>

<?php
include "dbcon.php";

if (isset($_POST['createCons'])) {
    $query = "INSERT INTO consdetails (senderName, recieverName, senderAddress, recieverAddress, details, distance) VALUES ('" . $_POST['senderName'] . "', '" . $_POST['RecivrName'] . "', '" . $_POST['senderAddress'] . "', '" . $_POST['RecivrAddress'] . "', '" . $_POST['details'] . "', '" . $_POST['distance'] . "')";
    $result_cons = $con->prepare($query);
    $result_cons->execute();

    if ($result_cons) {
        echo "<script>alert('Consignment Added Successfully');
                window.location='ADHAAR CARD VALIDATION.php';
                </script>";
    } else {
        echo '<script language="javascript">';
        echo 'confirm("Something Went Wrong!!!!?")';
        echo '</script>';
    }
}
?>
</div>
<br>

<nav class="navbar fixed-top navbar-light bg-primary">
    <marquee style="padding-top: 5px;">Welcome to GOVERNMENT OF INDIA</marquee>
</nav>
</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</html>
