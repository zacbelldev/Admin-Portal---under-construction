<?php
require($_SERVER['DOCUMENT_ROOT'] . '/view/settings/login/index.php');
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <?php include($_SERVER["DOCUMENT_ROOT"] . '/modules/toolHead.php'); ?>
    <link rel="stylesheet" type="text/css" href="/view/tools/accounting/amazon/css/teststyle.css">
    <script type="text/javascript" src="/view/tools/accounting/amazon/js/jquery.min.js"></script>
    <script type="text/javascript" src="/view/tools/accounting/amazon/js/script.js"></script>
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
        <h3>Tools > Misc > Department Log</h3>
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

            <h1 class="previousPage">Log Entry</h1><br>
            <form method="post" action="/view/tools/index.php">
                <fieldset>
                    <?php
                    if (isset($message)) {
                        echo "<h3 id='message'>" . $message . "</h3>";
                    }
                    ?>
                    <label>*Category</label>
                    <input type="text" name="category" <?php if (isset($category)) {
                        echo "value='$category'";
                    } ?> required><br><br>
                    <label>*Subcategory</label>
                    <input type="text" name="subcategory" <?php if (isset($subcategory)) {
                        echo "value='$subcategory'";
                    } ?> required><br><br>
                    <label>*Title</label>
                    <input type="text" name="title" <?php if (isset($title)) {
                        echo "value='$title'";
                    } ?> required><br><br>
                    <label>*Description</label>
                    <input type="text" name="description" <?php if (isset($description)) {
                        echo "value='$description'";
                    } ?> required><br><br>
                    <label>Priority Level</label>
                    <input type="text" name="priorityLevel" <?php if (isset($priorityLevel)) {
                        echo "value='$priorityLevel'";
                    } ?> ><br><br>
                    <label>Due Date</label>
                    <input type="date" name="dueDate" <?php if (isset($dueDate)) {
                        echo "value='$dueDate'";
                    } ?>><br><br>
                    <label>Responsible</label>
                    <input type="text" name="responsible" <?php if (isset($responsible)) {
                        echo "value='$responsible'";
                    } ?> ><br><br>

                    <!--<label>&nbsp;</label><br>-->
                    <input type="submit" class="submitButton" value="Add Log Entry"><br><br>
                    <!--DONT FORGET THIS PART BELOW:-->
                    <input type="hidden" name="action" value="createLogEntry">
                </fieldset>
            </form>
        </div>
        <?php
        if (isset($eftDataTable)) {
            echo $eftDataTable;
        }
        ?>
    </div>
    <div id="mainContainerChildSpacer"></div>
</main>
</body>
</html>
