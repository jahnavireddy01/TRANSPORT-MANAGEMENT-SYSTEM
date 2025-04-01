<?php
session_start();
 include 'asset/dbcon.php';

if(isset($_POST['login']))
{
$Email=$_POST['email'];
$Password=$_POST['password'];
//include 'db/dbcon.php';

$query="SELECT * FROM tms_admin WHERE Email='".$_POST['email']."' AND Password='".$_POST['password']."'";
$result=$con->prepare($query);
$result->execute();

$count = $result->rowCount();  
                if($count > 0)  
                {  
                    
                     $_SESSION['Email'] = $_POST['email'];  
                     //$_SESSION['email']=$sessionid;
                    //$_SESSION['Email']="d";
                     //$hash=hash(sha256, $_SESSION['Email']);
                     header("location:TMSadmin/");  
                }  
else

{
    //$errMsg = 'Username and Password are not found<br>';
    echo '<script language="javascript">';
echo 'confirm("Invailed Username .Please Check the Username or Password")';
echo '</script>';

}

}
?>

<?php

 include 'asset/dbcon.php';

if(isset($_POST['branchlogin']))
{
$Email=$_POST['email'];
$Password=$_POST['password'];
//include 'db/dbcon.php';

$query="SELECT * FROM branches WHERE branchName='".$_POST['email']."' AND branchPassword='".$_POST['password']."'";
$result=$con->prepare($query);
$result->execute();

$count = $result->rowCount();  
                if($count > 0)  
                {  
                    
                     $_SESSION['Email'] = $_POST['email'];  
                     //$_SESSION['email']=$sessionid;
                    //$_SESSION['Email']="d";
                     //$hash=hash(sha256, $_SESSION['Email']);
                     header("location:Branch/");  
                }  
else

{
    //$errMsg = 'Username and Password are not found<br>';
    echo '<script language="javascript">';
echo 'confirm("Invailed Username .Please Check the Username or Password")';
echo '</script>';

}

}
?>