<?php

session_start();

include 'db.php';

if(isset($_SESSION['username']))
{

    $queryuser = mysql_query("SELECT * FROM registration WHERE 
    username = '".$_SESSION["username"]."' ");
    $userarray = mysql_fetch_assoc($queryuser);

    if ($userarray['access_level'] == 'boss')
    {
    
    $querylist = mysql_query ("SELECT username FROM registration");
    $listarray = mysql_fetch_assoc ($querylist);

    echo '<h2>User list:</h2>';

        do
        {
            echo $listarray['username']."<br>";
        }
        
        while ($listarray = mysql_fetch_array ($querylist)); 
        
    }
}

else
{
    echo "<h1>ACCESS DENIED.</h1>";
}