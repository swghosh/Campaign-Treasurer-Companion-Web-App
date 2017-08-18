<?php 
    include('head.php'); 
?>
        <table class="view" id="details">
            <tr class="sector"><td class="sector">Securities</td></tr>
            <tr class="profile">
                <td class="profile">
                    <h1>
                        Amazon <b>($176, <span class="not_inverted triangle">&#9650;</span>$64, 57%)</b>
                    </h1>
                    <h3>
                        E-commerce
                    </h3>
                    <br>
                    <p>
                        Amazon.com, Inc. is an American electronic commerce and cloud computing company based in Seattle, Washington that was founded on July 5, 1994 by Jeff Bezos. The tech giant is the largest Internet-based retailer in the world by total sales and market capitalization. Amazon.com started as an online bookstore and later diversified to sell DVDs, Blu-rays, CDs, video downloads/streaming, MP3 downloads/streaming, audiobook downloads/streaming, software, video games, electronics, apparel, furniture, food, toys, and jewelry. The company also produces consumer electronics—notably, Kindle e-readers, Fire tablets, Fire TV, and Echo—and is the world's largest provider of cloud infrastructure services. Amazon also sells certain low-end products like USB cables under its in-house brand AmazonBasics.
                    </p>
                    <br>
                    <br>
                    Previous Close: <b>$112</b>
                    <br>
                    Open Value: <b>$119</b>
                    <br>
                    Upper Circuit: <b>$300</b>
                    <br>
                    Lower Circuit: <b>$100</b>
                    <br>
                    <canvas id="chart Amazon" class="chart"></canvas>
                    <br>
                    <br>
                    Highest Value: <b>$202</b>
                    <br>
                    Lowest Value: <b>$112</b>
                </td>
            </tr>
        </table>
<?php 
    $scripts = array('common.js', '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js', 'chartjsinit.js', 'chartingsample.js');
    include('foot.php'); 
?>