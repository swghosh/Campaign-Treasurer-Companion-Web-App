    <div class="hidden time">    
    <?php
        // time zone is set to Indian Standard Time
        date_default_timezone_set('Asia/Kolkata');
        // date stamp to be echoed
        echo date('Y-m-d H:i:s')."\n";
    ?>
    </div>
    <table class="view">
    <?php
        // make connetion to database
        include_once('db.php');

        // queries to get list of cryptocurrencies, commodities and stocks
        // $sql_cryptocurrencies = "SELECT name, current FROM cryptocurrencies ORDER BY name;";
        $sql_commodities = "SELECT name, current FROM commodities ORDER BY name;";
        $sql_stocks = "SELECT name, sector, current, difference, percentage FROM stocks ORDER BY name;";

    ?>
            <!-- <tr class="sector"><td colspan="4" class="sector">Cryptocurrencies</td></tr>  -->
    <?php
        // // from list of cryptocurrencies and their live prices make table rows
        // $res = mysqli_query($db, $sql_cryptocurrencies);
        // if(mysqli_num_rows($res) == 0) {
        //     $str = '<tr class="stock"><td class="name" colspan="4">No Cryptocurrencies Available.</td></tr>';
        //     echo $str."\n";
        // }

        // while($ar = mysqli_fetch_array($res)) {
        //     $name = $ar['name'];
        //     $current = $ar['current'];
        //     $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'</td><td class="current" colspan="3">₹'.$current.'</td></tr>';
        //     echo $str."\n";
        // }
    ?>

            <tr class="sector"><td colspan="4" class="sector">Commodities</td></tr>
    <?php
        // from list of commodities and their live prices make table rows
        $res = mysqli_query($db, $sql_commodities);
        if(mysqli_num_rows($res) == 0) {
            $str = '<tr class="stock"><td class="name" colspan="4">No Commodities Available.</td></tr>';
            echo $str."\n";
        }
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'</td><td class="current" colspan="3">₹'.$current.'</td></tr>';
            echo $str."\n";
        }
    ?>
            
            <tr class="sector"><td colspan="4" class="sector">Securities</td></tr>
    <?php
        // from list of stocks and their live prices, difference, percentage make table rows
        $res = mysqli_query($db, $sql_stocks);
        if(mysqli_num_rows($res) == 0) {
            $str = '<tr class="stock"><td class="name" colspan="4">No Securities Available.</td></tr>';
            echo $str."\n";
        }
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $sector = $ar['sector'];
            $current = $ar['current'];
            $difference = $ar['difference'];
            $percentage = $ar['percentage'];

            $str = '';
            // in case of negative difference use all conventions of green, high
            if($difference < 0) {
                $difference = -$difference;
                $percentage = -$percentage;

                $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'<br><small>'.$sector.'</small></td><td class="current">₹'.$current.'</td><td class="difference"><span class="not_inverted triangle">&#9650;</span> ₹'.$difference.'</td><td class="percentage high">'.$percentage.'%</td></tr>';
            }
            // in case of positive difference use all conventions of red, low
            else {
                $str = '<tr class="stock" id="'.$name.'" onclick="document.location = \'/details.php#'.$name.'\'"><td class="name">'.$name.'<br><small>'.$sector.'</small></td><td class="current">₹'.$current.'</td><td class="difference"><span class="inverted triangle">&#9660;</span> ₹'.$difference.'</td><td class="percentage low">'.$percentage.'%</td></tr>';
            }

            echo $str."\n";
        }
    ?>
    </table>