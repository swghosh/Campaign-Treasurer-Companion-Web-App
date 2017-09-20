    </body>
    <?php
        // in case scripts variable has list of js files to be executed
        if(isset($scripts)) {
            // iterate list of javascript files
            foreach($scripts as $script) {
                // allow execution of js scripts
                echo '<script src="'.$script.'"></script>';
                echo "\n";
            }
        }
    ?>
</html>