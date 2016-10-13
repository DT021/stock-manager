<?php

    // configuration
    require("../includes/config.php"); 
    
    $history = [];
    $rows=cs50::query("SELECT * FROM History WHERE users_id=?", $_SESSION["id"] );
    foreach($rows as $row)
    {
        $history[]=[
        "Transaction"=>$row["Transaction"],
        "Date and Time"=>$row["Date and Time"],
        "Symbol"=>$row["Symbol"],
        "Shares"=>$row["Shares"],
        "Price"=>$row["Price"]
        ];
    }
    
    render("historytable.php",["history"=>$history, "title"=>"History"]);

?>
