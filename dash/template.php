<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="css/packery-grid.css">
    <link rel="stylesheet" href="css/custom.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>

<!-- Start Top Bar -->
<div class="top-bar" id="heading-bar-top">
<img class="float-center" id="logoTest" src="img/logoTest.png">
</div>
<div class="top-bar" id="main-menu">
    <ul class="menu vertical medium-horizontal expanded medium-text-center float-center" data-responsive-menu="drilldown medium-dropdown" id="nav-items">
        <li class="has-submenu"><a href="#">Ordering</a>
            <!--            <ul class="submenu menu vertical" data-submenu>-->
            <!--                <li><a href="#">One</a></li>-->
            <!--                <li><a href="#">Two</a></li>-->
            <!--                <li><a href="#">Three</a></li>-->
            <!--            </ul>-->
        </li>
        <li class="has-submenu"><a href="#">Training</a>
        </li>
        <li class="has-submenu"><a href="#">Marketing Resources</a>
        </li>
        <li class="has-submenu"><a href="#">Your Team</a>
        </li>
        <li class="has-submenu"><a href="#">Shipping Claims</a>
        </li>
    </ul>
</div>
<div class="top-bar" id="heading-bar-bottom">
    <h5 class="text-center"><strong>SHIPPING CLAIMS</strong></h5>
</div>

<div class="grid">
    <div class="grid-item grid-percent">
        <!--            Straight Line Graph-->
        <div class="grid-auto">
            <div id="chart_div"></div>
        </div>
    </div>
    <div class="grid-item grid-percent">
        <!--            Curved Line Graph-->
        <div class="grid-auto">
            <div id="curve_chart"></div>
        </div>
    </div>
    <div class="grid-item grid-percent">
        <!--            DONUT CHART-->
        <div class="grid-auto">
            <div id="donutchart"></div>
        </div>
    </div>

</div>
<div id="mainContainerChildSpacer"></div>
<!--    PACKERY  -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://unpkg.com/packery@2/dist/packery.pkgd.js'></script>
<script src='https://unpkg.com/draggabilly@2/dist/draggabilly.pkgd.js'></script>
<script src="js/packery-grid.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>


