<?php 
    include('../head.php'); 
    include('tradingfunctions.php');

    $username = $_SERVER['REMOTE_USER'];
    $balance = balance($username);
?>
    <table class="view">
        <tr class="sector">
            <td class="user">username: <span class="user"><?php echo $username; ?></span> (logged-in)<br>available balance: <span class="user">$<?php echo $balance; ?></span></td>
        </tr>
        

        <tr class="sector"><td colspan="4" class="sector">Transact</td></tr>
        <tr class="stock" id="buy"><td class="name">Buy Commodity / Cryptocurrency / Security <span id="buy" class="arrow">⌵</span></td></tr>
        <tr class="news" id="buy"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>
        <tr class="stock" id="sell"><td class="name">Sell Commodity / Cryptocurrency / Security <span id="sell" class="arrow">⌵</span></td></tr>
        <tr class="news" id="sell"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>

        <tr class="sector"><td colspan="4" class="sector">History</td></tr>
        <tr class="stock" id="purchased"><td class="name">Purchased<span id="purchased" class="arrow">⌵</span></td></tr>
        <tr class="news" id="purchased"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>
        <tr class="stock" id="orderbook"><td class="name">Order Book<span id="orderbook" class="arrow">⌵</span></td></tr>
        <tr class="news" id="orderbook"><td class="time"></td><td class="news">
            <br><br>
        </td></tr>

    </table>
<?php 
    $scripts = array('prompters.js');
    include('../foot.php'); 
?>