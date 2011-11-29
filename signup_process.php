<?php

session_start();

include 'db.php';

if (!isset($_POST['username']) && !isset($_POST['password']))
{
    header("Location: index.php");
}

else
{
    $username = $_POST['username'];
    $low_username = strtolower($username);
    $pass = $_POST['password'];
    $password = md5($pass);
    $confirm_password=$_POST['confirm_password'];

    $queryuser = mysql_query("SELECT * FROM registration WHERE 
    username='$low_username' ");
    $checkuser = mysql_num_rows($queryuser);

    if($checkuser != 0)
    { 
        echo "Sorry, ".$username." is already taken."; 
    }

    else
    {
        if(!preg_match('#^[a-z0-9]+$#ui', $username))
        {
            echo 'In username field you can only use English letters and numbers.';     
        }

        else
        {
            if(!preg_match('#^[a-z0-9]+$#ui', $pass))
            { 
                echo 'In password field you can only use English letters and numbers.'; 
            }
            
            else
            {
                if(mb_strlen($username) < 6 )
                {
                    echo "Username must contain at least 6 symbols.";
                }
                 
                else
                {
                    if(mb_strlen($pass) < 6)
                    {
                        echo "Password must contain at least 6 symbols.";     
                    }
                    
                    else 
                    {
                        if($pass != $confirm_password)
                        { 
                            echo "Password and confirm password didn't match."; 
                        }
                      
                        else 
                        {
                            $insert_user = mysql_query("INSERT INTO registration (username, password) VALUES ('$username', '$password')");
                         
                            if($insert_user)
                            {
                                $_SESSION['username'] = $username;
                                header("Location: index.php");  
                            }

                            else
                            { 
                                echo "error in registration".mysql_error(); 
                            }
                     
                        }
                    }
                }
            }
        }
    }
}