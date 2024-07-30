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
    require_once '../model/projectService.php';

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

    $id = isset( $_GET[ 'id' ] ) ? intval( $_GET[ 'id' ] ) : 0;

    switch ( strtolower( $fileName ) ) {
        case 'signup.php':
            $pageTitle = 'SignUp';
            $parentClass = "signUp";
            break;
        case 'login.php':
            $pageTitle = 'LogIn';
            $parentClass = "logIn";
            break;
        case 'index.php':
            $pageTitle = 'Index';
            $parentClass = "index";
            break;
        case 'profile.php':
            $addressService = new addressService( );

            $pageTitle = 'Profile';
            $parentClass = "profile";

            $userData = $usersService->getUserByUserId( $userId = $_SESSION[ 'userId' ] );
            $addressData = $addressService->getAddressById( $userId = $_SESSION[ 'userId' ] );
            break;
        case 'projects.php':
            $projectService = new projectService( );

            $pageTitle = 'Projects';
            $parentClass = "projects";

            if( isset( $_POST[ 'deleteId' ] ) && isset( $_POST[ 'deleteType' ] ) ){
                $deleteType = trim( $_POST[ 'deleteType' ] );

                if( $deleteType == "projectRoleType" ){
                    $projectService->deleteProjectRole( $_POST[ 'deleteId' ] );
                }
            }

            $projectsData = $projectService->getProjects( );
            $projectRoleData = $projectService->getProjectRoleType( );
            break;
        case 'addeditprojectrole.php':
            $projectService = new projectService( );

            $pageTitle = 'Add Edit Project Role';
            $parentClass = "addEditProjectRole";

            $projectroleId = 0;
            $projectRoleType = "";

            if( $id > 0 ){
                $projectRoleData = $projectService->getProjectRoleType( $id );

                if( $projectRoleData[ "status" ] && count( $projectRoleData[ "data" ] ) ){
                    $projectroleId = $projectRoleData[ "data" ][ 0 ][ "projectroleId" ];
                    $projectRoleType = $projectRoleData[ "data" ][ 0 ][ "projectRoleType" ];
                }
            }
            break;
        case 'addeditproject.php':
            $projectService = new projectService( );

            $pageTitle = 'Add Edit Project';
            $parentClass = "addEditProject";
          
            $projectsData = $projectService->getProjects( $userId = 0, $projectId = $id );
            $projectRoleData = $projectService->getProjectRoleType( );
            break;
        case 'label3':
            $pageTitle = 'SignUp';
            $parentClass = "home";
            break;
        default:
            $pageTitle = 'Home';
            $parentClass = "home";
      }

   /*  print_r($pageTitle);
    print_r($_SERVER);

    $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);

print_r( $pieces ); */
?>