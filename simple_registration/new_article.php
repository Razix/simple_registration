<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>New article</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';

if (!isset($_SESSION['username']))
{
    header("location: index.php");
}

?>

<div id="content">

<h1>Create new article</h1>

<form action="add_article.php" method="post">
<table border="0">
<tr><td>Enter title: </td><td class="long_round"><input class="long_input" type="text" name="title" id="title"></td></tr>
<tr><td>Enter your article: </td><br><td> 
<textarea class="textarea" name="text" id="text" cols="50" rows="20"></textarea></td></tr>
<tr><td></td><td class="center"><input type="submit" name="submit" id="submit" value="Post it"></td></tr>
</table>  
</form>

</div>

</body>

</html>