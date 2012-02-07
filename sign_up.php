<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Sign up</title>
</head>

<body>

<?php

include_once 'header.php';

?>

<div id="content">

<h2>Create your account</h2>

<h4>Already have an account? Skip this step and <a href="login.php">login now</a></h4>

<form action="signup_process.php" method="post">  

    <table border="0">
 
        <tr><td>Username: </td><td class="short_round">
        <input class="short_input" type="text" name="username" value="" />
        </td></tr>
         
        <tr><td>Password: </td><td class="short_round">
        <input class="short_input" type="password" name="password" value="" />
        </td></tr>
         
        <tr><td>Confirm Password: </td><td class="short_round">
        <input class="short_input" type="password" name="confirm_password" 
        value="" /></td></tr>  

        <tr><td></td><td><input type="submit" name="ok" value="Sign up" />
        </td></tr>
 
    </table>
</form>

</div>

</body>

</html>