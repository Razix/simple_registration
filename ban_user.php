<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Ban users</title>
</head>

<body>

<?php

include_once 'header.php';

?>

<div id="content">

<?php

session_start();

include 'db.php';

if(isset($_SESSION['username']))
{

    $queryuser = mysql_query("SELECT * FROM registration WHERE 
    username = '".$_SESSION["username"]."' ");
    $userarray = mysql_fetch_assoc($queryuser);

    if ($userarray['access_level'] == 'boss')
    {
    
        if (isset($_POST['id'])) 
        {
            $id = $_POST['id'];  
        }

        if (isset($id))
        {

            $querylist = mysql_query ("SELECT access_level FROM registration
            WHERE id='$id'");
            $listarray = mysql_fetch_assoc ($querylist);
            
            if (is_null($listarray['access_level']))
            {
                $action = mysql_query ("UPDATE registration SET 
                access_level = 'ban' WHERE id='$id'");
            }
            
            else
            {
                $action = mysql_query ("UPDATE registration SET 
                access_level = NULL WHERE id='$id'"); 
            }
            
                if ($action =='true') 
                {
                    header("Location: manage_users.php");
                }
                
                else 
                {
                    echo "<h1>Oops! Nothing has happened for unknown 
                    reasons.</h1>";
                    header("Refresh: 3;url=$_SERVER[HTTP_REFERER]");
                }
        }

        else 
        {
            echo "<h1>You must choose somebody from the list before pressing
             \"Ban / Unban button\".</h1>";
            header("Refresh: 3;url=$_SERVER[HTTP_REFERER]");
        }
    }
    
    else
    {
        header("Location: index.php");
    }
}

else
{
    header("Location: index.php");
}

?>

</div>

</body>

</html>