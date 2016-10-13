<form acion="sell.php" method="POST">
    <div class="form-group">
        <select name="symbol">
            <?php foreach($stocklist as $symbolname)
            {
                echo("<option value='$symbolname'>".$symbolname."</option>");
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-default" type="submit">
            Submit
        </button>
    </div>
</form>
