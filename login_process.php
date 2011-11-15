<?php

session_start();

include 'db.php';

if (!isset($_POST['username']) && !isset($_POST['password']))
{
    header("Location: index.php");
}

else
{
    $username=$_POST['username'];
    $password=$_POST['password'];
     
    $user=mysql_real_escape_string($username);
    $pass=md5($password);
     
    $query=mysql_query("SELECT * FROM registration where
    username='$user' AND
    password='$pass' ");
     
    $count=mysql_num_rows($query);
    if($count==1)
    {
        $_SESSION['username'] = $username;
        header("location: index.php");
    }
    else
    {
        echo "Username or password is incorrect.";
    }
}
?>