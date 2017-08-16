    <div class="hidden time">    
    <?php
        date_default_timezone_set('Asia/Kolkata');
        echo date('Y/m/d H:i:s')."\n";
    ?>
    </div>
    <table class="view">
    <?php
        include_once('db.php');
        $sql = "SELECT * FROM news ORDER BY time DESC;";
        $res = mysqli_query($db, $sql);

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