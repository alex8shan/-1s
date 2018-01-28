<?php
    class Account {

        private $errorArray;

        public function __construct() {
            $this->errorArray = array();
        }

        /**
         * Validate user registration input.
         *
         * @param [String] $userName
         * @param [String] $firstName
         * @param [String] $lastName
         * @param [String] $email
         * @param [String] $password
         * @param [String] $password2
         * @return bool
         */
        public function register($username, $firstName, $lastName, $email, $password, $password2) {
            $this -> validateUsername($username);
            $this -> validateFirstname($firstName);
            $this -> validateLastname($lastName);
            $this -> validateEmail($email);
            $this -> validatePassword($password, $password2);

            if(empty($this->errorArray)) {
                //Insert into DB
                return true;
            } else {
                return false;
            }
        }

        /**
         * Returns possible error message
         *
         * @param [String] $error
         * @return void
         */
        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        /**
         * Validate username
         *
         * @param [String] $userName
         * @return void
         */
        function validateUsername($username) {
            if(strlen($username) > 25 || strlen($username) < 4) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            //TODO: Check if username exists
        }

        /**
         * Validate first name
         *
         * @param [String] $firstName
         * @return void
         */
        function validateFirstname($firstName) {
            if(strlen($firstName) > 25 || strlen($firstName) < 2) {
                array_push($this->errorArray, Constants::$firstNameCharacters);
                return;
            }
        }
        
        /**
         * Validate last name
         *
         * @param [String] $lastName
         * @return void
         */
        function validateLastname($lastName) {
            if(strlen($lastName) > 25 || strlen($lastName) < 2) {
                array_push($this->errorArray, Constants::$lastNameCharacters);
                return;
            }
        }
        /**
         * Validate email
         *
         * @param [String] $email
         * @return void
         */
        function validateEmail($email) {
            //manually checks .com suffix
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }
            //TODO: Check if username has been used
        }
        /**
         * Validate password
         *
         * @param [String] $password
         * @param [String] $password2
         * @return void
         */
        function validatePassword($password, $password2) {
            if($password != $password2) {
                array_push($this->errorArray, Constants::$passwordNotMatch);
                return;
            }

            //Optional: check the password's format using preg_match

            if(strlen($password) > 30 || strlen($password) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
        }
    }

?>