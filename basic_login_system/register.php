<?php
include 'session_setup.php';
include 'create_database.php';
?>
<!DOCTYPE html>
<html>
    <head><title>BASIC LOGIN SYSTEM : Register</title></head>
    <body>
        <form  action="add_user.php" method="POST">
        <?php
        if(isset($_SESSION['first_name']))
        {
            $fname=$_SESSION['first_name'];
           echo 'First name: <input type="text" name="first_name" value="'.$fname.'"><br><br>';
        }
        
        else
        {
            echo 'First name: <input type="text" name="first_name" placeholder="Enter your first name"><br><br>';
        }
        if(isset($_SESSION['last_name']))
        {
            $lname=$_SESSION['last_name'];
           echo 'Last name: <input type="text" name="last_name" value="'.$lname.'"><br><br>';
        }
        
        else
        {
           echo 'Last name: <input type="text" name="last_name" placeholder="Enter your last name"><br><br>';
        }
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
        echo '<button type="submit" name="submit"  >Register</button>';
        if(isset($_SESSION['dup_user']))
        {
            unset($_SESSION['dup_user']);
            echo '<br><br>User name must be unique.';
        }
        if(isset($_SESSION['empty']))
        {
            unset($_SESSION['empty']);
            echo '<br><br>Credentials for registering as a new user must be full.';
        }
        if(isset($_SESSION['error']))
        {
            unset($_SESSION['error']);
            echo '<br><br>Unforunately some error occured while registering. Please try again.';
        }
        ?>
        </form>
        <br>
        <a href="login.php">Login Instead 
        </a>
    </body>
</html>