<?php
    session_start();
    if($_SESSION["Role"] == null)
    {        
        header("Location: login.html");
    }
    else
    {
        if($_SESSION["Role"] == "staff")
        {}
        else
        {
            header("Location: login.html");
        }

    }
    
?>
staff page