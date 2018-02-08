<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width"/>
    <title>Login</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="/view/settings/login/css/style.css">

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

    <script src='/view/settings/login/js/index.js'></script>
</head>
<body id="body">
<div id="bodyDiv">
    <img src="/images/mblogo.svg" class="centerLogo">
    <main class="login-form">
        <form method="post" action="/accounts/index.php">
            <div class="form-group log-status">
                <input type="email" id="UserName" class="form-control" name="username" placeholder="Enter your valid email" <?php if (isset($email)) {echo "value='$email'";} ?> required>
                <label class="spacer">&nbsp;</label>
                <input type="password" class="form-control" placeholder="Password" id="Password" name="password" required>
<!--                <input type="password" class="form-control" placeholder="Password" id="Password" name="password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">-->
                <label class="spacer">&nbsp;</label>
            </div>
            <div class="error"><?php echo $userError?></div>
            <input type="submit" class="log-btn" value="Login" name="sub">
            <input type="hidden" name="action" value="login">
            <label class="spacer">&nbsp;</label>
            <label class="spacer">&nbsp;</label>
            <div class="links">
                <a class="link" href="/accounts/index.php?action=password">Forgot Password?</a>
            </div>
        </form>
    </main>
</div>
</body>
</html>