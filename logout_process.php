<?php

if(!isset($_SESSION['username']))
{      
    header("Location: index.php");
}

    if(isset($_POST['ok'])) 
    {
        session_start();
        
        unset($_SESSION['username']);

        session_destroy(); 
        
        header("Location: index.php");
    }