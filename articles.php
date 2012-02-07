<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>List of articles</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';

echo "<div id='content'>";
echo '<h2>Articles</h2>';

$querylist = mysql_query("SELECT id,title FROM articles",$db);
$listarray = mysql_fetch_assoc($querylist);

do 
{
    printf ("<p><a href='view_article.php?id=%s'>%s</a></p>", 
    $listarray["id"], $listarray["title"]);
}
while ($listarray = mysql_fetch_assoc($querylist));

?>

</div>

</body>

</html>