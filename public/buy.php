<?php

    // configuration
    require("../includes/config.php"); 

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["symbol"]||$_POST["shares"]))
        {
            apologize("Please enter a valid stock symbol and number of shares that you would like to buy.");
        }
        else
        {
            $stock=lookup($_POST["symbol"]);
            $shares=$_POST["shares"];
            if($stock===false)
            {
                apologize("Invalid stock symbol");
            }
            else
            {
                if(!preg_match("/^\d+$/",$shares))
                {
                    apologize("You may only buy a whole number of shares.");
                }
                else
                {
                    $query1=cs50::query("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);    
                    if(($stock["price"]*$shares)>$query1[0]["cash"])
                    {
                        apologize("You do not have enough money.");
                    }
                    else
                    {
            
                        $cost=($shares*$stock["price"]);
                        $newcash=cs50::query("UPDATE users SET cash=cash-? WHERE id=?", $cost, $_SESSION["id"]);
                        if($newcash===false)
                        {
                            apologize("Unable to deduct cash to your account.");
                        }
                    
                        $newstock=cs50::query("INSERT INTO portfolio (users_id, symbol, shares) VALUES (?,?,?) ON DUPLICATE KEY UPDATE shares=shares+VALUES(shares)", $_SESSION["id"],$stock["symbol"],$shares);
                        $transactiontype = 'Buy';
                        $history = cs50::query("INSERT INTO History (users_id,Transaction,Symbol, Shares, Price) VALUES (?,?,?,?,?)", $_SESSION["id"],$transactiontype,$stock["symbol"],$shares,$stock["price"]);
        
                    redirect("/");
                    }   
                }
            }
        }
        
    }
    else
    {
        render("buyform.php",["title"=>"Buy"]);
    }

?>
