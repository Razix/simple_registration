<?php

session_start();

include 'db.php';

if (!isset($_SESSION['username']))
{
    header("location: index.php");
}

?>
<h1>Create new article</h1>

<form action="add_article.php" method="post">
Enter title: <input type="text" name="title" id="title"><br><br> 
Enter your article:<br><br>  
<textarea name="text" id="text" cols="50" rows="20"></textarea><br><br>
<input type="submit" name="submit" id="submit" value="Post it">  
</form>