<?php
    include('head.php');

    include('../db.php');
?>
        <table class="view" id="panel">
        <tr class="sector"><td colspan="4" class="sector">Navigate</td></tr>
        <tr class="stock" onclick="document.location = '/masterpanel';"><td class="name" colspan="4"><a href="/masterpanel" class="link">Master Panel<span class="arrow ext">⎋</span></a></td></tr>

        <tr class="sector"><td colspan="4" class="sector">All Transactions</td></tr>
        <tr class="stock"><td class="name" colspan="4">
            <table class="transactions">
                <tr><td colspan="8">Transactions</td></tr>
                <tr><th>id</th><th>username</th><th>time</th><th>share</th><th>quantity</th><th>price</th><th>value</th><th>type</th></tr>
                <?php
                    $sql = "SELECT id, name, item, time, quantity, price, value FROM transactions;";
                    $res = mysqli_query($db, $sql);
                    while($ar = mysqli_fetch_array($res)) {
                        $id = $ar['id'];
                        $name = $ar['name'];
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

                        $str = "<tr><td>$id</td><td>$name</td><td>$time</td><td>$item</td><td>$quantity</td><td>$$price</td><td>$$value</td><td>$type</td></tr>"."\n";
                        echo $str;
                    }
                ?>
            </table>

            <br>
            </td></tr>
        </table>    
<?php
    $scripts = array();
    include('foot.php');
?>