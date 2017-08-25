<?php
    include('head.php');

    
?>
        <div id="data">
            <?php include('buyerstable.php'); ?>
        </div>    
<?php
    $scripts = array('../common.js', '../tableupdate.js', 'changestoupdatetable.js', 'buyersupdate.js');
    include('foot.php');
?>