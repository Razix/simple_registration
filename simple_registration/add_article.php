<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Add article</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';
    
echo "<div id='content'>";

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
}

    if (!isset($username))
    {
        header("location: index.php");
    }

    if (isset($_POST['title'])) 
    {
        $title = trim($_POST['title']); 
                
        if ($title == '') 
        {
            unset($title);
        }  
    }

            if (isset($_POST['text'])) 
            {
                $arttext = $_POST['text'];
                $text = wordwrap($arttext, 100, "\n", true); 
                    
                if ($text == '') 
                {
                    unset($text);
                }  
            }

if (isset($username) && isset($title) && isset($text))
{

    $action = mysql_query ("INSERT INTO articles (author,title,text) 
    VALUES ('$username','$title','$text')");

    if ($action =='true') 
    {
        echo "<h1>New article has been posted.</h1>";
        header("Refresh: 3;url=index.php");
    }

    else 
    {
        echo "<h1>You've got a problem.</h1>";
        header("Refresh: 3;url=$_SERVER[HTTP_REFERER]");
    }
}

else 
{
    echo "<h1>You have to fill in all fields.</h1>";
    header("Refresh: 3;url=$_SERVER[HTTP_REFERER]");
}

?>

</div>

</body>

</html>