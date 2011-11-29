<?php

session_start();

include 'db.php';

if(isset($_SESSION['username']))
{
    echo "Hello, "."<b>".$_SESSION['username']."</b>".".";
    include 'logout.php';
    
    $queryuser = mysql_query("SELECT * FROM registration WHERE 
    username = '".$_SESSION["username"]."' ");
    $userarray = mysql_fetch_assoc($queryuser);

    if ($userarray['access_level'] == 'boss')
    {
        echo "<i>Here our administrator can <a href='manage_users.php'>manage users</a>.";
    }
}

else
{
    include('login.php');
}

?> 