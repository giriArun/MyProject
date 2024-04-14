<?php
    include 'dbConnection.php';
    require_once 'validateService.php';
    require_once 'usersService.php';
    require_once 'passwordService.php';
    //usersService.php

    // Start the session
    session_start();

    $usersService = new usersService( );
    $passwordService = new passwordService( );
    $validateService = new validateService( );

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

    function signUpSubmit( $postData ){
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

    function logInSubmit( $postData ){
        $emailPhone = $postData['emailPhone'];
        $password = $postData[ 'password' ];

        $message = [];
        global $validateService;
        global $usersService;
        global $passwordService;

        if( !$validateService->validateIisEmail( $emailPhone ) && !$validateService->validateNumber( $emailPhone ) ){
            array_push($message,"Please enter a valid Email or Phone number.");
        }

        if(!$validateService->validatePassword($password)){
            array_push($message,"Please enter a valid Password.");
        }

        if(!$validateService->validateStringLength( $string = $password, $maxLength = 16, $minLength = 8)){
            array_push($message,"Please enter a Password between 8 to 16 characters.");
        }
        if(count($message)){
            return array("status" => false, "message" => $message, "data" => '');
        } else{
            if( $validateService->validateIisEmail( $emailPhone ) && !$validateService->validateStringLength( $string = $emailPhone, $maxLength = 50, $minLength = 1) ){
                array_push($message,"Please enter a Email within 50 characters.");
                return array( "status" => false, "message" => $message, "data" => '' );
            } else {
                $userId = $usersService->getUserIdByEmailOrPhone( $emailPhone = $emailPhone );

                if( $userId > 0 ){
                    $passwordData = $passwordService->checkByPasswordUserId(
                        $passwordHash = hash( 'sha256', $password ),
                        $userId = $userId
                    );

                    if( $passwordData[ "status" ] && !$passwordData[ "newPassword" ]){
                        $_SESSION[ "userId" ] = $userId;
                    }

                    return $passwordData;
                } else {
                    return array( "status" => false, "message" => array( "User authentication failed." ), "data" => '' );
                }
            }
        }
    }

    function logOutSubmit( ){
        // remove all session variables
        session_unset();

        // destroy the session
        session_destroy();

        return array( "status" => true, "message" => array( "You have successfully logged out!" ), "data" => '' );
    }


    if (array_key_exists("actionType",$_POST)){
        switch ($_POST['actionType']) {
            case "signUpSubmit":
                print json_encode( signUpSubmit( $_POST ) );
                break;
            case "logInSubmit":
                print json_encode( logInSubmit( $_POST ) );
                break;
            case "logOutSubmit":
                print json_encode( logOutSubmit( ) );
                break;
            default:
                print json_encode([]);
          }
    } else{
        print json_encode([]);
    }

?>
