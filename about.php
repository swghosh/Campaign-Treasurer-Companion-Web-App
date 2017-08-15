<?php include('head.php'); ?>
        <table class="view">
            <tr class="sector"><td colspan="4" class="sector">Information</td></tr>
            
            <tr class="stock" id="about"><td class="name">About Us <span id="about" class="arrow">&#8963;</span></td></tr>
            <tr class="news" id="about"><td class="time">Campaign Treasurer Web App</td><td class="news">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum dolores ex facilis eum excepturi. Accusantium rem repellat fugit nesciunt pariatur eum itaque odio minima autem, aperiam, eligendi quidem labore nam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit consequatur, facere necessitatibus, officia, molestias facilis cumque placeat molestiae aut provident quos deserunt! Impedit est accusantium nisi itaque eos, molestias autem.</td></tr>
            
            <tr class="stock" id="rules"><td class="name">Rules, Regulations and Disclaimer <span id="rules" class="arrow">&#8963;</span></td></tr>
            <tr class="news" id="rules"><td class="time">Ruleset, Disclaimer</td><td class="news">The list of rules and regulations are to be put up here soon. Thank you for your patience. Request all the participants to go through the same at a later time to be aware of the ruleset that is to abided at all times of the event proceedings. A list of clauses under the head disclaimer are also to be put up here soon.</td></tr>
            
            <tr class="sector"><td class="sector">Project</td></tr>
            
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App/blob/master/LICENSE.MD';"><td class="name">License <span class="arrow">&#8599;</span></td></tr>
            <tr class="stock" onclick="document.location = 'https://github.com/swghosh/Campaign-Treasurer-Companion-Web-App';"><td class="name">Open-source Project on GitHub <span class="arrow">&#8599;</span></td></tr>
            
            <td colspan="4" class="sector copyright">© Campaign Treasurer, Prayas 17 Fest, Christ University.<br>Designed and Developed by <a href="https://github.com/swghosh" class="author">Swarup Ghosh</a>.</td>
        </table>
        <script>
            var aboutFlag = true;
            var rulesFlag = true;
            
            var aboutItem = document.querySelector('tr.news#about');
            var rulesItem = document.querySelector('tr.news#rules');
            
            var aboutArrowSpan = document.querySelector('td.name span.arrow#about');
            var rulesArrowSpan = document.querySelector('td.name span.arrow#rules');
            
            document.querySelector('tr.stock#about').onclick = function() {
                if(aboutFlag == false) {
                    aboutArrowSpan.innerHTML = '&#8963;';
                    aboutItem.style.display = 'table-row';
                    aboutFlag = true;
                }
                else {
                    aboutArrowSpan.innerHTML = '&#8964;';
                    aboutItem.style.display = 'none';
                    aboutFlag = false;
                }
            };
            
            document.querySelector('tr.stock#rules').onclick = function() {
                if(rulesFlag == false) {
                    rulesArrowSpan.innerHTML = '&#8963';
                    rulesItem.style.display = 'table-row';
                    rulesFlag = true;
                }
                else {
                    rulesArrowSpan.innerHTML = '&#8964';
                    rulesItem.style.display = 'none';
                    rulesFlag = false;
                }
            };
        </script>
<?php include('foot.php'); ?>