<?php

    $current_script = $_SERVER['SCRIPT_NAME'];
    $pages = array(
        '/index.php' => array('Home', '🏠'),
        '/details.php' => array('Details', '📈'),
        '/trader/index.php' => array('Trader', '💵'),
        '/news.php' => array('News', '📰'),
        '/about.php' => array('About', '🔬')
    );
    $page_title = $pages[$current_script][0];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Campaign Treasurer Companion | <?php echo $page_title; ?></title>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="/base.css" type="text/css" />
        <meta name="theme-color" content="#326e82">
        <meta name="author" content="SwG Ghosh">
        <meta name="description" content="The Campaign Treasurer Companion Web App for Prayas'17 fest.">
        <meta name="og:url" content="http://campaigntreasurercompanionwebapp.ap-south-1.elasticbeanstalk.com<?php echo $current_script; ?>">
    </head>
    <body>
        <div class="bars">
            <div class="topbar">
                <h1>
                    Campaign Treasurer Companion
                </h1>
                <small class="time">
                    <?php
                        date_default_timezone_set('Asia/Kolkata');
                        echo date('Y-m-d H:i:s')."\n";
                    ?>
                </small>
            </div>
            <div class="bottombar">
                <ul class="tabs">
                    <?php
                        foreach($pages as $script_name => $page) {
                            $title = $page[0];
                            $emoji = $page[1];
                            
                            if(strcmp($script_name, $current_script) === 0) {
                                $str = '<a href="'.$script_name.'" class="tabitem"><li id="selected"><span class="emoji">'.$emoji.'</span><br>'.$title.'</li></a>';
                            }
                            else {
                                $str = '<a href="'.$script_name.'" class="tabitem"><li><span class="emoji">'.$emoji.'</span><br>'.$title.'</li></a>';
                            }
                            echo $str."\n";
                        }
                    ?>
                </ul>
            </div>
        </div>