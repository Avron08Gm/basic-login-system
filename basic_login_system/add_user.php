<?php
include 'db_object.php';
include 'session_setup.php';
if(!isset($_POST['submit']))
{
    $_SESSION['error']=1;
    header('Location:register.php');
    exit();
}
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$uname=$_POST['user_name'];
$pass=$_POST['pass'];
if(empty($fname)||empty($pass)||empty($uname)||empty($lname))
{
    $_SESSION['empty']=1;
    header('Location:register.php');
    exit();
}
$db_conn=new Dbh;
if($db_conn->unique_user($uname))
{
    $_SESSION['dup_user']=1;
    header('Location:register.php');
    exit();
}
$_SESSION['first_name']=$fname;
$_SESSION['last_name']=$lname;
$_SESSION['user_name']=$uname;
$db_conn->add_data($uname,$pass,$fname,$lname);
$_SESSION['user_added']=1;
header('Location:login.php');
?>