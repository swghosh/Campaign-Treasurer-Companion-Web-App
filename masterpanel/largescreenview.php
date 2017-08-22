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
<link href="tvl.css" rel="stylesheet" type="text/css" />
<?php 
    $scripts = array('../tableupdate.js', 'changestoupdatetable.js', '../stockupdate.js');
    include('foot.php'); 
?>