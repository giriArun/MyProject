<?php
    // Get File path & name
    $filePath = $_SERVER[ 'PHP_SELF' ];
    $fileNameArray = explode( "/", $filePath );
    $fileName = end( $fileNameArray );

 
    include 'model/dbConnection.php';
	require_once 'model/usersService.php';
	require_once 'model/frontEndServices.php';


	$usersService = new usersService( );
	$frontEndServices = new frontEndServices( );


	$userId = $usersService->getDefaultUserId( );
	$headerFooterData = $frontEndServices->getHeaderFooterData( $userId );


	//print_r( $addressData );
	print_r( $fileName );
	//exit;


    switch( $fileName ){
        case "index.php":
            $pageTitle = "ABOUT ME";
            break;
        case "contact.php":
			$pageTitle = "CONTACT";
	        $addressData = $frontEndServices->getUserAddressDetails( $userId );
			break;
        case "label3":
			$pageTitle = "Home";
          	break;
        default:
			$pageTitle = "HOME";
    }
?>