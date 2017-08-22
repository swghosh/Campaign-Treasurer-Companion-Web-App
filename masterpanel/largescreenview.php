<?php 
    include('head.php'); 
?>
<div id="data">
<?php
    include('../stockstable.php');
?>
</div>
<div id="hidden" class="hidden">
</div>
<style>
    <?php include('lsv.css'); ?>
</style>
<?php
    $scripts = array('../common.js', '../tableupdate.js', 'changestoupdatetable.js', '../stockupdate.js');
    include('foot.php'); 
?>