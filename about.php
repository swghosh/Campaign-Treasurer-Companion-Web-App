<?php 
    include('head.php');
?>
        <table class="view">
            <tr class="sector"><td colspan="4" class="sector">Information</td></tr>
            
            <tr class="stock" id="about"><td class="name">About Us <span id="about" class="arrow">⌵</span></td></tr>
            <tr class="news" id="about"><td class="time"></td><td class="news">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum dolores ex facilis eum excepturi. Accusantium rem repellat fugit nesciunt pariatur eum itaque odio minima autem, aperiam, eligendi quidem labore nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit consequatur, facere necessitatibus, officia, molestias facilis cumque placeat molestiae aut provident quos deserunt! Impedit est accusantium nisi itaque eos, molestias autem.<br><br></td></tr>
            
            <tr class="stock" id="rules"><td class="name">Rules, Regulations and Disclaimer <span id="rules" class="arrow">⌵</span></td></tr>
            <tr class="news" id="rules"><td class="time">Ruleset</td><td class="news">The list of rules and regulations are to be put up here soon. Thank you for your patience. Request all the participants to go through the same at a later time to be aware of the ruleset that is to abided at all times of the event proceedings.</td><td class="time">Disclaimer</td><td class="news">This web application does not reflect the values of a real stock exchange. Only simulated updates are provided. And, the use case of the information provided here whatsoever is limited to participants of the event only.</td></tr>
            
            <tr class="sector"><td class="sector">Project</td></tr>
            
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App/blob/master/LICENSE.MD';"><td class="name">License   <span class="arrow ext">⎋</span></td></tr>
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App';"><td class="name">Open-source Project on GitHub   <span class="arrow ext">⎋</span></td></tr>
            
            <tr class="sector"><td colspan="4" class="sector copyright">© Campaign Treasurer, Prayas 17 Fest, Christ University.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td></tr>
        </table>
<?php 
    $scripts = array('common.js', 'rulesandabout.js');
    include('foot.php'); 
?>