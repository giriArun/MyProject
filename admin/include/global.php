<?php
    //Session start
    if(session_id( ) == '' || !isset( $_SESSION ) || session_status( ) === PHP_SESSION_NONE) {
        // session isn't started
        session_start();
    }

    // Get File path & name
    $filePath = $_SERVER[ 'PHP_SELF' ];
    $fileNameArray = explode( "/", $filePath );
    $fileName = end( $fileNameArray );

    include '../model/dbConnection.php';
    require_once '../model/usersService.php';
    require_once '../model/addressService.php';

    $usersService = new usersService( );
    //session_unset();
    if( isset( $_SESSION[ 'userId' ] ) && $_SESSION[ 'userId' ] > 0 ){
        if( strtolower( $fileName ) == 'signup.php' || strtolower( $fileName ) == 'login.php' ){
            header( "Location: index.php" );
        }

        if( !isset( $_SESSION[ 'userFirstName' ] ) || strlen( trim( $_SESSION[ 'userFirstName' ] ) ) == 0 ){
            $userData = $usersService->getUserByUserId( $userId = $_SESSION[ 'userId' ] );
    
            if( $userData[ "status" ] ){
                $_SESSION[ 'userFirstName' ] = $userData[ "userFirstName" ];
                $_SESSION[ 'userLastName' ] = $userData[ "userLastName" ];
            } else {
                // remove all session variables
                session_unset();
                header( "Location: login.php" );
            }
        }
    } else {
        // remove all session variables
        session_unset();

        if( strtolower( $fileName ) != 'signup.php' && strtolower( $fileName ) != 'login.php' ){
            header( "Location: login.php" );
        }
    }

    switch ( strtolower( $fileName ) ) {
        case 'signup.php':
            $pageTitle = 'SignUp';
            break;
        case 'login.php':
            $pageTitle = 'LogIn';
            break;
        case 'index.php':
            $pageTitle = 'Index';
            break;
        case 'profile.php':
            $addressService = new addressService( );

            $pageTitle = 'Profile';
            $userData = $usersService->getUserByUserId( $userId = $_SESSION[ 'userId' ] );
            $addressData = $addressService->getAddressById( $userId = $_SESSION[ 'userId' ] );
            break;
        case 'label3':
            $pageTitle = 'SignUp';
            break;
        case 'label3':
            $pageTitle = 'SignUp';
            break;
        default:
            $pageTitle = 'Home';
      }

   /*  print_r($pageTitle);
    print_r($_SERVER);

    $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);

print_r( $pieces ); */
?>