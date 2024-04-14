<?php
    class validateService{
        function validateName($name){
            $name = trim($name);
    
            if( strlen($name) > 0 && preg_match('/^[a-zA-Z]+$/', $name) ){
                return true;
            } else {
                return false;
            }
        }
    
        function validateStringLength( $string, $maxLength, $minLength = 1){
            $string = trim($string);
    
            if (strlen($string) > $maxLength || strlen($string) < $minLength) {
                return false;
            } else {
                return true;
            }
        }
    
        function validateIisEmail($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return false;
            } else {
                return true;
            }
        }
    
        function validateNumber($name) {
            $name = trim($name);
    
            if( strlen($name) > 0 && preg_match('/^[0-9]{10}+$/', $name) ){
                return true;
            } else {
                return false;
            }
        }
    
        function validatePassword($name){
            $name = trim($name);
    
            if( strlen($name) > 0 && preg_match('/^[0-9a-zA-Z!@#$&]+$/', $name) ){
                return true;
            } else {
                return false;
            }
        }
    }
?>