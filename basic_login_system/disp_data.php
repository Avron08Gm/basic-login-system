<?php
include 'db_object.php';
include 'session_setup.php';
if(!isset($_POST['submit']))
{
    $_SESSION['error']=1;
    header('Location:register.php');
    exit();
}
$uname=$_POST['user_name'];
$pass=$_POST['pass'];
if(empty($uname)||empty($pass))
{
    $_SESSION['empty']=1;
    header('Location:register.php');
    exit();
}
$_SESSION['user_name']=$uname;
$db_conn=new Dbh;
if ($db_conn->check_data($uname,$pass))
{
    $data=$db_conn->get_data($uname);
    echo "You are logged in now => <br>";
    echo 'User name : '.$data['user_name']."<br>";
    echo 'Frst name : '.$data['first_name']."<br>";
    echo 'Last name : '.$data['last_name']."<br>";
}
else{
    $_SESSION['invalid']=1;
    header('Location:login.php');
    exit();
}
?>