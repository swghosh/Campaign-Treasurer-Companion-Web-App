<?php
// create connection to database
include('../db.php');

// form validation
if(isset($_GET['name']) == false || empty($_GET['name']) || isset($_GET['type']) == false || empty($_GET['type'])) {
    die('Please select an item first!');
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_GET['name']));
$type = mysqli_real_escape_string($db, htmlspecialchars($_GET['type']));
print('<tr class="sector"><td colspan="4" class="sector">'.$name.' Price Updates</td></tr>'."\n");

// query to list price updates of item 
$sql = "SELECT * FROM updates WHERE name = \"".$name."\" ORDER BY time DESC;";
$res = mysqli_query($db, $sql);

// iterate list of updates to make table tr(s)
while($ar = mysqli_fetch_array($res)) {
    $name = $ar['name'];
    $time = $ar['time'];
    $current = $ar['current'];

    $str = "<tr class=\"news\"> <form id=\"".$time."\" method=\"POST\" action=\"deleteprice.php\"> <input type=\"hidden\" name=\"name\" value=\"".$name."\" form=\"".$time."\"> <input type=\"hidden\" name=\"type\" value=\"".$type."\" form=\"".$time."\"> <input type=\"hidden\" name=\"time\" value=\"".$time."\" form=\"".$time."\"> <td class=\"time\">At ".$time."</td> <td class=\"news\">".$name." was priced at ₹".$current.".</td> <td class=\"button\"><button form=\"".$time."\" type=\"submit\">Rollback</button></td> </form> </tr>\n";
    print($str);
}
?>
</table>