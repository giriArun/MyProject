<?php
	require_once $_config[ "absolute_path" ] . '/model/usersService.php';
	require_once $_config[ "absolute_path" ] . '/model/frontEndServices.php';

	$usersService = new usersService( );
	$frontEndServices = new frontEndServices( );

	$userId = $usersService->getDefaultUserId( );
	$headerFooterData = $frontEndServices->getHeaderFooterData( $userId );

	$action = array_key_exists( "action", $_GET ) ? $_GET[ "action" ] : "";

	switch( $action ){
		case "contact":
			$pageTitle = "CONTACT";
			$addressData = $frontEndServices->getUserAddressDetails( $userId );
			break;
		case "projects":
			$pageTitle = "PROJECTS";
			$projectsData = $frontEndServices->getProjects( $userId );
			break;
		case "resume":
			$pageTitle = "RESUME";
			$educationsData = $frontEndServices->getEducations( $userId );
			$technicalSkillsData = $frontEndServices->getTechnicalsSkill( $userId );
			break;
		default:
			$pageTitle = "ABOUT ME";
			$action = "";
	}
?>