<?php
    /**
     * This class validates the format of the user input regards to account information
     * and returns possible error.
     */
    class Account {

        private $con;
        private $errorArray;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

            // $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'"
            // $stmt = $db->prepare($sql);
            // $stmt->execute();
            // if($db->query('SELECT count(*) FROM users')-fetchColumn() == 1) {
            //     return true;
            // }
            // else {
            //     array_push($this->errorArray, Constants::$loginFailed);
            //     return false;
            // }
        public function login($username, $password) {
            $password = md5($password);
            $query = mysqli_query($this->con, "SELECT * FROM users WHERE username='$username' AND password='$password'");
            if(mysqli_num_rows($query) == 1) {
                return true;
            } else {
                array_push($this->errorArray, Constants::$loginFailed);
                return false;
            }
        }

        /**
         * Validate user registration input.
         *
         * @param [String] $username
         * @param [String] $firstName
         * @param [String] $lastName
         * @param [String] $email
         * @param [String] $password
         * @param [String] $password2
         * @return void
         */
        public function register($username, $firstName, $lastName, $email, $password, $password2) {
            $this -> validateUsername($username);
            $this -> validateFirstname($firstName);
            $this -> validateLastname($lastName);
            $this -> validateEmail($email);
            $this -> validatePassword($password);
            $this -> validatePasswordMatches($password, $password2);

            if(empty($this->errorArray)) {
                //Insert into DB
                return $this->insertUserDetails($username, $firstName, $lastName, $email, $password);
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
         * Insert data into database
         *
         * @param [type] $username
         * @param [type] $firstName
         * @param [type] $lastName
         * @param [type] $email
         * @param [type] $password
         * @return void
         */
        private function insertUserDetails($username, $firstName, $lastName, $email, $password) {
            $encryptedPassword = md5($password);
            $profilePic = "../../assets/img/profile-pics/head_emerald.jpg";
            $date = date("Y-m-d");

            echo "INSERT INTO users VALUES('','$username','$firstName','$lastName','$email','$encryptedPassword','$date','$profilePic'";

            $result = mysqli_query($this->con,"INSERT INTO users VALUES('','$username','$firstName','$lastName','$email','$encryptedPassword','$date','$profilePic')");
            // $result = $db->query("INSERT INTO users VALUES('','$username','$firstName','$lastName','$email','$encryptedPassword','$date','$profilePic')")
            return $result;
        }

        /**
         * Validate username
         * @param [String] $username
         * @return void
         */
        function validateUsername($username) {
            if(strlen($username) > 25 || strlen($username) < 4) {
                array_push($this->errorArray, Constants::$usernameCharacters);
                return;
            }

            $checkUsernameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username='$username'");
            // $checkUsernameQuery = $db->query("SELECT username FROM users WHERE username='$username'");
            
            if(mysqli_num_rows($checkUsernameQuery)!=0) {
            // if($checkUsernameQuery->fetchColumn() != 0) {
                array_push($this->errorArray, Constants::$usernameTaken);
                return;
            }
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
            
            // $checkEmailQuery = $db->query("SELECT email FROM users WHERE email='$email'");
            $checkEmailQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email='$email'");
            
            if($checkEmailQuery->fetchColumn() !=0) {
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
        }
        /**
         * Validate password
         *
         * @param [String] $password
         * @param [String] $password2
         * @return void
         */
        function validatePassword($password) {
            if(strlen($password) > 30 || strlen($password) < 5) {
                array_push($this->errorArray, Constants::$passwordCharacters);
                return;
            }
            //Optional: check the password's format using preg_match
        }

        function validatePasswordMatches($password, $password2) {
            if($password != $password2) {
                array_push($this->errorArray, Constants::$passwordNotMatch);
                return;
            }
        }
    }

?>