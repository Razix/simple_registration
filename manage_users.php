<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Manage users</title>
</head>

<body>

<?php

session_start();

include 'db.php';
include_once 'header.php';

if(isset($_SESSION['username']))
{
    echo "<div id='content'>";

    if ($userarray['access_level'] == 'boss')
    {
    
        $querylist = mysql_query ("SELECT * FROM registration WHERE
        access_level != 'boss' OR access_level is NULL");
        $listarray = mysql_fetch_assoc ($querylist);

        echo '<h2>User list:</h2>';
        
        echo ("<form action='ban_user.php' method='post'>");
    
        do
        {
            if ($listarray['access_level'] == 'ban')
            {
            printf ("<p style='color:red'><input name='id' type='radio'
            value='%s'><label> %s</label></p>",
            $listarray['id'],$listarray['username']);
            }
            
            else
            {
            printf ("<p><input name='id' type='radio' value='%s'><label> %s
            </label></p>",$listarray['id'],$listarray['username']);
            }
        }
        
        while ($listarray = mysql_fetch_array ($querylist));
         
        echo ("<p><input name='submit' type='submit' value='Ban / Unban'></p>
        </form> ");
   
    }
    
    else
    {
        echo "<div id='content'>";
        echo "<h1>ACCESS DENIED.</h1>";
    }
}

else
{
    echo "<div id='content'>";
    echo "<h1>ACCESS DENIED.</h1>";
}

?>

</div>

</body>

</html>