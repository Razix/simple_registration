<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Main page</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';

if(isset($_SESSION['username']))
{
    include 'logout.php';
    echo "<div id='content'>";
    echo 'Hello, '.'<b>'.$_SESSION['username'].'</b>'.'.';
    echo '<br>'.'<br>'.'<b>'."Now it's time to add <a href='new_article.php'>
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
    echo "<div id='content'>";
    include('login_form.php');
}

?>

</div>

</body>

</html>