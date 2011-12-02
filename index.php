<?php

session_start();

include 'db.php';

if(isset($_SESSION['username']))
{
    echo 'Hello, '.'<b>'.$_SESSION['username'].'</b>'.'.';
    include 'logout.php';
    echo '<b>'."Now it's time to add <a href='new_article.php'>
    new article</a>.".'</b>'.'<br>';
    
    $queryuser = mysql_query("SELECT * FROM registration WHERE 
    username = '".$_SESSION["username"]."' ");
    $userarray = mysql_fetch_assoc($queryuser);

    if ($userarray['access_level'] == 'boss')
    {
        echo "<i>Here our administrator can <a href='manage_users.php'>
        manage users</a>.</i>".'<br>';
    }
}

else
{
    include('login.php');
}

?>
<b>Do u want to read something? Check <a href='articles.php'>this</a> out.</b>