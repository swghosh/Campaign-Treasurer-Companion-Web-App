    <div class="hidden time">    
    <?php
        date_default_timezone_set('Asia/Kolkata');
        echo date('Y-m-d H:i:s')."\n";
    ?>
    </div>
    <table class="view">
    <?php
        include_once('db.php');

        $sql_cryptocurrencies = "SELECT name, current FROM cryptocurrencies ORDER BY name;";
        $sql_commodities = "SELECT name, current FROM commodities ORDER BY name;";
        $sql_stocks = "SELECT name, sector, current, difference, percentage FROM stocks ORDER BY name;";

    ?>
            <tr class="sector"><td colspan="4" class="sector">Cryptocurrencies</td></tr> 
    <?php
        $res = mysqli_query($db, $sql_cryptocurrencies);
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'</td><td class="current" colspan="3">$'.$current.'</td></tr>';
            echo $str."\n";
        }
    ?>

            <tr class="sector"><td colspan="4" class="sector">Commodities</td></tr>
    <?php
        $res = mysqli_query($db, $sql_commodities);
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'</td><td class="current" colspan="3">$'.$current.'</td></tr>';
            echo $str."\n";
        }
    ?>
            
            <tr class="sector"><td colspan="4" class="sector">Securities</td></tr>
    <?php
        $res = mysqli_query($db, $sql_stocks);
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $sector = $ar['sector'];
            $current = $ar['current'];
            $difference = $ar['difference'];
            $percentage = $ar['percentage'];

            $str = '';
            if($difference < 0) {
                $difference = -$difference;
                $percentage = -$percentage;

                $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'<br><small>'.$sector.'</small></td><td class="current">$'.$current.'</td><td class="difference"><span class="not_inverted triangle">&#9650;</span> $'.$difference.'</td><td class="percentage high">'.$percentage.'%</td></tr>';
            }
            else {
                $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'<br><small>'.$sector.'</small></td><td class="current">$'.$current.'</td><td class="difference"><span class="inverted triangle">&#9660;</span> $'.$difference.'</td><td class="percentage low">'.$percentage.'%</td></tr>';
            }

            echo $str."\n";
        }
    ?>
    </table>