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