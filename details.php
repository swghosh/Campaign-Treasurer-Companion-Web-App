<?php 
    // contains common html head and initial code till body
    include('head.php'); 
?>
    <script>
        // updates object will store arrays of times, fluctuated values, highest and lowest values stored with item name as keys
        var updates = {

        };
    </script>
    <table class="view" id="details">
    <?php
        // make connetion to database
        include_once('db.php');

        // queries to get list of cryptocurrencies, commodities and stocks
        $sql_cryptocurrencies = "SELECT name, current, description, ovalue FROM cryptocurrencies ORDER BY name;";
        $sql_commodities = "SELECT name, current, description, ovalue FROM commodities ORDER BY name;";
        $sql_stocks = "SELECT name, sector, current, difference, percentage, description, pclose, ovalue FROM stocks ORDER BY name;";

    ?>
            <tr class="sector"><td class="sector">Cryptocurrencies</td></tr> 
    <?php
        // from list of cryptocurrencies and full profile details make table rows
        $res = mysqli_query($db, $sql_cryptocurrencies);
        if(mysqli_num_rows($res) == 0) {
            $str = '<tr class="profile"><td class="profile">No Cryptocurrencies Available.</td></tr>';
            echo $str."\n";
        }
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $description = mysqli_real_escape_string($db, $ar['description']);
            $ovalue = $ar['ovalue'];

            $str = "<tr class=\"profile\" id=\"$name\">
            <td class=\"profile\">
                <h1>
                    $name <b>(₹$current)</b>
                </h1>
                <h3></h3>
                <br>
                <p>
                    $description
                </p>
                <br>
                <br>
                Open Value: <b>₹$ovalue</b>
                <br>
                <canvas id=\"chart $name\" class=\"chart\"></canvas>
                <br>
                <br>
                Highest Value: <b class=\"highest\">₹</b>
                <br>
                Lowest Value: <b class=\"lowest\">₹</b>
            </td>
        </tr>";
            echo $str."\n";
            
            // query to list price updates for currently iterated cryptocurrency
            $sql_updates = "SELECT time, current FROM updates WHERE name = '".$name."' ORDER BY time;";
            // from list of price updates with time for currently iterated cryptocurrency store to JS updates object
            $res_updates = mysqli_query($db, $sql_updates);

            $updates_time = array();
            $updates_values = array();

            while($u = mysqli_fetch_array($res_updates)) {
                $t = $u['time'];
                $c = floatval($u['current']);

                $updates_time[] = $t;
                $updates_values[] = $c;
            }

            $jsobj = array(
                'times' => $updates_time,
                'values' => $updates_values,
                'highest' => max($updates_values),
                'lowest' => min($updates_values)
            );

            echo '<script>updates["'.$name.'"] = '.json_encode($jsobj).';</script>';
        }
    ?>

            <tr class="sector"><td class="sector">Commodities</td></tr>
    <?php
        // from list of commodities and full profile details make table rows
        $res = mysqli_query($db, $sql_commodities);
        if(mysqli_num_rows($res) == 0) {
            $str = '<tr class="profile"><td class="profile">No Commodities Available.</td></tr>';
            echo $str."\n";
        }
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $current = $ar['current'];
            $description = $ar['description'];
            $ovalue = $ar['ovalue'];

            $str = "<tr class=\"profile\" id=\"$name\">
            <td class=\"profile\">
                <h1>
                    $name <b>(₹$current)</b>
                </h1>
                <h3></h3>
                <br>
                <p>
                    $description
                </p>
                <br>
                <br>
                Open Value: <b>₹$ovalue</b>
                <br>
                <canvas id=\"chart $name\" class=\"chart\"></canvas>
                <br>
                <br>
                Highest Value: <b class=\"highest\">₹</b>
                <br>
                Lowest Value: <b class=\"lowest\">₹</b>
            </td>
        </tr>";
            echo $str."\n";
            
            // query to list price updates for currently iterated commodity
            $sql_updates = "SELECT time, current FROM updates WHERE name = '".$name."' ORDER BY time;";
            // from list of price updates with time for currently iterated commodity store to JS updates object
            $res_updates = mysqli_query($db, $sql_updates);

            $updates_time = array();
            $updates_values = array();

            while($u = mysqli_fetch_array($res_updates)) {
                $t = $u['time'];
                $c = floatval($u['current']);

                $updates_time[] = $t;
                $updates_values[] = $c;
            }

            $jsobj = array(
                'times' => $updates_time,
                'values' => $updates_values,
                'highest' => max($updates_values),
                'lowest' => min($updates_values)
            );

            echo '<script>updates["'.$name.'"] = '.json_encode($jsobj).';</script>';
        }
    ?>
            
            <tr class="sector"><td class="sector">Securities</td></tr>
    <?php
        // from list of stocks and full profile details make table rows
        $res = mysqli_query($db, $sql_stocks);
        if(mysqli_num_rows($res) == 0) {
            $str = '<tr class="profile"><td class="profile">No Securities Available.</td></tr>';
            echo $str."\n";
        }
        while($ar = mysqli_fetch_array($res)) {
            $name = $ar['name'];
            $sector = $ar['sector'];
            $current = $ar['current'];
            $difference = $ar['difference'];
            $percentage = $ar['percentage'];
            $description = $ar['description'];
            $pclose = $ar['pclose'];
            $ovalue = $ar['ovalue'];

            $str = '';
            // in case of negative difference use all conventions of green, high
            if($difference < 0) {
                $difference = -$difference;
                $percentage = -$percentage;

                $str = "<tr class=\"profile\" id=\"$name\">
                    <td class=\"profile\">
                        <h1>
                            $name <b>(₹$current, <span class=\"not_inverted triangle\">&#9650;</span>₹$difference, $percentage%)</b>
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
                        Previous Close: <b>₹$pclose</b>
                        <br>
                        Open Value: <b>₹$ovalue</b>
                        <br>
                        <canvas id=\"chart $name\" class=\"chart\"></canvas>
                        <br>
                        <br>
                        Highest Value: <b class=\"highest\">₹</b>
                        <br>
                        Lowest Value: <b class=\"lowest\">₹</b>
                    </td>
                </tr>";
            }
            // in case of positive difference use all conventions of red, low
            else {
                $str = "<tr class=\"profile\" id=\"$name\">
                    <td class=\"profile\">
                        <h1>
                            $name <b>(₹$current, <span class=\"inverted triangle\">&#9660;</span>₹$difference, $percentage%)</b>
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
                        Previous Close: <b>₹$pclose</b>
                        <br>
                        Open Value: <b>₹$ovalue</b>
                        <br>
                        <canvas id=\"chart $name\" class=\"chart\"></canvas>
                        <br>
                        <br>
                        Highest Value: <b class=\"highest\">₹</b>
                        <br>
                        Lowest Value: <b class=\"lowest\">₹</b>
                    </td>
                </tr>";
            }

            echo $str."\n";

            // query to list price updates for currently iterated stock
            $sql_updates = "SELECT time, current FROM updates WHERE name = '".$name."' ORDER BY time;";
             // from list of price updates with time for currently iterated stock store to JS updates object
            $res_updates = mysqli_query($db, $sql_updates);

            $updates_time = array();
            $updates_values = array();

            while($u = mysqli_fetch_array($res_updates)) {
                $t = $u['time'];
                $c = floatval($u['current']);

                $updates_time[] = $t;
                $updates_values[] = $c;
            }

            $jsobj = array(
                'times' => $updates_time,
                'values' => $updates_values,
                'highest' => max($updates_values),
                'lowest' => min($updates_values)
            );

            echo '<script>updates["'.$name.'"] = '.json_encode($jsobj).';</script>';
        }
    ?>
    </table>
<?php 
    // javascript files that are to be executed
    $scripts = array('common.js', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js', 'chartjsinit.js', 'generateallcharts.js');
    // contains common html body end and also include script declaration of all filenames specified in scripts array
    include('foot.php'); 
?>