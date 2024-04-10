<?php
    include 'dbConnection.php';
    require_once 'usersService.php';
    require_once 'passwordService.php';
    //usersService.php

    $usersService = new usersService( );
    $passwordService = new passwordService( );

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

    function signUpSubmit( $postData){
        $firstName = $postData['firstName'];
        $lastName = $postData['lastName'];
        $email = $postData['email'];
        $phone = $postData['phone'];
        $password = $postData[ 'password' ];
        $termAndCondition = array_key_exists("termAndCondition",$postData)? 1 : 0;

        $message = [];
        global $usersService;
        global $passwordService;
        global $conn;

        if(!validateName($firstName) || !validateName($lastName)){
            array_push($message,"Please enter a valid name.");
        }

        if(!validateStringLength( $string = $firstName, $maxLength = 20, $minLength = 1) || !validateStringLength( $string = $lastName, $maxLength = 20, $minLength = 1)){
            array_push($message,"Please enter a name within 20 characters.");
        }

        if(!validateIisEmail($email)){
            array_push($message,"Please enter a valid Email.");
        }

        if(!validateStringLength( $string = $email, $maxLength = 50, $minLength = 1)){
            array_push($message,"Please enter a Email within 50 characters.");
        }

        if(!validateNumber($phone)){
            array_push($message,"Please enter a valid Phone number.");
        }

        if(!validatePassword($password)){
            array_push($message,"Please enter a valid Password(characters,Numbers,!,@,#,$,&).");
        }

        if(!validateStringLength( $string = $password, $maxLength = 16, $minLength = 8)){
            array_push($message,"Please enter a Password between 8 to 16 characters.");
        }

        if(count($message)){
            return array("status" => false, "message" => $message, "data" => '');
        } else{
            if( $usersService->isEmailExist( $conn = $conn, $email = $email ) ){
                array_push($message,"This Email already exists.");
            }
            
            if( $usersService->isPhoneExist( $conn = $conn, $phone = $phone ) ){
                array_push($message,"This Phone already exists.");
            }
            
            if( count( $message ) ){
                return array("status" => false, "message" => $message, "data" => '');
            } else {
                $userId = $usersService->insertUser(
                    $conn = $conn,
                    $firstName = $firstName,
                    $lastName = $lastName,
                    $email = $email,
                    $phone = $phone,
                    $termAndCondition = $termAndCondition
                );

                if( $userId > 0 ){
                    $passwordService->insertPassword(
                        $conn = $conn,
                        $passwordHash = hash( 'sha256', $password ),
                        $userId = $userId,
                        $isOneTime = 0,
                        $createdBy = $userId
                    );
                }

                array_push($message,"User created successfully.");

                return array( "status" => true, "message" => $message, "data" => '' );
            }
        }       
    }


    if (array_key_exists("actionType",$_POST)){
        switch ($_POST['actionType']) {
            case "signUpSubmit":
                print json_encode( signUpSubmit( $_POST ) );
                break;
            case "label2":
                //code block;
                break;
            case "label3":
                //code block
                break;
            default:
              //code block
          }
        //print($_POST['actionType']);
        //print json_encode($_POST);
    } else{
        print json_encode([]);
    }

?>
