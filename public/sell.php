<?php

    // configuration
    require("../includes/config.php"); 

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(empty($_POST["symbol"]))
        {
            apologize("Please enter a valid stock symbol that you own.");
        }
        else
        {
            $stock=lookup($_POST["symbol"]);
            if($stock===false)
            {
                apologize("Invalid stock symbol");
            }
            else
            {
            $stocknumber=cs50::query("SELECT shares FROM portfolio WHERE symbol=? AND users_id=?", $stock["symbol"], $_SESSION["id"]);
            
            $query1=cs50::query("DELETE FROM portfolio WHERE symbol=? AND users_id=?", $stock["symbol"], $_SESSION["id"]);
            if($query1===false)
            {
                apologize("Unable to sell shares.");
            }
            
            $money=($stocknumber[0]["shares"]*$stock["price"]);
            
            $query2=cs50::query("UPDATE users SET cash=cash+? WHERE id=?", $money, $_SESSION["id"]);
            if($query2===false)
            {
                apologize("Unable to credit cash to your account.");
            }
            
            $transactiontype='Sell';
            $history = cs50::query("INSERT INTO History (users_id,Transaction,Symbol, Shares, Price) VALUES (?,?,?,?,?)", $_SESSION["id"],$transactiontype,$stock["symbol"],$stocknumber[0]["shares"],$stock["price"]);
            
            redirect("/");
            }
        }
        
    }
    else
    {
        $stocklist = [];
        $query3=cs50::query("SELECT symbol FROM portfolio WHERE users_id=?", $_SESSION["id"]);
        foreach($query3 as $queries)
        {
            $stocklist[]=$queries["symbol"];
        }
        render("sellform.php",["stocklist"=>$stocklist,"title"=>"Sell"]);
    }

?>
