<?php
// configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("passwordchange_form.php", ["title" => "Change Password"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(empty($_POST["newpassword"]))
        {
            apologize("Please enter a password");
        }
        else if(empty($_POST["confirmnewpassword"]))
        {
            apologize("Please enter a password confirmation.");
        }
        else if(!($_POST["newpassword"]==$_POST["confirmnewpassword"]))
        {
            apologize("Passwords do not match!");
        }
        else
        {
            $users=CS50::query("SELECT hash FROM users where id=?",$_SESSION["id"]);
            $user=$users[0];
            if(password_verify($_POST["cur_password"],$user["hash"]))
            {
                $update=CS50::query("UPDATE users SET hash=? WHERE id=?",password_hash($_POST["newpassword"],PASSWORD_DEFAULT),$_SESSION["id"]);
                if($update==1)
                {
                    redirect("/");
                }
            }        
        }    
    }
    
    apologize("Could not update password.");
?>