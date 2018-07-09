<?php
include 'session_setup.php';
include 'create_database.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BASIC LOGIN SYSTEM : Login</title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form  action="disp_data.php" method="POST">
        <?php
        if(isset($_SESSION['user_name']))
        {
            $uname=$_SESSION['user_name'];
           echo 'User name: <input type="text" name="user_name" value="'.$uname.'"><br><br>';
        }
        
        else
        {
           echo' User name: <input type="text" name="user_name" placeholder="Enter your user name"><br><br>';
        }
        echo 'Password: <input type="password" name="pass" placeholder="Enter your password"><br><br>';
        echo '<button type="submit" name="submit"  >Login</button>';
        if(isset($_SESSION['empty']))
        {
            unset($_SESSION['empty']);
            echo '<br><br>Credentials for logging in as a user must be full.';
        }
        if(isset($_SESSION['error']))
        {
            unset($_SESSION['error']);
            echo '<br><br>Unforunately some error occured while logging in. Please try again.';
        }
        if(isset($_SESSION['user_added']))
        {
           unset($_SESSION['user_added']);
            echo '<br><br>You have been successfully registered.';
        }
        if(isset($_SESSION['invalid']))
        {
           unset($_SESSION['invalid']);
            echo '<br><br>Invalid credentials. Try again.';
        }
        ?>
        </form>
        <br>
        <a href="register.php">New User? Register Here 
        </a>
    
</body>
</html>