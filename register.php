<?php
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    $account = new Account();
    
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");
?>


    <html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>+1s</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="icon.png" />
        <link rel="stylesheet" type="text/css" href="assets/css/register.css" />
    </head>

    <body>
        <div id="background">
            <div id="loginContainer">
                <div id="inputContainer">
                    <form id="loginForm" action="register.php" method="POST">
                        <h2>Login to your account</h2>
                        <p>
                            <Label for "loginUsername">Username</Label>
                            <input id="loginUsername" name="loginUsername" type="text" placeholder="Your User Name" required>
                        </p>

                        <p>
                            <Label for "loginPassword">Password</Label>
                            <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
                        </p>

                        <button type="submit" name="loginButton">LOG IN</button>

                    </form>


                    <form id="registerForm" action="register.php" method="POST">
                        <h2>Create your free account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$usernameCharacters); ?>
                            <Label for "username">Username</Label>
                            <input id="username" name="username" type="text" placeholder="e.g. HASS" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                            <Label for "firstName">First Name</Label>
                            <input id="firstName" name="firstName" type="text" placeholder="e.g. Zhe" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                            <Label for "lastName">Last Name</Label>
                            <input id="lastName" name="lastName" type="text" placeholder="e.g. Zhang" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$emailInvalid); ?>
                            <Label for "email">Email</Label>
                            <input id="email" name="email" type="email" placeholder="e.g. Too@simple.com" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$passwordCharacters); ?>
                            <Label for "password">Password</Label>
                            <input id="password" name="password" type="password" placeholder="Your password" required>
                        </p>

                        <p>
                            <?php echo $account->getError(Constants::$passwordNotMatch); ?>
                            <Label for "password2">Confirm Password</Label>
                            <input id="password2" name="password2" type="password" placeholder="Enter password again" required>
                        </p>

                        <button type="submit" name="registerButton">SIGN UP</button>

                    </form>
                </div>
            </div>
        </div>

    </body>

    </html>