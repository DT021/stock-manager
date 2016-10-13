<div>
    <table id="one">
    <tr>
        <td>Symbol</td>
        <td>Name</td>
        <td>Shares</td>
        <td>Price</td>
        <td>Total</td>
    </tr>
    
    <?php foreach($positions as $position): ?>
          <tr>
                <td><?=$position["symbol"] ?></td>
                <td><?=$position["name"] ?></td>
                <td><?=$position["shares"] ?></td>
                <td><?=$position["price"] ?></td>
                <td><?=($position["price"]*$position["shares"]) ?></td>
          </tr>
    <?php endforeach ?>
    <tr>
        <td>Cash</td>
        <td></td>
        <td></td>
        <td></td>
        <td><?=$cash[0]["cash"]?></td>
    </tr>
    </table>
    
</div>
