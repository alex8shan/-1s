<?php

function sanitizeFormUsername($inputText) {
    $firstname = strip_tags($inputText);
    $firstname = str_replace(" ","",$inputText);
    return $inputText;
}

function sanitizeFormPassword($inputText) {
    $firstname = strip_tags($inputText);
    return $inputText;
}

function sanitizeFormString($inputText) {
    $firstname = strip_tags($inputText);
    $firstname = str_replace(" ","",$inputText);
    $firstname = ucfirst(strtolower($firstname));
    return $inputText;
}


if(isset($_POST['loginButton'])) {
    //login button is pressed
}

if(isset($_POST['registerButton'])) {
    //register button is pressed
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password']);
}

?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Spotify Clone</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="icon.png" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
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
                <Label for "userName">Username</Label>
                <input id="userName" name="username" type="text" placeholder="e.g. firefly" required>
            </p>

            <p>
                <Label for "firstName">First Name</Label>
                <input id="firstName" name="firstname" type="text" placeholder="e.g. Xuan" required>
            </p>

            <p>
                <Label for "lastName">Last Name</Label>
                <input id="lastName" name="lastname" type="text" placeholder="e.g. Zhang" required>
            </p>

            <p>
                <Label for "email">Email</Label>
                <input id="email" name="email" type="email" placeholder="e.g. example@email.com" required>
            </p>

            <p>
                <Label for "password">Password</Label>
                <input id="password" name="password" type="password" placeholder="Your Password" required>
            </p>

            <p>
                <Label for "password2">Confirm Password</Label>
                <input id="password2" name="password2" type="password" placeholder="Your Password" required>
            </p>

            <button type="submit" name="registerButton">SIGN UP</button>

        </form>
    </div>

</body>

</html>