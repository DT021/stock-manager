<?php

    // configuration
    require("../includes/config.php"); 

    $positions = [];
    $rows=cs50::query("SELECT symbol,shares FROM portfolio WHERE users_id=?", $_SESSION["id"]);
    foreach($rows as $row)
    {
        $stock=lookup($row["symbol"]);
        if($stock!== false)
        {
            $positions[] = [
                "symbol"=>$row["symbol"],
                "name"=>$stock["name"],
                "shares"=>$row["shares"],
                "price"=>$stock["price"],
                ];
        }
    }
    $cash=cs50::query("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);

    // render portfolio
    render("portfolio.php", ["positions"=>$positions,"cash"=>$cash, "title" => "Portfolio"]);

?>
