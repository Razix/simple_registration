<?php

session_start();

include 'db.php';

echo '<h2>Articles</h2>';

$querylist = mysql_query("SELECT id,title FROM articles",$db);
$listarray = mysql_fetch_assoc($querylist);

do 
{
    printf ("<p><a href='view_article.php?id=%s'>%s</a></p>", 
    $listarray["id"], $listarray["title"]);
}
while ($listarray = mysql_fetch_assoc($querylist));