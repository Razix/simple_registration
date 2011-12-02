<?php

session_start();

include 'db.php';

if (isset($_GET['id'])) 
{
    $id = $_GET['id'];
}

$querylist = mysql_query("SELECT * FROM articles WHERE id='$id'",$db);
$listarray = mysql_fetch_assoc($querylist);

echo '<h1>'.$listarray['title'].'</h1>'.'<br>';
echo nl2br($listarray['text']).'<br>'.'<br>';
echo 'Posted by '.'<b>'.$listarray['author'].'</b>'.'.'.'<br>';