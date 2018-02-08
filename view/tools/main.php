<?php
if (!$_SESSION['loggedin']) {
    header('location: /accounts/index.php?action=login');
}
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modules/toolHead.php'); ?>
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
        <h3>Tools</h3>
        <a href='/'><img id='settingsIcon' src='/images/settingsIcon.png'></a>
        <a href='/accounts/index.php?action=logout'>
            <svg id='logoutIcon' height="1792" viewBox="0 0 1792 1792" width="1792" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M704 1440q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-119 0-203.5-84.5t-84.5-203.5v-704q0-119 84.5-203.5t203.5-84.5h320q13 0 22.5 9.5t9.5 22.5q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-66 0-113 47t-47 113v704q0 66 47 113t113 47h312l11.5 1 11.5 3 8 5.5 7 9 2 13.5zm928-544q0 26-19 45l-544 544q-19 19-45 19t-45-19-19-45v-288h-448q-26 0-45-19t-19-45v-384q0-26 19-45t45-19h448v-288q0-26 19-45t45-19 45 19l544 544q19 19 19 45z"/>
            </svg>
            <!--            <img id='logoutIcon' src='/images/logoutIcon.png'>-->
        </a>
    </div>
    <div class="mainContainerChildHexContainer">
        <div class="mainContainerChildHexChild">


            <div class="hex-row hex-row-even">
                <a href="/">
                    <div class="hex">
                        <p class="overlayText">Operations</p>
                    </div>
                </a>
                <a href="/view/tools/index.php?action=accounting">
                    <div class="hex">
                        <p class="overlayText">Accounting</p>
                    </div>
                </a>
            </div>
            <div class="hex-row">
                <div class="hex">
                    <p class="overlayText">Sales</p>
                </div>
                <div class="hex">
                    <p class="overlayText">Marketing</p>
                </div>
                <div class="hex">
                    <p class="overlayText">Productivity</p>
                </div>
            </div>
            <div class="hex-row hex-row-even">
                <div class="hex">
                    <p class="overlayText">Customer Service</p>
                </div>
                <a href="/view/tools/index.php?action=misc">
                    <div class="hex">
                        <p class="overlayText">Misc.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="mainContainerChildSpacer"></div>
</main>
</body>
</html>