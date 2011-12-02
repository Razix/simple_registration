<?php

session_start();

include 'db.php';

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
                $text = $_POST['text']; 
                if ($text == '') 
                {
                    unset($text);
                }  
            }

if (isset($username) && isset($title) && isset($text))
{

$action = mysql_query ("INSERT INTO articles (author,title,text) VALUES ('$username','$title','$text')");

    if ($action =='true') 
    {
        echo "<h1>New article has been posted.</h1>";
        header("Refresh: 3;url=index.php");
    }

    else 
    {
        echo "<h1>You've got a problem.</h1>";
    }
}

else 
{
    echo "<h1>You have to fill in all fields.</h1>";
    header("Refresh: 3;url=new_article.php");
}