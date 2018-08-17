
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campaign Treasurer Companion | Master Panel</title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/base.css" type="text/css" />
        <meta name="theme-color" content="#024">
        <meta name="author" content="SwG Ghosh">
        <meta name="description" content="The Campaign Treasurer Companion Master Panel as a Web App for Prayas fest.">
    </head>
    <body>
        <div class="bars">
            <div class="topbar">
                <h1>
                    Campaign Treasurer Companion
                </h1>
                <small class="time">
                    <?php
                        // time zone is set to Indian Standard Time
                        date_default_timezone_set('Asia/Kolkata');
                        // date stamp to be echoed
                        echo date('Y-m-d H:i:s')."\n";
                    ?>
                </small>
            </div>
        </div>