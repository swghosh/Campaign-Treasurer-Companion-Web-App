<?php 
    // contains common html head and initial code till body
    include('head.php');
?>
        <table class="view">
            <tr class="sector"><td colspan="4" class="sector">Information</td></tr>
            
            <tr class="stock" id="about"><td class="name">About Us <span id="about" class="arrow">⌵</span></td></tr>
            <tr class="news" id="about"><td class="time"></td><td class="news">Campaign Treasurer Companion Web App is an application that allows participants to trade securities, commodities and cryptocurrencies based on a virtual stock market/commodity market simulation taking place at the event itself. It does not reflect the values of any real stock exchange hence, user discretion is advised. Target audience is restricted to participants and event volunteers only.<br><br></td></tr>
            
            <tr class="stock" id="rules"><td class="name">Rules, Regulations and Disclaimer <span id="rules" class="arrow">⌵</span></td></tr>
            <tr class="news" id="rules"><td class="time">Ruleset</td><td class="news"><?php echo file_get_contents(getenv('RULESET_HTML_URL')); ?></td></tr>
            
            <tr class="sector"><td class="sector">Project</td></tr>
            
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App/blob/master/LICENSE.MD';"><td class="name"><a href="https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App/blob/master/LICENSE.MD" class="link">License   <span class="arrow ext">⎋</span></a></td></tr>
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App';"><td class="name"><a href="https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App" class="link">Open-source Project on GitHub   <span class="arrow ext">⎋</span></a></td></tr>
            
            <tr class="sector"><td colspan="4" class="sector copyright">© Campaign Treasurer.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td></tr>
        </table>
<?php 
    // javascript files that are to be executed
    $scripts = array('common.js', 'rulesandabout.js');
    // contains common html body end and also include script declaration of all filenames specified in scripts array
    include('foot.php'); 
?>