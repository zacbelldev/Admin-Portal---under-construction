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
            <img src='/images/mblogo.png' class='centerLogo'>
            
            <main class='login-form'>
                <form method='post'>

                    <div class='form-group log-status'>
                        <input type='text' class='form-control' placeholder='Username' id='UserName' name='username' <?php if(isset($username)){echo "value='$username'";} ?> required>
                        <label class='spacer'>&nbsp;</label>
                        
                        <input type='password' class='form-control' placeholder='Password' id='Password' name='password' value='<?php echo $password ?>' required>
                        <label class='spacer'>&nbsp;</label>
                    </div>

                    <div class='error'><?php echo $message ?></div>

                    <input type='submit' class='log-btn' value='Log In' name='sub'>
                    
                    <label class='spacer'>&nbsp;</label>
                    <label class='spacer'>&nbsp;</label>
                    <div class='links'>
                    <a class='link' href='?accounts/?action=login'>Password</a>&nbsp;|&nbsp;<a class='link' href='#'>Register</a>
                    </div>
                </form>
            </main>
    </body>
</html>