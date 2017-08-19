<?php 
    include('head.php'); 
?>
    <script>
        var updates = {

        };
    </script>
    <table class="view" id="details">
    <?php
        include_once('db.php');

        $sql_cryptocurrencies = "SELECT name, current, description, ovalue FROM cryptocurrencies ORDER BY name;";
        $sql_commodities = "SELECT name, current, description, ovalue, lcircuit, ucircuit FROM commodities ORDER BY name;";
        $sql_stocks = "SELECT name, sector, current, difference, percentage, description, pclose, ovalue, lcircuit, ucircuit FROM stocks ORDER BY name;";

    ?>
            <tr class="sector"><td class="sector">Cryptocurrencies</td></tr> 
    <?php
        $res = mysqli_query($db, $sql_cryptocurrencies);
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $description = mysqli_real_escape_string($db, $ar['description']);
            $ovalue = $ar['ovalue'];

            $str = "<tr class=\"profile\" id=\"$name\">
            <td class=\"profile\">
                <h1>
                    $name <b>($$current)</b>
                </h1>
                <h3></h3>
                <br>
                <p>
                    $description
                </p>
                <br>
                <br>
                Open Value: <b>$$ovalue</b>
                <br>
                <canvas id=\"chart $name\" class=\"chart\"></canvas>
                <br>
                <br>
                Highest Value: <b class=\"highest\">$</b>
                <br>
                Lowest Value: <b class=\"lowest\">$</b>
            </td>
        </tr>";
            echo $str."\n";
        }
    ?>

            <tr class="sector"><td class="sector">Commodities</td></tr>
    <?php
        $res = mysqli_query($db, $sql_commodities);
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $description = $ar['description'];
            $ovalue = $ar['ovalue'];
            $lcircuit = $ar['lcircuit'];
            $ucircuit = $ar['ucircuit'];

            $str = "<tr class=\"profile\" id=\"$name\">
            <td class=\"profile\">
                <h1>
                    $name <b>($$current)</b>
                </h1>
                <h3></h3>
                <br>
                <p>
                    $description
                </p>
                <br>
                <br>
                Open Value: <b>$$ovalue</b>
                <br>
                Upper Circuit: <b>$$ucircuit</b>
                <br>
                Lower Circuit: <b>$$lcircuit</b>
                <br>
                <canvas id=\"chart $name\" class=\"chart\"></canvas>
                <br>
                <br>
                Highest Value: <b class=\"highest\">$</b>
                <br>
                Lowest Value: <b class=\"lowest\">$</b>
            </td>
        </tr>";
            echo $str."\n";
        }
    ?>
            
            <tr class="sector"><td class="sector">Securities</td></tr>
    <?php
        $res = mysqli_query($db, $sql_stocks);
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $sector = $ar['sector'];
            $current = $ar['current'];
            $difference = $ar['difference'];
            $percentage = $ar['percentage'];
            $description = $ar['description'];
            $pclose = $ar['pclose'];
            $ovalue = $ar['ovalue'];
            $lcircuit = $ar['lcircuit'];
            $ucircuit = $ar['ucircuit'];

            $str = '';
            if($difference < 0) {
                $difference = -$difference;
                $percentage = -$percentage;

                $str = "<tr class=\"profile\" id=\"\">
                    <td class=\"profile\">
                        <h1>
                            $name <b>($$current, <span class=\"not_inverted triangle\">&#9650;</span>$$difference, $percentage%)</b>
                        </h1>
                        <h3>
                            $sector
                        </h3>
                        <br>
                        <p>
                            $description
                        </p>
                        <br>
                        <br>
                        Previous Close: <b>$$pclose</b>
                        <br>
                        Open Value: <b>$$ovalue</b>
                        <br>
                        Upper Circuit: <b>$$ucircuit</b>
                        <br>
                        Lower Circuit: <b>$$lcircuit</b>
                        <br>
                        <canvas id=\"chart $name\" class=\"chart\"></canvas>
                        <br>
                        <br>
                        Highest Value: <b class=\"highest\">$</b>
                        <br>
                        Lowest Value: <b class=\"lowest\">$</b>
                    </td>
                </tr>";
            }
            else {
                $str = "<tr class=\"profile\" id=\"\">
                    <td class=\"profile\">
                        <h1>
                            $name <b>($$current, <span class=\"inverted triangle\">&#9660;</span>$$difference, $percentage%)</b>
                        </h1>
                        <h3>
                            $sector
                        </h3>
                        <br>
                        <p>
                            $description
                        </p>
                        <br>
                        <br>
                        Previous Close: <b>$$pclose</b>
                        <br>
                        Open Value: <b>$$ovalue</b>
                        <br>
                        Upper Circuit: <b>$$ucircuit</b>
                        <br>
                        Lower Circuit: <b>$$lcircuit</b>
                        <br>
                        <canvas id=\"chart $name\" class=\"chart\"></canvas>
                        <br>
                        <br>
                        Highest Value: <b class=\"highest\">$</b>
                        <br>
                        Lowest Value: <b class=\"lowest\">$</b>
                    </td>
                </tr>";
            }

            echo $str."\n";

            $sql_updates = "SELECT time, current FROM updates WHERE name = '".$name."' ORDER BY time;";
            $res_updates = mysqli_query($db, $sql_updates);

            $updates_time = array();
            $updates_values = array();

            while($u = mysqli_fetch_array($res_updates)) {
                $t = $u['time'];
                $c = intval($u['current']);

                $updates_time[] = $t;
                $updates_values[] = $c;
            }

            $jsobj = array(
                'times' => $updates_time,
                'values' => $updates_values      
            );

            echo '<script>updates["'.$name.'"] = '.json_encode($jsobj).';</script>';
        }
    ?>
    </table>
<?php 
    $scripts = array('common.js', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js', 'chartjsinit.js', 'generateallcharts.js');
    include('foot.php'); 
?>