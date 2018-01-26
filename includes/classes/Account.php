<?php
    class Account {

        public function __construct() {

        }

        public function register() {
            $this -> validateUsername($userName);
            $this -> validateUsername($firstName);
            $this -> validateUsername($lastName);
            $this -> validateUsername($email);
            $this -> validateUsername($password, $password2);
        }

        function validateUsername($userName) {

        }
        
        function validateUsername($firstName) {
            
        }
        
        function validateUsername($lastName) {
            
        }
        
        function validateUsername($email) {
            
        }
        
        function validateUsername($password, $password2) {
            
        }
        
        

    }

?>