<div>
    <table id="two">
    <tr>
        <td>Transaction Type</td>
        <td>Date and Time</td>
        <td>Symbol</td>
        <td>Shares</td>
        <td>Price</td>
    </tr>
    
    <?php foreach($history as $transaction): ?>
          <tr>
                <td><?=$transaction["Transaction"] ?></td>
                <td><?=$transaction["Date and Time"] ?></td>
                <td><?=$transaction["Symbol"] ?></td>
                <td><?=$transaction["Shares"] ?></td>
                <td><?=$transaction["Price"] ?></td>
          </tr>
    <?php endforeach ?>

    </table>
    
</div>
