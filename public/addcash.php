<?php
    
    require("../includes/config.php");
   
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["cash"]))
        {
            apologize("Invalid amount deposited.");
        }
        else
        {
            if($_POST["cash"]<0)
            {
                apologize("You must add a positive amount.");
            }
            
            $cash=$_POST["cash"];
            $users-cs50::query("UPDATE users SET cash=cash+? WHERE id=?",$cash, $_SESSION["id"]);
            if($users===false)
            {
                apologize("Unable to add cash to your account.");
            }
            redirect("/");
        }
    }
    
    else
    {
        render("addcashform.php",["title"=>"Deposit Cash"]);
    }