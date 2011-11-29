<form action="logout.php?id=enter" method="post">  
    <input type="submit" name="ok" value="Logout" />
</form>

<?php

if(isset($_POST['ok'])) 
{
    session_start();
    
    unset($_SESSION['username']);

    session_destroy(); 
          
    header("Location: index.php");
}