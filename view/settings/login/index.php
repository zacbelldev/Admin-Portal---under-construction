<?php
function login() {
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        // logged in already
    }
    else {
        $username = $password = $userError = $passError = '';
        if (isset($_POST['sub'])) {
            $username = $_POST['Username'];
            $_SESSION['Username'] = $username;
            $password = $_POST['Password'];
            if ($username === 'zac' && $password === 'cleanGarage24') {
                $_SESSION['login'] = true;
                return;
//            header('Location: https://zach.monkeybarstorage.com/zacFiles/internshipFiles.php');
            }
            if ($username !== 'zac' || $password !== 'cleanGarage24') {$userError = 'Invalid Credentials';}
    } ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width" />
        <title>Login</title>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="/view/settings/login/css/style.css">
        
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

        <script src='/view/settings/login/js/index.js'></script>
    </head>
    <body>
        <?php
        echo "
            <div id='bodyDiv'>
                <img src='/images/mblogo.svg' class='centerLogo'>

                <main class='login-form'>
                    <form method='post'>

                        <div class='form-group log-status'>
                            <input type='text' class='form-control' placeholder='Username' id='UserName' name='Username' value='$username'>
                            <label class='spacer'>&nbsp;</label>

                            <input type='password' class='form-control' placeholder='Password' id='Password' name='Password' value='$password'>
                            <label class='spacer'>&nbsp;</label>
                        </div>

                        <div class='error'>$userError</div>

                        <input type='submit' class='log-btn' value='Log In' name='sub'>

                        <label class='spacer'>&nbsp;</label>
                        <label class='spacer'>&nbsp;</label>
                        <div class='links'>
                        <a class='link' href='?accounts/?action=login'>Forgot Password?</a>
                        </div>
                    </form>
                </main>
            </div>";
                    die();
                }
            }
            login();
            ?>
    </body>
</html>
        
