<?php

session_start();

include 'db.php';

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

echo "<div style='border:1px solid; width:45%;
      background-color:#ffffff; min-height:100px; margin:25px;
      margin-left:10%; padding:5px'>";
echo '<h1>' . '<center>' . $listarray['title'] . '</h1>' . '<br>';        
echo 'Posted by ' . '<strong>' . $listarray['author'] . '</strong>' . '.';
echo "<hr width='30%' align='left' />";
echo nl2br($listarray['text']);
echo "</div>";

if(isset($_SESSION['username']))
{
    $username = $_SESSION['username'];
    
    echo "<div style='margin-left:10%'>";
    echo "<h1>Add your comment</h1>";
    echo ("<form action='' method='post'>  
            <textarea name='text' cols='40' rows='10'></textarea><br />  
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
        echo "<div style='border:1px solid; width:45%;
        background-color:#eeeeff; min-height:100px; margin:10px;
        margin-left:10%; padding:5px'>";        
        echo 'Commented by '.'<strong>'.$listarray['author'].'</strong>'.'.';
        echo "<hr width='30%' align='left' />";
        echo nl2br($listarray['text']);
        echo "</div>";
    }
    while ($listarray = mysql_fetch_assoc($querylist)); 
}