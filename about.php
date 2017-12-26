<?php 
    // contains common html head and initial code till body
    include('head.php');
?>
        <table class="view">
            <tr class="sector"><td colspan="4" class="sector">Information</td></tr>
            
            <tr class="stock" id="about"><td class="name">About Us <span id="about" class="arrow">⌵</span></td></tr>
            <tr class="news" id="about"><td class="time"></td><td class="news">Campaign Treasurer Companion Web App is an application that allows participants at Prayas 17 - Campaign Treasurer Event to trade securities, commodities and cryptocurrencies based on a virtual stock market/commodity market simulation taking place at the event itself. It does not reflect the values of any real stock exchange hence, user discretion is advised. Target audience is restricted to participants and event volunteers only.<br><br></td></tr>
            
            <tr class="stock" id="rules"><td class="name">Rules, Regulations and Disclaimer <span id="rules" class="arrow">⌵</span></td></tr>
            <tr class="news" id="rules"><td class="time">Ruleset</td><td class="news">Welcome to Prayas 2017, your Campaign Treasurer Companion trading a/c has been created and is being handled by the designated volunteer allotted to you, who at all times will be with you executing your trade on your behalf.<br><br>Here every team is given an initial MARGIN of $20,000,000 without any interest. You have 3 asset classes traded in the market – SECURITIES, COMMODITIES, CRYPTO-CURRENCIES.<br><br>For the first time ever the entire trading is going to be computerised – Web-App based. News will be constantly updated in the app and the prices will constantly be fluctuating on the basis of the news and market demand &amp; supply.<br><br>General Guidelines<br>~ One participant from each team should always be on their respective trading table.<br>~ In case of any disputes, the decision of the organizers is final and binding.<br> <br>Trading Guidelines<br>~ Trading is divided into Pre-Lunch and Post-Lunch Session.<br>~ The maximum amount for a single transaction is $ 5Million.<br>~ At any point of time there should not be any attempts for short-selling or any other unethical trade practices, any such transactions will be rejected by server.<br>~ Transactions once executed can not be reversed at any point of time.<br>~ Margin Trade and Expert Advise are subject to predetermined conditions.<br>* Expert Opinion is subjected to market risk or Flash Crash.</td></tr>
            
            <tr class="sector"><td class="sector">Project</td></tr>
            
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App/blob/master/LICENSE.MD';"><td class="name"><a href="https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App/blob/master/LICENSE.MD" class="link">License   <span class="arrow ext">⎋</span></a></td></tr>
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App';"><td class="name"><a href="https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App" class="link">Open-source Project on GitHub   <span class="arrow ext">⎋</span></a></td></tr>
            
            <tr class="sector"><td colspan="4" class="sector copyright">© Campaign Treasurer, Prayas 17 Fest, Christ University.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td></tr>
        </table>
<?php 
    // javascript files that are to be executed
    $scripts = array('common.js', 'rulesandabout.js');
    // contains common html body end and also include script declaration of all filenames specified in scripts array
    include('foot.php'); 
?>