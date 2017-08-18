<?php 
    include('head.php'); 
?>
        <!-- <table class="view" id="details">
            <tr class="sector"><td class="sector">Securities</td></tr>
            <tr class="profile" id="Amazon">
                <td class="profile">
                    <h1>
                        Amazon <b>($176, <span class="not_inverted triangle">&#9650;</span>$64, 57%)</b>
                    </h1>
                    <h3>
                        E-commerce
                    </h3>
                    <br>
                    <p>
                        Amazon.com, Inc. is an American electronic commerce and cloud computing company based in Seattle, Washington that was founded on July 5, 1994 by Jeff Bezos. The tech giant is the largest Internet-based retailer in the world by total sales and market capitalization. Amazon.com started as an online bookstore and later diversified to sell DVDs, Blu-rays, CDs, video downloads/streaming, MP3 downloads/streaming, audiobook downloads/streaming, software, video games, electronics, apparel, furniture, food, toys, and jewelry. The company also produces consumer electronics—notably, Kindle e-readers, Fire tablets, Fire TV, and Echo—and is the world's largest provider of cloud infrastructure services. Amazon also sells certain low-end products like USB cables under its in-house brand AmazonBasics.
                    </p>
                    <br>
                    <br>
                    Previous Close: <b>$112</b>
                    <br>
                    Open Value: <b>$119</b>
                    <br>
                    Upper Circuit: <b>$300</b>
                    <br>
                    Lower Circuit: <b>$100</b>
                    <br>
                    <canvas id="chart Amazon" class="chart"></canvas>
                    <br>
                    <br>
                    Highest Value: <b>$202</b>
                    <br>
                    Lowest Value: <b>$112</b>
                </td>
            </tr>
        </table> -->
    <table class="view">
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
            $description = $ar['description'];
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
                Highest Value: <b>$</b>
                <br>
                Lowest Value: <b>$</b>
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
                Lower Circuit: <b>$$lircuit</b>
                <br>
                <canvas id=\"chart $name\" class=\"chart\"></canvas>
                <br>
                <br>
                Highest Value: <b>$</b>
                <br>
                Lowest Value: <b>$</b>
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
                        Highest Value: <b>$</b>
                        <br>
                        Lowest Value: <b>$</b>
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
                        Highest Value: <b>$</b>
                        <br>
                        Lowest Value: <b>$</b>
                    </td>
                </tr>";
            }

            echo $str."\n";
        }
    ?>
    </table>
<?php 
    $scripts = array('common.js', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js', 'chartjsinit.js', 'chartingsample.js');
    include('foot.php'); 
?>