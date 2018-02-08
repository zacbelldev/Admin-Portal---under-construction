<?php
require($_SERVER['DOCUMENT_ROOT'] . '/view/settings/login/index.php');
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modules/toolHead.php'); ?>
    <link rel="stylesheet" type="text/css" href="/view/tools/accounting/amazon/css/teststyle.css">
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
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
        <h3>Project for Doug</h3>
        <a href='/'><img id='settingsIcon' src='/images/settingsIcon.png'></a>
        <a href='/sampleLogin/logout.php'>
            <svg id='logoutIcon' height="1792" viewBox="0 0 1792 1792" width="1792" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M704 1440q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-119 0-203.5-84.5t-84.5-203.5v-704q0-119 84.5-203.5t203.5-84.5h320q13 0 22.5 9.5t9.5 22.5q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-66 0-113 47t-47 113v704q0 66 47 113t113 47h312l11.5 1 11.5 3 8 5.5 7 9 2 13.5zm928-544q0 26-19 45l-544 544q-19 19-45 19t-45-19-19-45v-288h-448q-26 0-45-19t-19-45v-384q0-26 19-45t45-19h448v-288q0-26 19-45t45-19 45 19l544 544q19 19 19 45z"/>
            </svg>
            <!--            <img id='logoutIcon' src='/images/logoutIcon.png'>-->
        </a>
    </div>
    <div class="wrapper">
        <div class="header">
            <a href="/view/tools/index.php?action=exportDougTemplate" class="export">Export Template File</a>
            <span class="import" onclick="show_popup('popup_upload')">Import File</span>
            <a href="/view/tools/index.php?action=deleteDougData" class="delete">Delete Existing Data</a>
            <span class="export" onclick="show_popup('popup_check')">Email Existing Data</span>
            <h1 class="previousPage">Automation of Quarterly Reporting</h1><br>
        </div>
        <?php
        if (isset($dougDataTable)) {
            echo $dougDataTable;
        }
        ?>
    </div>
    <!--     The popup for upload a csv file-->
    <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload CSV File</h2>
            <form action="/view/tools/index.php?action=importDougData" method="post" enctype="multipart/form-data">
                <input type="file" name="csv" id="csv_file" class="file_input">
                <input type="submit" value="Upload file" id="upload_btn">
            </form>
        </div>
    </div>
<!--    <div id="popup_check">-->
<!--        <div class="form_upload">-->
<!--            <h2>Are you sure?</h2>-->
<!--            <a href="/view/tools/index.php?action=emailDougData">Yes</a>-->
<!--            <span class="close" onclick="close_popup('popup_check')">Cancel</span>-->
<!--        </div>-->
<!--    </div>-->
    <div id="mainContainerChildSpacer"></div>
</main>
</body>
</html>
