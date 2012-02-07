<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Login in process</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';

echo "<div id='content'>";

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
    username='$user' AND password='$pass' ");
    $array = mysql_fetch_assoc($query);

    if ($array['access_level'] == 'ban')
    {
        echo ("<h1>Sorry, but you have been banned for some reasons. <br> 
        Contact the site administrator to get more information.</h1>");
    }
    
    else
    {     
        $count=mysql_num_rows($query);
    
    
        if ($count==1)
        {
            $_SESSION['username'] = $username;
            header("location: index.php");
        }
        
        else
        {
            echo "Username or password is incorrect.";
        }
    }
}

?>

</div>

</body>

</html>