<?php
//require($_SERVER['DOCUMENT_ROOT'] . '/view/settings/login/index.php');
$tvMode = "off";
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Zac Bell">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="/css/home.css">
    <link rel="stylesheet" type="text/css" href="/css/mainViews.css">
    <link rel="stylesheet" type="text/css" href="/view/tools/accounting/amazon/css/teststyle.css">
    <style>
        /*        Settings           */
        #settingsLink {
            border-left: 2px solid #545354;
        }
        #fiveIconWide path {
            fill: #c63f3f;
        }
        #fiveIconWide path {
            fill: #c63f3f;
        }
        #fiveIconWide use {
            fill: #B9B9B9;
        }
    </style>
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
        <h3>Welcome, <?php echo $clientData['clientId'];?></h3>
        <a href='/'><img id='settingsIcon' src='/images/settingsIcon.png'></a>
        <a href='/accounts/index.php?action=logout'>
            <svg id='logoutIcon' height="1792" viewBox="0 0 1792 1792" width="1792" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M704 1440q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-119 0-203.5-84.5t-84.5-203.5v-704q0-119 84.5-203.5t203.5-84.5h320q13 0 22.5 9.5t9.5 22.5q0 4 1 20t.5 26.5-3 23.5-10 19.5-20.5 6.5h-320q-66 0-113 47t-47 113v704q0 66 47 113t113 47h312l11.5 1 11.5 3 8 5.5 7 9 2 13.5zm928-544q0 26-19 45l-544 544q-19 19-45 19t-45-19-19-45v-288h-448q-26 0-45-19t-19-45v-384q0-26 19-45t45-19h448v-288q0-26 19-45t45-19 45 19l544 544q19 19 19 45z"/>
            </svg>
            <!--            <img id='logoutIcon' src='/images/logoutIcon.png'>-->
        </a>
    </div>



    <div class="mainContainerChild4">
        <h3>SETTINGS PAGE</h3><br>
        <label>TV Mode:</label>
        <input id="tvMode" type="checkbox" name="tvMode" <?php echo ($tvMode=='on' ? 'checked' : 'off');?> />
    </div>

    <section id="main_section_hero">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
        <form method="post" action="/accounts/index.php">
            <fieldset>
                <label>Client First Name:</label>
                <input type="text" name="firstname" placeholder="Enter your first name" <?php if(isset($firstname)){echo "value='$firstname'";} ?> required><br><br>

                <label>Client Last Name:</label>
                <input type="text" name="lastname" placeholder="Enter your last name" <?php if(isset($lastname)){echo "value='$lastname'";} ?> required><br><br>

                <label>Client Email:</label>
                <input type="email" name="email" placeholder="Enter a valid email address" <?php if(isset($email)){echo "value='$email'";} ?> required><br><br>


                <label for="password">Client Password:</label>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input type="password" name="password" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Create a password"><br>


                <label>Client Level:</label>
                <input type="text" name="userLevel" placeholder="Enter a valid email address" <?php if(isset($userLevel)){echo "value='$userLevel'";} ?> required><br><br>
                
                

                <!--<label>&nbsp;</label>-->
                <input type="submit" name="submit" class='submitButton' value="Register"><br><br>

                <!--DONT FORGET THIS PART BELOW:-->
                <input type="hidden" name="action" value="register">
            </fieldset>
        </form>
        <br><br><br><br><br><br><br><br>
        <h1>Update Account</h1>
        <p>Use this form to update your account information.</p>
        <form method="post" action="/accounts/index.php">
            <fieldset>

                <label>First Name:</label>
                <input type="text" name="UpdateFirstname" <?php
                if (isset($firstname)) {
                    echo "value='$firstname'";
                } elseif (isset($UpdateFirstname)) {
                    echo "value='$UpdateFirstname'";
                }
                ?> required><br><br>

                <label>Last Name:</label>
                <input type="text" name="UpdateLastname" <?php
                if (isset($lastname)) {
                    echo "value='$lastname'";
                } elseif (isset($UpdateLastname)) {
                    echo "value='$UpdateLastname'";
                }
                ?> required><br><br>

                <label>Email:</label>
                <input type="text" name="UpdateEmail" <?php
                if (isset($email)) {
                    echo "value='$email'";
                } elseif (isset($UpdateEmail)) {
                    echo "value='$UpdateEmail'";
                }
                ?> required><br><br>

                <input type="submit" name="submit" class='submitButton' value="Update Account"><br><br>
                <input type="hidden" name="action" value="accountUpdate">
                <input type="hidden" name="clientId" value="<?php
                //                                   if (isset($clientData['clientId'])) {
                //                                       echo $clientData['clientId'];
                //                                   } else
                if (isset($clientId)) {
                    echo $clientId;
                }
                ?>">
            </fieldset>
        </form>
        <h1>Password Change</h1>
        <p>Use this form to change your password.</p>
        <form method="post" action="/accounts/index.php">
            <fieldset>
                <label for="password">New Password:</label>
                <span>Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span>
                <input type="password" name="changePassword" id="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>

                <input type="submit" name="submit" class='submitButton' value="Change Password"><br><br>
                <input type="hidden" name="action" value="changePassword">
                <input type="hidden" name="clientId" value="<?php
                if (isset($clientData['clientId'])) {
                    echo $clientData['clientId'];
                } elseif (isset($clientId)) {
                    echo $clientId;
                }
                ?>">
                <?php
                echo $clientData['clientId'];
//                echo $clientId
                ;?>
            </fieldset>
        </form>
    </section>




<!--    --><?php //echo $tvMode;?>


    <div id="mainContainerChildSpacer"></div>
</main>
</body>
</html>