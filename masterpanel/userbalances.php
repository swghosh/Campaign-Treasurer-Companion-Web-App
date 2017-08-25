<?php
    include('head.php');

    include('../db.php');
?>
        <table class="view" id="panel">
        <tr class="sector"><td colspan="4" class="sector">Navigate</td></tr>
        <tr class="stock" onclick="document.location = '/masterpanel';"><td class="name" colspan="4"><a href="/masterpanel" class="link">Master Panel<span class="arrow ext">⎋</span></a></td></tr>

        <tr class="sector"><td colspan="4" class="sector">User Balances</td></tr>
        <?php
            $sql = "SELECT name, balance FROM users;";
            $res = mysqli_query($db, $sql);

            while($ar = mysqli_fetch_array($res)) {
                $name = $ar['name'];
                $balance = $ar['balance'];
                $str = '<tr class="stock"><td class="name">'.$name.'</td><td class="current">'.$balance.'</td></tr>'."\n";
                print($str);
            }
        ?>
        </table>    
<?php
    $scripts = array();
    include('foot.php');
?>