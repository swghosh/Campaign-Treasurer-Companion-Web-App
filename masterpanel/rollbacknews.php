<?php
    // contains common html head and initial code till body
    include('head.php');

    // create connection to database
    include('../db.php');
?>
        <table class="view" id="panel">
        <tr class="sector"><td colspan="4" class="sector">Navigate</td></tr>
        <tr class="stock" onclick="document.location = '/masterpanel/';"><td class="name"><a href="/masterpanel/" class="link">Master Panel<span class="arrow ext">⎋</span></a></td></tr>

        <tr class="sector"><td colspan="4" class="sector">News Updates</td></tr>
        <?php
            // query to list news items
            $sql = "SELECT * FROM news ORDER BY time DESC;";
            $res = mysqli_query($db, $sql);

            // iterate list of news to make table tr(s)
            while($ar = mysqli_fetch_array($res)) {
                $time = $ar['time'];
                $content = $ar['content'];
                $id = $ar['id'];
                $str = "<tr class=\"news\"> <form id=\"".$id."\" method=\"POST\" action=\"deletenews.php\"> <input type=\"hidden\" name=\"id\" value=\"".$id."\" form=\"".$id."\"> <input type=\"hidden\" name=\"time\" value=\"".$time."\" form=\"".$id."\"> <td class=\"time\">".$time."</td> <td class=\"news\">".$content."</td> <td class=\"news\"><button form=\"".$id."\" type=\"submit\">Rollback</button></td> </form> </tr>\n";
                print($str);
            }
        ?>
        </table>    
<?php
    // javascript files that are to be executed
    $scripts = array();
    // contains common html body end and also include script declaration of all filenames specified in scripts array
    include('foot.php');
?>