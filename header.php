<div id="header"></div>

<div id="menu">
    <div class="menu"> 
        <a href="index.php">Main</a> 
        <a href="articles.php">Articles</a> 
        
        <?php
        
        if(isset($_SESSION['username']))
        {
            echo "<a href='new_article.php'>Add article</a>";
        
            $queryuser = mysql_query("SELECT * FROM registration WHERE 
            username = '".$_SESSION["username"]."' ");
            $userarray = mysql_fetch_assoc($queryuser);
        
            if ($userarray['access_level'] == 'boss')
            {
                echo "<a href='manage_users.php'>Manage users</a>";
            }
            include 'logout.php';
        }
        
        else
        {
            echo "<a href='login.php'>Login</a>";
            echo "<a href='sign_up.php'>Sign up</a>";
        }
        
        ?>
    
    </div>
</div>