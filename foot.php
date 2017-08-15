    </body>
    <?php
        if(isset($scripts)) {
            foreach($scripts as $script) {
                echo '<script src="'.$script.'"></script>\n';
            }
        }
    ?>
</html>