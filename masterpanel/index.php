<?php
    include('head.php');
?>
        <table class="view">
            <tr class="sector"><td colspan="4" class="sector">News Updates</td></tr>
            <tr class="stock" id="addnews"><td class="name">Add News Item <span id="addnews" class="arrow">⌵</span></td></tr>
            <tr class="news" id="addnews"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'rollbacknews';"><td class="name"><a href="rollbacknews" class="link">Rollback News Item  <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Cryptocurrencies, Comodities, Securities</td></tr>
            <tr class="stock" id="addstock"><td class="name">Add New Cryptocurrency / Commodity / Security <span id="addstock" class="arrow">⌵</span></td></tr>
            <tr class="news" id="addstock"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            <tr class="stock" id="removestock"><td class="name">Remove Existing Cryptocurrency / Commodity / Security <span id="removestock" class="arrow">⌵</span></td></tr>
            <tr class="news" id="removestock"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            <tr class="stock" id="updateprice"><td class="name">Introduce Price Update to Cryptocurrency / Commodity / Security <span id="updateprice" class="arrow">⌵</span></td></tr>
            <tr class="news" id="updateprice"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'rollbackprice';"><td class="name"><a href="rollbackprice" class="link">Rollback Price Update for Cryptocurrency / Commodity / Security  <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Larger Display</td></tr>
            <tr class="stock" onclick="document.location = 'largescreenview';"><td class="name"><a href="largescreenview" class="link">Show Market Overview  <span class="arrow ext">⎋</span></a></td></tr>

            <tr class="sector"><td colspan="4" class="sector">Trade</td></tr>
            <tr class="stock" id="reversetransaction"><td class="name">Reverse a Transaction <span id="reversetransaction" class="arrow">⌵</span></td></tr>
            <tr class="news" id="reversetransaction"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            <tr class="stock" onclick="document.location = 'activebuyers';"><td class="name"><a href="activebuyers" class="link">Show Active Buyers  <span class="arrow ext">⎋</span></a></td></tr>
            <tr class="stock" id="grantfunds"><td class="name">Grant Funds <span id="grantfunds" class="arrow">⌵</span></td></tr>
            <tr class="news" id="grantfunds"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            <tr class="stock" id="deductfunds"><td class="name">Deduct Funds <span id="deductfunds" class="arrow">⌵</span></td></tr>
            <tr class="news" id="deductfunds"><td class="time"></td><td class="news">
                <form>This place will be replaced with a form.</form>
                <br><br>
            </td></tr>
            
            <tr class="sector"><td colspan="4" class="sector copyright"><b>Please do not use this panel with the authorisation/permission of the market administrator/stock exchange board.</b><br><br>© Campaign Treasurer, Prayas 17 Fest, Christ University.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td></tr>
        </table>    
<?php
    $scripts = array('expanders.js');
    include('foot.php');
?>