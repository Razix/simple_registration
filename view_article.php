<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>View article</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';

echo "<div id='content'>";

if (!isset($_GET['id'])) 
{
    header("Location: index.php");
}

    if (isset($_GET['id'])) 
    {
        $id = $_GET['id'];
    }

$querylist = mysql_query("SELECT * FROM articles WHERE id='$id'",$db);
$listarray = mysql_fetch_assoc($querylist);

echo "<div class='post_view'>";
echo '<h1>' . $listarray['title'] . '</h1>' . '<br>';        
echo 'Posted by ' . '<strong>' . $listarray['author'] . '</strong>' . '.';
echo "<hr width='30%' align='left' />";
echo nl2br($listarray['text']);
echo "</div>";

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    
    echo "<div>";
    echo "<h1>Add your comment</h1>";
    echo ("<form action='' method='post'>  
            <textarea class='textarea' name='text' cols='55' 
            rows='10'></textarea><br />  
            <input name='ok' type='submit' value='Add' />  
            </form> ");
    echo "</div>";
            
    if (isset($_POST['text'])) 
    {
        $comtext = trim($_POST['text']);
        $text = wordwrap($comtext, 100, "\n", true); 
        if ($text == '') 
        {
            unset($text);
        }  
    }

    if (isset($text))
    {
    $action = mysql_query ("INSERT INTO comments (article_id,author,text) 
    VALUES ('$id','$username','$text')");

        if ($action =='true') 
        {         
            header('location: http://'. $_SERVER['HTTP_HOST'] . 
            $_SERVER['PHP_SELF'] . "?id=$id");
        }

        else 
        {
            echo "<h1>You have got a problem.</h1>";
        }
    }
}

$querylist = mysql_query("SELECT * FROM comments WHERE article_id='$id'",$db);
$listarray = mysql_fetch_assoc($querylist);

if(isset($listarray['article_id']))
{
    do 
    {
        echo "<div class='comment_view'>";        
        echo 'Commented by '.'<strong>'.$listarray['author'].'</strong>'.'.';
        echo "<hr width='30%' align='left' />";
        echo nl2br($listarray['text']);
        echo "</div>";
    }
    while ($listarray = mysql_fetch_assoc($querylist)); 
}

?>

</div>

</body>

</html>