<?php 
    include('../head.php'); 
    include('tradingfunctions.php');

    $username = $_SERVER['REMOTE_USER'];
    $balance = balance($username);
    $purchased_items = purchased($username);

    include('../db.php');
    // list of items for purchase
    $sql_cryptocurrencies = "SELECT name FROM cryptocurrencies;";
    $sql_commodities = "SELECT name FROM commodities;";
    $sql_stocks = "SELECT name FROM stocks;";

    $items = array();

    $res = mysqli_query($db, $sql_cryptocurrencies);
    while($ar = mysqli_fetch_array($res)) {
        $items[] = $ar['name'];
    }

    $res = mysqli_query($db, $sql_commodities);
    while($ar = mysqli_fetch_array($res)) {
        $items[] = $ar['name'];
    }

    $res = mysqli_query($db, $sql_stocks);
    while($ar = mysqli_fetch_array($res)) {
        $items[] = $ar['name'];
    }
?>
    <table class="view">
        <tr class="sector">
            <td class="user">username: <span class="user"><?php echo $username; ?></span> (logged-in)<br>available balance: <span class="user">$<?php echo $balance; ?></span></td>
        </tr>
        

        <tr class="sector"><td colspan="4" class="sector">Transact</td></tr>
        <tr class="stock" id="buy"><td class="name">Buy Commodity / Cryptocurrency / Security <span id="buy" class="arrow">⌵</span></td></tr>
        <tr class="news" id="buy"><td class="time"></td><td class="news">
            <form method="POST" action="buy.php">
                    <select name="item">
                        <?php
                            foreach($items as $item) {
                                echo '<option value="'.$item.'">'.$item.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    quantity <input type="number" step="any" name="quantity" placeholder="quantity" /><br>
                    <input type="submit" value="Buy" />
                </form>
        </td></tr>
        <tr class="stock" id="sell"><td class="name">Sell Commodity / Cryptocurrency / Security <span id="sell" class="arrow">⌵</span></td></tr>
        <tr class="news" id="sell"><td class="time"></td><td class="news">
            <form method="POST" action="sell.php">
                    <select name="item">
                        <?php
                            foreach($purchased_items as $item => $quantity) {
                                echo '<option value="'.$item.'">'.$item.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    quantity <input type="number" step="any" name="quantity" placeholder="quantity" /><br>
                    <input type="submit" value="Sell" />
                </form>
        </td></tr>

        <tr class="sector"><td colspan="4" class="sector">History</td></tr>
        <tr class="stock" id="purchased"><td class="name">Portfolio <span id="purchased" class="arrow">⌵</span></td></tr>
        <tr class="news" id="purchased"><td class="time"></td><td class="news">
            <table class="transactions">
                    <tr><td colspan="4">Final Portfolio</td></tr>
                    <tr><th>name</th><th>quantity</th><th>market price</th><th>market value</th></tr>
                    <?php
                        $total = 0.0;
                        foreach($purchased_items as $item => $quantity) {
                            $price = price($item);
                            $value = $price * $quantity;

                            $total = $total + $value;
                            $str = "<tr><td>$item</td><td>$quantity</td><td>$$price</td><td>$$value</td></tr>"."\n";
                            echo $str;
                        }
                    ?>
            </table>

            <br>
            <table class="transactions">
                <tr><td colspan="4">Total Portfolio Value = $<?php echo $total; ?></td></tr>
            </table>

        </td></tr>
        <tr class="stock" id="orderbook"><td class="name">Order Book <span id="orderbook" class="arrow">⌵</span></td></tr>
        <tr class="news" id="orderbook"><td class="time"></td><td class="news">
            <table class="transactions">
                <tr><td colspan="3">Funds</td></tr>
                <tr><th>id</th><th>time</th><th>value</th></tr>
                <?php
                    $sql = "SELECT id, time, value FROM funds WHERE name = '$username' ORDER BY time;";
                    $res = mysqli_query($db, $sql);
                    while($ar = mysqli_fetch_array($res)) {
                        $id = $ar['id'];
                        $time = $ar['time'];
                        $value = $ar['value'];

                        if(floatval($value) < 0) {
                            $value = - floatval($value);
                            $value = "-$".$value;
                        }
                        else {
                            $value = floatval($value);
                            $value = "$".$value;
                        }

                        $str = "<tr><td>$id</td><td>$time</td><td>$value</td></tr>"."\n";
                        echo $str;
                    }
                ?>
            </table>

            <br>
            
            <table class="transactions">
                <tr><td colspan="7">Transactions</td></tr>
                <tr><th>id</th><th>time</th><th>share</th><th>quantity</th><th>price</th><th>value</th><th>type</th></tr>
                <?php
                    $sql = "SELECT id, time, item, quantity, price, value FROM transactions WHERE name = '$username' ORDER BY time;";
                    $res = mysqli_query($db, $sql);
                    while($ar = mysqli_fetch_array($res)) {
                        $id = $ar['id'];
                        $time = $ar['time'];
                        $item = $ar['item'];
                        $quantity = $ar['quantity'];
                        $price = $ar['price'];
                        $value = $ar['value'];
                        
                        $type = "";
                        if(floatval($value) < 0) {
                            $value = - floatval($value);
                            $quantity = - intval($quantity);
                            $type = "Buy";
                        }
                        else {
                            $value = floatval($value);
                            $quantity = intval($quantity);
                            $type = "Sell";
                        }

                        $str = "<tr><td>$id</td><td>$time</td><td>$item</td><td>$quantity</td><td>$$price</td><td>$$value</td><td>$type</td></tr>"."\n";
                        echo $str;
                    }
                ?>
            </table>

            <br>
            <table class="transactions">
                <tr><td colspan="4">Total Portfolio Value = $<?php echo $total; ?></td></tr>
            </table>
            <br>
            <table class="transactions">
                <tr><td colspan="6">Available Balance = $<?php echo $balance; ?></td></tr>
            </table>
        </td></tr>

    </table>

    <?php
        if(isset($_GET['error'])) {
            echo '<script>alert("Transaction Error.");</script>';
        }
        else if(isset($_GET['unsuccess'])) {
            echo '<script>alert("Transaction Unsuccessful.");</script>';
        }
        else if(isset($_GET['success'])) {
            echo '<script>alert("Transaction Successful.");</script>';
        }
    ?>
    
<?php 
    $scripts = array('prompters.js');
    include('../foot.php'); 
?>