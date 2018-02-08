<?php
//if (!$_SESSION['loggedin']) {
//    header('location: /accounts/index.php?action=login');
//}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Zac Bell">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/packery-grid.css">
    <link rel="stylesheet" type="text/css" href="/css/tables.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <script src="/js/dashboard.js"></script>
    <style>
        div.google-visualization-tooltip {
            background-color: #2a2a2a;
        }
        div.google-visualization-tooltip-list-item li span{
            color: white;
        }
    </style>
    <style>
        /*        Dashboard           */
        /*750 px or more*/
        @media screen and (min-width: 750px) {
            #dashLink {
                border-left: 2px solid #545354;
            }
        }

        #oneIconShort path {
            fill: #00cc7b;
        }

        #oneIconWide path {
            fill: #00cc7b;
        }

        #oneIconWide use {
            fill: #B9B9B9;
        }

        /*#chart_div, #chart_div_two, #chart_div_three {*/
            /*width:500px;*/
            /*height: 250px;*/
        /*}*/

        /*#curve_chart {*/
            /*width:514px;*/
            /*height: 200px;*/
        /*}*/

        /*#donut_chart {*/
            /*width:514px;*/
            /*height: 200px;*/
        /*}*/

        .grid-item text {
            fill: #dbdbdb;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
<aside id="sideBar">
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modules/sideBar.php'); ?>
</aside>
<main id="mainContainer">
    <div class="mobileContainerChildbanner">
        <a href='/'><img id='settingsIcon' src='/images/settingsIcon.png'></a>
        <a id="mobileLogoLink" href="/"><img id="mobileLogo" src="/images/mblogo.svg"></a>
        <a href='/sampleLogin/logout.php'><img id='logoutIcon' src='/images/logoutIcon.png'></a>
    </div>
    <div class="mainContainerChildbanner">
        <div class="welcomeMessage">
            <h4>Welcome, Zac</h4>
            <a href='/'><img id='settingsIcon' src='/images/settingsIcon.png'></a>
            <a href='/accounts/index.php?action=logout'>
                <svg id='logoutIcon' height="1792" viewBox="0 0 1792 1792" width="1792"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M704 1440q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-119 0-203.5-84.5t-84.5-203.5v-704q0-119 84.5-203.5t203.5-84.5h320q13 0 22.5 9.5t9.5 22.5q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-66 0-113 47t-47 113v704q0 66 47 113t113 47h312l11.5 1 11.5 3 8 5.5 7 9 2 13.5zm928-544q0 26-19 45l-544 544q-19 19-45 19t-45-19-19-45v-288h-448q-26 0-45-19t-19-45v-384q0-26 19-45t45-19h448v-288q0-26 19-45t45-19 45 19l544 544q19 19 19 45z"/>
                </svg>
                <!--            <img id='logoutIcon' src='/images/logoutIcon.png'>-->
            </a>
        </div>
        <div class="quickLinks">
<!--            <h4 id="welcomeMessage">Howdy howdy</h4>-->
        </div>
    </div>
    <div class="grid">
        <div class="grid-item">
            <!--            Straight Line Graph-->
            <div class="mainChildSevenByTwohalf">
                <div id="chart_div"></div>
            </div>
        </div>
        <div class="grid-item">
            <!--            Straight Line Graph-->
            <div class="mainChildSevenByTwohalf">
                <div id="chart_div_two"></div>
            </div>
        </div>
        <div class="grid-item">
            <!--            DONUT CHART-->
            <div class="mainChildSevenByTwohalf">
                <!--        <iframe src="https://tool.sellics.com/Amazon-Monitoring/user/cockpit.xhtml" style="height:400px; width:700px;"></iframe>-->
                <!--        <div id="donutchart" style="width: 900px; height: 500px;"></div>-->
                <div id="donut_chart"></div>
            </div>
        </div>
        <div class="grid-item">
            <!--            Curved Line Graph-->
            <div class="mainChildSevenByTwohalf">
                <div id="curve_chart"></div>
            </div>
        </div>
        <div class="grid-item">
            <div class="mainContainerChildprofile mainChildThreeByThree">
                <div class="mainContainerChildprofileChild" draggable="true">
                    <img class="profileImg" src="/images/myProfilePic.jpg">
                    <?php // echo $_SESSION['clientData']['clientFistname'];?>
                </div>
                <div class="mainContainerChildprofileChild">
                    <h1 id="profileName">Zac Bell</h1>
                    <hr>
                    <h2>Online Sales Dept.</h2>
                    <h3>Team Lead</h3>
<!--                    <p>Employed since 4.21.2015</p>-->
<!--                    <p>zac@monkeybarstorage.com</p>-->
                </div>
            </div>
        </div>

<!--        <div class="grid-item">-->
            <!--            WEATHER-->
<!--            <div class="mainChildTwoByThree">-->
<!--                <h3>Current Weather - Rexburg, ID</h3>-->
<!--                <hr>-->
<!--                --><?php
//                $json_string = file_get_contents("http://api.wunderground.com/api/db4e9b9e043615b5/geolookup/conditions/q/ID/Rexburg.json");
//                $parsed_json = json_decode($json_string);
//
//                $location = $parsed_json->{'location'}->{'city'};
//
//                $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
//                echo "Temperature: " . $temp_f . "&#8457;" . "<br>";
//
//                $wind = $parsed_json->{'current_observation'}->{'wind_mph'};
//                echo "Wind speed: $wind mph<br>";
//
//                $windDir = $parsed_json->{'current_observation'}->{'wind_dir'};
//                echo "Wind direction: $windDir<br>";
//                ?>
<!--            </div>-->
<!--        </div>-->
<!--        <div class="grid-item">-->
            <!--            SALES FORECASTING-->
<!--            <div class="mainChildTwoByThree">-->
<!--                <h6>Sales Forecasting</h6>-->
<!--                <hr>-->
<!--                <p>Sales Revenue Goal by the end of June: $50,000</p>-->
<!--                <p>Current MTD: $48,000</p>-->
<!--                <p>Sales Revenue Goal by the end of Q3: $850,000</p>-->
<!--                <p>Current YTD: $498,000</p>-->
<!--                <p>LYTD: $428,000</p>-->
<!--            </div>-->
<!--        </div>-->
        <div class="grid-item">
            <div class='mainChildSevenByFour'>
                <!-- RECENT LOG HISTORY-->
                <h6>Digital Sticky Notes (Log Entries)</h6>
                <hr>
                <?php
                echo $logWidget;
                ?>
            </div>
        </div>
        <div class="grid-item">
            <div class='mainChildSixByFour'>
                <!-- RECENT LOG HISTORY-->
                <!--                <h6>Digital Sticky Notes (Log Entries)</h6>-->
                <!--                <hr>-->
                <h6>Quick Stats</h6>
                <hr>
                <p># of orders in the last week:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">273</strong></p><br>
                <p># of units sold in the last week:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">421</strong></p><br>
                <!--                <h6>Amazon</h6>-->
                <!--                    <hr>-->
                <!--                    <ul>-->
                <p>Account Health:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">89%</strong></p><br>
                <p>Account Rating:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">100%</strong></p><br>
                <p>Star Rating:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">4.9</strong></p><br>
                <p>Buyer Messages:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">N/A</strong></p><br>
                <p>Return Requests:&nbsp;&nbsp;<strong style="color: seagreen; font-size: larger">2</p></strong>
                <!--                    </ul>-->
            </div>
        </div>

<!--        <div class="grid-item">-->
            <!--            LOG HISTORY-->
<!--            <div class="mainChildTwoByThree">-->
<!--                <h6>Digital Sticky Notes (Log Entries)</h6>-->
<!--                <hr>-->
<!--                <p>June 1, 2017 | Added ASIN: B006HS83 | ZB</p>-->
<!--                <p>June 2, 2017 | Added ASIN: B006FFEE | HR</p>-->
<!--                <p>June 4, 2017 | Added ASIN: B00AFFSA | DW</p>-->
<!--                <p>June 7, 2017 | Added ASIN: B00RCCEF | ZB</p>-->
<!--            </div>-->
<!--        </div>-->


<!--        <div class="grid-item">-->
            <!--            TASKS-->
<!--            <div class="mainChildTwoByThree">-->
<!--                <h6>Tasks</h6>-->
<!--                <hr>-->
<!--                <ul>-->
<!--                    <li>31 unread emails: onlinesales@mbs.com</li>-->
<!--                    <li>12 pending Asana tasks</li>-->
<!--                    <li>Email Josh the receipt for EDI</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="grid-item">-->
            <!--            Amazon Metrics-->
<!--            <div class="mainChildThreeByTwo">-->
<!--                <h6>Amazon</h6>-->
<!--                <hr>-->
<!--                <ul>-->
<!--                    <li>Account Health: 89%</li>-->
<!--                    <li>Account Rating: 100%</li>-->
<!--                    <li>Star Rating: 4.9 stars</li>-->
<!--                    <li>Buyer Messages: n/a</li>-->
<!--                    <li>Return Requests: 2</li>-->
<!--                </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="grid-item">-->
            <!--            WHEN I WORK-->
<!--            <div class="mainChildThreeByTwo">-->
<!--                <h6>When I Work</h6>-->
<!--                <hr>-->
<!--                <p>Zac, you logged in at 8:11am this morning.</p>-->
<!--                <p>In order to reach your goals, stay until 4:11am</p>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="grid-item">-->
            <!--            ORDERS-->
<!--            <div class="mainChildThreeByTwo">-->
<!--                <h6>Orders</h6>-->
<!--                <hr>-->
<!--                <p># of orders in the last week: 273</p>-->
<!--                <p># of units sold in the last week: 421</p>-->
<!--            </div>-->
<!--        </div>-->


        <div class="grid-item">
            <!--        SALES DATA-->
            <div class="mainChildThreeByThree">
                <h6>TEST Sales Data</h6>
                <hr>
                <table>
                    <table>
                        <tr>
                            <th>Channel</th>
                            <th>LYTD</th>
                            <th>YTD</th>
                            <th>Growth/Loss</th>
                        </tr>
                        <tr>
                            <?php
                            $mbLYTD = 40000.00;
                            $mbYTD = 60000.00;
                            $growth = $mbYTD - $mbLYTD;
                            $percent = round(($growth / $mbLYTD) * 100, 0);
                            ?>
                            <td>MB Websales</td>
                            <td><?php echo $mbLYTD; ?></td>
                            <td><?php echo $mbYTD; ?></td>
                            <td style="color: seagreen; font-size: larger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $percent; ?>%</td>
                        </tr>
                        <tr>
                            <?php
                            $amzLYTD = 300000.00;
                            $amzYTD = 500000.00;
                            $growth = $amzYTD - $amzLYTD;
                            $percent = round(($growth / $amzLYTD) * 100, 0);
                            ?>
                            <td>Amazon</td>
                            <td><?php echo $amzLYTD; ?></td>
                            <td><?php echo $amzYTD; ?></td>
                            <td style="color: seagreen; font-size: larger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $percent; ?>%</td>
                        </tr>
                        <tr>
                            <?php
                            $tpLYTD = 150000.00 ;
                            $tpYTD = 200000.00 ;
                            $growth = $tpYTD - $tpLYTD;
                            $percent = round(($growth / $tpLYTD) * 100, 0);
                            ?>
                            <td>3rd Party</td>
                            <td><?php echo $tpLYTD; ?></td>
                            <td><?php echo $tpYTD; ?></td>
                            <td style="color: indianred; font-size: larger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $percent; ?>%</td>
                        </tr>
                        <tr>
                            <?php
                            $totalLYTD = $mbLYTD + $amzLYTD + $tpLYTD;
                            $totalYTD = $mbYTD + $amzYTD + $tpYTD;
                            $growth = $totalYTD - $totalLYTD;
                            $percent = round(($growth / $totalLYTD) * 100, 0);
                            ?>
                            <td>Total</td>
                            <td><?php echo $totalLYTD; ?></td>
                            <td><?php echo $totalYTD; ?></td>
                            <td style="color: seagreen; font-size: larger">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $percent; ?>%</td>
                        </tr>
                    </table>
                </table>
            </div>
        </div>
        <div class="grid-item">
            <!--            Straight Line Graph -->
            <div class="">
                <!-- The next line rotates HTML tooltips by 30 degrees clockwise. -->

                <div id="chart_div_three" style="width: 540px; height: 390px; margin: 5px; border-radius: 3px;"></div>
            </div>
        </div>




    </div>
    <div id="mainContainerChildSpacer"></div>
    <!--    PACKERY  -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://unpkg.com/packery@2/dist/packery.pkgd.js'></script>
    <script src='https://unpkg.com/draggabilly@2/dist/draggabilly.pkgd.js'></script>
    <script src="/js/packery-grid.js"></script>
    <script src="/js/dashboard.js"></script>
</main>
</body>
</html>