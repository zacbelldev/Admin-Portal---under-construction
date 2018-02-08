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
//            CHANGE THIS TO PHP PASSWORD HASHING
            if ($username === 'zac' && $password === 'cleanGarage24') {
                $_SESSION['login'] = true;
                return;
//            header('Location: https://zach.monkeybarstorage.com/zacFiles/internshipFiles.php');
            }
            if ($username !== 'zac' || $password !== 'cleanGarage24') $userError = 'Invalid Credentials';
        } ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Login</title>
            <link rel='stylesheet prefetch'
                  href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
            <link rel="stylesheet" href="/sampleLogin/css/style.css">
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
            <script src='/sampleLogin/js/index.js'></script>
        </head>
        <body>
        <?php
        echo "
<div class='login-form'>
    <form method='post'>
        <h1><img src='/images/mblogo.png'></h1>
        <div class='form-group log-status'>
            <input type='text' class='form-control' placeholder='Username' id='UserName' name='Username' value='$username'><br>
            <input type='password' class='form-control' placeholder='Password' id='Password' name='Password' value='$password'>
        </div>
        <div class='error'>$userError</div>
        <!--<a class='link' href='#'>Lost your password? </a><a class='link' href='#'> Register </a><a class='link' href='#'>Login With Google</a>-->
        <input type='submit' class='log-btn' value='Log In' name='sub'>
    </form>
</div>
";
        die();
    }
}

login();



