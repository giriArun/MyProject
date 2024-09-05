<?php
    // Get File path & name
    $filePath = $_SERVER[ 'PHP_SELF' ];
    $fileNameArray = explode( "/", $filePath );
    $fileName = end( $fileNameArray );

	include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );
    
	require_once $_config[ "absolute_path" ] . '/model/usersService.php';
	require_once $_config[ "absolute_path" ] . '/model/frontEndServices.php';


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
		case "projects.php":
			$pageTitle = "PROJECTS";
			$projectsData = $frontEndServices->getProjects( $userId );
			break;
		case "resume.php":
			$pageTitle = "RESUME";
			$educationsData = $frontEndServices->getEducations( $userId );
			$technicalSkillsData = $frontEndServices->getTechnicalsSkill( $userId );
			break;
        case "label3":
			$pageTitle = "Home";
          	break;
        default:
			$pageTitle = "HOME";
    }
?>