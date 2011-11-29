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
        echo "<h1>ACCESS DENIED.</h1>";
    }
}

else
{
    echo "<h1>ACCESS DENIED.</h1>";
}
?>
