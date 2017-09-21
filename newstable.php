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
        // query to get list of news
        $sql = "SELECT * FROM news ORDER BY time DESC;";
        $res = mysqli_query($db, $sql);

        // from list of news and respective time make table rows
        while($ar = mysqli_fetch_array($res)) {
            $time = $ar['time'];
            $content = $ar['content'];
            $string = "<tr class=\"news\">
                <td class=\"time\">$time</td>
                <td class=\"news\">$content</td>
            </tr>\n";
            print($string);
        }
    ?>
    </table>