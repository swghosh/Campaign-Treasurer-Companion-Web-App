<?php
    include('head.php');

    include('../db.php');

    $sql_cryptocurrencies = "SELECT name FROM cryptocurrencies;";
    $sql_commodities = "SELECT name FROM commodities;";
    $sql_stocks = "SELECT name FROM stocks;";

    $names = array();

    $res = mysqli_query($db, $sql_cryptocurrencies);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
    }

    $res = mysqli_query($db, $sql_commodities);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
    }

    $res = mysqli_query($db, $sql_stocks);
    while($ar = mysqli_fetch_array($res)) {
        $names[] = $ar['name'];
    }
?>
        <table class="view" id="panel">
            <tr class="sector"><td colspan="4" class="sector">Home</td></tr>
            <tr class="stock" onclick="document.location = '/';"><td class="name"><a href="/" class="link">Campaign Treasurer Companion Home <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">News Updates</td></tr>
            <tr class="stock" id="addnews"><td class="name">Add News Item <span id="addnews" class="arrow">⌵</span></td></tr>
            <tr class="news" id="addnews"><td class="time"></td><td class="news">
                <form method="POST" action="addnews.php">
                    <textarea name="content" placeholder="content of news"></textarea><br>
                    <br>
                    <i>current time will be used for the news update.</i><br>
                    <input type="submit" value="Post News" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'rollbacknews';"><td class="name"><a href="rollbacknews" class="link">Rollback News Item <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Cryptocurrencies, Comodities, Securities</td></tr>
            <tr class="stock" id="addstock"><td class="name">Add New Cryptocurrency / Commodity / Security <span id="addstock" class="arrow">⌵</span></td></tr>
            <tr class="news" id="addstock"><td class="time"></td><td class="news">
                <form method="POST" action="addstock.php">
                Commodities, cryptocurrencies do not have a sector name, previous close.<br>Cryptocurrencies do not have lower circuit, upper circuit.<br><br>
                    <select name="type" id="type">
                        <option value="stock">Security</option>
                        <option value="cryptocurrency">Cryptocurrency</option>
                        <option value="commodity">Commodity</option>
                    </select><br><br>
                    <input type="text" name="name" placeholder="name" /><br><br>
                    <input type="text" name="sector" placeholder="sector" /><br><br>
                    <label for="pclose">previous close $</label> <input type="number" step="any" name="pclose" placeholder="previous close" /><br><br>
                    <label for="ovalue">open value $</label> <input type="number" step="any" name="ovalue" placeholder="open value" /><br><br>
                    <label for="lcircuit">lower circuit $</label> <input type="number" step="any" name="lcircuit" placeholder="lower circuit" /><br><br>
                    <label for="ucircuit">upper circuit $</label> <input type="number" step="any" name="ucircuit" placeholder="upper circuit" /><br><br>
                    <textarea name="description" placeholder="description"></textarea><br><br>
                    <input type="submit" value="Add Listing" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="removestock"><td class="name">Remove Existing Cryptocurrency / Commodity / Security <span id="removestock" class="arrow">⌵</span></td></tr>
            <tr class="news" id="removestock"><td class="time"></td><td class="news">
                <form method="POST" action="removestock.php">
                    <select name="item">
                        <?php
                            foreach($names as $name) {
                                echo '<option value="'.$name.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    <input type="submit" value="Remove Permanently" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="updateprice"><td class="name">Introduce Price Update to Cryptocurrency / Commodity / Security <span id="updateprice" class="arrow">⌵</span></td></tr>
            <tr class="news" id="updateprice"><td class="time"></td><td class="news">
                <form method="POST" action="updateprice.php">
                    <select name="item">
                        <?php
                            foreach($names as $name) {
                                echo '<option value="'.$name.'">'.$name.'</option>'."\n";
                            }
                        ?>
                    </select><br><br>
                    $ <input type="number" step="any" name="current" placeholder="new price" /><br>
                    <input type="submit" value="Update Price" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'rollbackprice';"><td class="name"><a href="rollbackprice" class="link">Rollback Price Update for Cryptocurrency / Commodity / Security <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Larger Display</td></tr>
            <tr class="stock" onclick="document.location = 'largescreenview.php';"><td class="name"><a href="largescreenview.php" class="link">Show Market Overview <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Trade</td></tr>
            <tr class="stock" id="reversetransaction"><td class="name">Reverse a Transaction <span id="reversetransaction" class="arrow">⌵</span></td></tr>
            <tr class="news" id="reversetransaction"><td class="time"></td><td class="news">
                <form method="POST" action="reversetransaction.php">
                    transaction <input type="number" step="any" name="id" placeholder="id" /><br>
                    <input type="submit" value="Reverse Transaction" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'activebuyers';"><td class="name"><a href="activebuyers" class="link">Show Active Buyers <span class="arrow ext">⎋</span></a></td></tr>
            <tr class="stock" id="grantfunds"><td class="name">Grant Funds <span id="grantfunds" class="arrow">⌵</span></td></tr>
            <tr class="news" id="grantfunds"><td class="time"></td><td class="news">
                <form method="POST" action="grantfunds.php">
                    <select name="user">
                        <option value="">userA</option>
                    </select><br><br>
                    $ <input type="number" step="any" name="current" placeholder="amount" /><br>
                    <input type="text" name="note" placeholder="note" /><br>
                    <input type="submit" value="Grant Fund" />
                </form>
                <br><br>
            </td></tr>
            <tr class="stock" id="deductfunds"><td class="name">Deduct Funds <span id="deductfunds" class="arrow">⌵</span></td></tr>
            <tr class="news" id="deductfunds"><td class="time"></td><td class="news">
                <form method="POST" action="deductfunds.php">
                    <select name="user">
                        <option value="">userA</option>
                    </select><br><br>
                    $ <input type="number" step="any" name="current" placeholder="amount" /><br>
                    <input type="text" name="note" placeholder="note" /><br>
                    <input type="submit" value="Deduct Fund" />
                </form>
                <br><br>
            </td></tr>
            
            <tr class="sector"><td colspan="4" class="sector copyright"><b>Please do not use this panel with the authorisation/permission of the market administrator/stock exchange board.</b><br><br>© Campaign Treasurer, Prayas 17 Fest, Christ University.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td></tr>
        </table>    
<?php
    $scripts = array('expanders.js', 'inpanel.js');
    include('foot.php');
?>