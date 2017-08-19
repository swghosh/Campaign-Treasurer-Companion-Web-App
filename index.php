<?php 
    include('head.php'); 
?>
<div id="data">
<?php
    include('stockstable.php');
?>
</div>
<div id="hidden" class="hidden">
</div>
<?php 
    $scripts = array('common.js', 'tableupdate.js', 'stockupdate.js');
    include('foot.php'); 
?>