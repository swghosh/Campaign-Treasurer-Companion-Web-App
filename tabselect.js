var uri = '<?php echo $_SERVER['SCRIPT_NAME']; ?>';
uri = uri.substring(uri.lastIndexOf('/') + 1);
var li = document.querySelector('a[href="' + uri + '"] li');
li.setAttribute('id', "selected");