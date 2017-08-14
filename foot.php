</body>
    <script>
        var uri = '<?php echo $_SERVER['SCRIPT_NAME']; ?>';
        uri = uri.substring(1);
        var li = document.querySelector('a[href="' + uri + '"] li');
        li.setAttribute('id', "selected");
    </script>
</html>