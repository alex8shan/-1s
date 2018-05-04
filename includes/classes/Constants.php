<?php

    class Constants {
        //Register error messages
        public static $usernameCharacters = "Your username must be between 4 and 25 characters";
        public static $usernameTaken = "This username is already taken";
        public static $firstNameCharacters = "Your first name must be between 2 and 25 characters";
        public static $lastNameCharacters = "Your last name must be between 2 and 25 characters";
        public static $emailInvalid = "Email format is invalid";
        public static $emailTaken = "This email is already taken";
        public static $passwordCharacters = "Your password must be between 5 and 30 characters";
        public static $passwordNotMatch = "Password don't match";

        //Login error messages
        public static $loginFailed = "Your username or password is incorrect";
    }

?>