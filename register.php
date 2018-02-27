<?php
include "includes/config.php";
include "includes/classes/Account.php";
include "includes/classes/Constants.php";
$account = new Account($con);
include "includes/handlers/register-handler.php";
include "includes/handlers/login-handler.php";
?>


<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to +1s!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/icon.png" />
    <link rel="stylesheet" type="text/css" href="assets/css/register.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
<?php
if (isset($_POST['registerButton'])) {
    echo '<script>
                    $(document).ready(function() {
                    $("#loginForm").hide();
                    $("#registerForm").show();
                    })
                </script>';
} else {
    echo '<script>
                $(document).ready(function () {
                    $("#loginForm").show();
                    $("#registerForm").hide();
                })
            </script>';
}
?>

        <div id="background">
            <div id="loginContainer">
                <div id="inputContainer">
                    <form id="loginForm" action="register.php" method="POST">
                        <h2>Login to your account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$loginFailed); ?>
                            <Label for "loginUsername">Username</Label>
                            <input id="loginUsername" name="loginUsername" type="text" placeholder="Your User Name" required>
                        </p>

                        <p>
                            <Label for "loginPassword">Password</Label>
                            <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
                        </p>

                        <button type="submit" name="loginButton">LOG IN</button>

                        <div class="hasAccountText">
                            <span id="hideLogin">Don't have an account yet? Sign up here.</span>
                        </div>

                    </form>


                    <form id="registerForm" action="register.php" method="POST">
                        <h2>Create your free account</h2>
                        <p>
                            <?php echo $account->getError(Constants::$usernameCharacters); ?>
                            <?php echo $account->getError(Constants::$usernameTaken); ?>
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
                            <?php echo $account->getError(Constants::$emailTaken); ?>
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

                        <div class="hasAccountText">
                            <span id="hideRegister">Already have an account? Log in here.</span>
                        </div>

                    </form>
                </div>

                <div id="loginText">
                    <h1>Stay Simple & Stay Naive.</h1>
                    <h2>Listen to +1s and run faster than Hong Kong journalist!</h2>
                </div>
            </div>
        </div>
</body>

</html>