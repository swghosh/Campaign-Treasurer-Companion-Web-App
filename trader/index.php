<?php 
    include('../head.php'); 
?>
    <table class="view">
        <tr class="sector">
            <td class="user">username: <span class="user">alpha</span> (logged-in)<br>available balance: <span class="user">$0.00</span></td>
        </tr>
        

        <tr class="sector"><td colspan="4" class="sector">Transact</td></tr>
        <tr class="stock"><td class="name">Buy Commodity / Cryptocurrency / Security <span id="about" class="arrow">⌵</span></td></tr>
        <tr class="stock"><td class="name">Sell Commodity / Cryptocurrency / Security <span id="rules" class="arrow">⌵</span></td></tr>

        <tr class="sector"><td colspan="4" class="sector">History</td></tr>
        <tr class="stock"><td class="name">Purchased<span id="about" class="arrow">⌵</span></td></tr>
        <tr class="stock"><td class="name">Order Book<span id="rules" class="arrow">⌵</span></td></tr>

    </table>
<?php 
    $scripts = array();
    include('../foot.php'); 
?>