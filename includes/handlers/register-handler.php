<?php
/**
 * Cleans the format for username
 *
 * @param [String] $inputText
 * @return void
 */
function sanitizeFormUsername($inputText) {
    //ignore the HTML tags.
    $inputText = strip_tags($inputText);
    //ignore the spaces in the string
    $inputText = str_replace(" ","",$inputText);
    return $inputText;
}

/**
 * Cleans the format for string
 *
 * @param [String] $inputText
 * @return void
 */
function sanitizeFormString($inputText) {
    //ignore the HTML tags.
    $inputText = strip_tags($inputText);
    //ignore the spaces in the string
    $inputText = str_replace(" ","",$inputText);
    //set string to all lowercase except the first character
    $inputText = ucfirst(strtolower($inputText));
    return $inputText;
}

/**
 * Cleans the format for password
 *
 * @param [String] $inputText
 * @return void
 */
function sanitizeFormPassword($inputText) {
    //ignore the HTML tags.
    $inputText = strip_tags($inputText);
    return $inputText;
}

// When register button is pressed
if(isset($_POST['registerButton'])) {
    //sanitize all inputs
    $username = sanitizeFormUsername($_POST['username']);
    $firstName = sanitizeFormString($_POST['firstName']);
    $lastName = sanitizeFormString($_POST['lastName']);
    $email = sanitizeFormString($_POST['email']);
    $password = sanitizeFormPassword($_POST['password']);
    $password2 = sanitizeFormPassword($_POST['password2']);
    //call the register function in account class.
    $wasSuccessful = $account -> register($username, $firstName, $lastName, $email, $password, $password2);
    //checks if user input have any errors
    if($wasSuccessful) {
        header("Location: index.php");
    }
}

?>