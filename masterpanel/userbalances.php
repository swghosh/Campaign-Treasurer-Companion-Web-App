<?php
    // contains common html head and initial code till body 
    include('head.php');

    // create connection to database
    include('../db.php');
?>
        <table class="view" id="panel">
        <tr class="sector"><td colspan="4" class="sector">Navigate</td></tr>
        <tr class="stock" onclick="document.location = '/masterpanel/';"><td class="name" colspan="4"><a href="/masterpanel/" class="link">Master Panel<span class="arrow ext">⎋</span></a></td></tr>

        <tr class="sector"><td colspan="4" class="sector">User Balances</td></tr>
        <?php
            // query to list users and their balances
            $sql = "SELECT name, balance FROM users;";
            $res = mysqli_query($db, $sql);

            // iterate list of users to make table rows with balances
            while($ar = mysqli_fetch_array($res)) {
                $name = $ar['name'];
                $balance = $ar['balance'];
                $str = '<tr class="stock"><td class="name">'.$name.'</td><td class="current">₹'.$balance.'</td></tr>'."\n";
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