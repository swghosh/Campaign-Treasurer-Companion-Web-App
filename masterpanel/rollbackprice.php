<?php
    // contains common html head and initial code till body
    include('head.php');

    // create connection to database
    include('../db.php');

    // query to list names of items (cryptocurrencies / commodities / stocks)
    $sql_cryptocurrencies = "SELECT name FROM cryptocurrencies;";
    $sql_commodities = "SELECT name FROM commodities;";
    $sql_stocks = "SELECT name FROM stocks;";

    // decalre arrays to keep item name and types
    $names = array();
    $types = array();

    // store data into array of item names and types

    $res = mysqli_query($db, $sql_cryptocurrencies);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
        $types[] = 'cryptocurrency';
    }

    $res = mysqli_query($db, $sql_commodities);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
        $types[] = 'commodity';
    }

    $res = mysqli_query($db, $sql_stocks);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
        $types[] = 'stock';
    }
?>
    <table class="view" id="panel">
        <tr class="sector"><td colspan="4" class="sector">Navigate</td></tr>
        <tr class="stock" onclick="document.location = '/masterpanel/';"><td class="name"><a href="/masterpanel/" class="link">Master Panel<span class="arrow ext">⎋</span></a></td></tr>

        <tr class="sector"><td colspan="4" class="sector">Select</td></tr>
        <tr class="news" id="removestock"><td class="time"></td>
            <td class="news">
                <form method="POST" action="removestock.php">
                    <select name="item">
                        <?php
                            // iterate names of items as select items
                            for($i = 0; $i < sizeof($names); $i++) {
                                $name = $names[$i];
                                $type = $types[$i];
                                echo '<option value="'.$name.'" id="'.$type.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br>
                </form>
                <br><br>
            </td>
        </tr>
        <table class="view" id="data"></table>
    </table>    
<?php
    // javascript files that are to be executed    
    $scripts = array('rollbackupdatesloader.js');
    // contains common html body end and also include script declaration of all filenames specified in scripts array    
    include('foot.php');
?>