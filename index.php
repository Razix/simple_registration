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
    echo "<div id='content'>";
    echo 'Hello, '.'<b>'.$_SESSION['username'].'</b>'.'.';
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