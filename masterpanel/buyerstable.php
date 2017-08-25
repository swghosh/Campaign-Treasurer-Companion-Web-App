    <div class="hidden time">    
    <?php
        include('../trader/tradingfunctions.php');
        
        date_default_timezone_set('Asia/Kolkata');
        echo date('Y-m-d H:i:s')."\n";
    ?>
    </div>
    <table class="view" id="panel">
        <tr class="sector"><td colspan="2" class="sector">Navigate</td></tr>
        <tr class="stock" onclick="document.location = '/masterpanel';"><td class="name" colspan="2"><a href="/masterpanel" class="link">Master Panel<span class="arrow ext">⎋</span></a></td></tr>
        <tr class="sector"><td colspan="2" class="sector">Active Buyers</td></tr>
        <?php
            if($active_buyers = active_buyers()) {
                foreach($active_buyers as $item => $quantity) {
                    $str = "<tr class=\"stock\"><td class=\"name\">".$item."</td> <td class=\"current\">".$quantity."</td></tr>\n";
                    print($str);
                }
            }
        ?>
    
    </table>