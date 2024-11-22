<?php
    //Session start
    if(session_id( ) == '' || !isset( $_SESSION ) || session_status( ) === PHP_SESSION_NONE) {
        // session isn't started
        session_start( );
    }
    
    require_once $_config[ "absolute_path" ] . '/model/educationService.php';
    require_once $_config[ "absolute_path" ] . '/model/familyService.php';
    require_once $_config[ "absolute_path" ] . '/model/usersService.php';
    require_once $_config[ "absolute_path" ] . '/model/projectService.php';

    $usersService = new usersService( );

    $action = array_key_exists( "action", $_GET ) ? strtolower( $_GET[ "action" ] ) : "dashboard";
    $id = isset( $_GET[ 'id' ] ) ? intval( $_GET[ 'id' ] ) : 0;

    $customBodyClass = "";
    $includeFileList = "test,data,table";
    
    //session_unset();
    if( isset( $_SESSION[ 'userId' ] ) && $_SESSION[ 'userId' ] > 0 ){
        if( $action == 'signup' || $action == 'login' ){
            $action = "dashboard";
        }

        if( !isset( $_SESSION[ 'userFirstName' ] ) || strlen( trim( $_SESSION[ 'userFirstName' ] ) ) == 0 ){
            $userData = $usersService->getUserByUserId( $userId = $_SESSION[ 'userId' ] );
    
            if( $userData[ "status" ] ){
                $_SESSION[ 'userFirstName' ] = $userData[ "userFirstName" ];
                $_SESSION[ 'userLastName' ] = $userData[ "userLastName" ];
            } else {
                // remove all session variables
                session_unset( );
                $action = 'login';
            }
        }
    } else {
        // remove all session variables
        session_unset();

        if( $action != 'signup' && $action != 'login' ){
            $action = 'login';
        }
    }


    switch( $action ){
        case "login":
            $pageTitle = "LogIn";
            $customBodyClass = "background-color-bone";
            break;
        case "signup":
            $pageTitle = "SignUp";
            $customBodyClass = "background-color-bone";
            break;
        case "family": case 'addeditfamily':
            if( $_SESSION[ "isAdmin" ] != 1 ){
                $validateService->redirectToHome( $_config[ "root_path_admin" ] );
            }

            $familyService = new familyService( );
            $pageTitle = "Family";

            if( isset( $_POST[ 'deleteId' ] ) && isset( $_POST[ 'deleteType' ] ) ){
                $deleteType = trim( $_POST[ 'deleteType' ] );
                $deleteName = $_POST[ 'deleteName' ];

                if( $deleteType == "familyDelete" ){
                    $familyService->deleteFamily( $_POST[ 'deleteId' ] );
                    $_SESSION[ "successMessage" ] = "The <b>" . $deleteName . "</b> was deleted.";
                }
            }

            if( $action == "family" ){
                $familyData = $familyService->getFamily( $familyId = 0 );
            } else if( $action == "addeditfamily" ){
                $parentsData = $familyService->getParents( $familyId = $id );
                $spousesData = $familyService->getSpouses( $familyId = $id );
                
                if( $id > 0 ){
                    $pageTitle = "Edit " . $pageTitle;
                    $familyData = $familyService->getFamily( $familyId = $id );
                    
                } else {
                    $pageTitle = "Add " . $pageTitle;
                    $familyData = [ ];
                }
            }
            break;
        case 'education': case 'addediteducation':
            if( $_SESSION[ "isAdmin" ] != 1 ){
                $validateService->redirectToHome( $_config[ "root_path_admin" ] );
            }

            $educationService = new educationService( );
            $pageTitle = "Education";
            
            if( isset( $_POST[ 'deleteId' ] ) && isset( $_POST[ 'deleteType' ] ) ){
                $deleteType = trim( $_POST[ 'deleteType' ] );
                $deleteName = $_POST[ 'deleteName' ];

                if( $deleteType == "educationDelete" ){
                    $educationService->deleteEducation( $_POST[ 'deleteId' ] );
                    $_SESSION[ "successMessage" ] = "The <b>" . $deleteName . "</b> was deleted.";
                }
            }

            if( $action == "education" ){
                $educationData = $educationService->getEdication( $educationId = 0 );
            } else if( $action == "addediteducation" ){
                if( $id > 0 ){
                    $pageTitle = "Edit " . $pageTitle;
                    $educationData = $educationService->getEdication( $educationId = $id );
                } else {
                    $pageTitle = "Add " . $pageTitle;
                    $educationData = [ ];
                }
            }
            break;
        case 'projects': case 'addeditproject':
            if( $_SESSION[ "isAdmin" ] != 1 ){
                $validateService->redirectToHome( $_config[ "root_path_admin" ] );
            }

            $projectService = new projectService( );
            $pageTitle = "Projects";
            
            if( isset( $_POST[ 'deleteId' ] ) && isset( $_POST[ 'deleteType' ] ) ){
                $deleteType = trim( $_POST[ 'deleteType' ] );
                $deleteName = $_POST[ 'deleteName' ];

                if( $deleteType == "projectDelete" ){
                    $projectService->deleteProject( $_POST[ 'deleteId' ] );
                    $_SESSION[ "successMessage" ] = "The <b>" . $deleteName . "</b> was deleted.";
                }
            }

            if( $action == "projects" ){
                $projectsData = $projectService->getProjects( );
                $projectRoleData = $projectService->getProjectRoleType( );
            } else if( $action == "addeditproject" ){
                $projectRoleData = $projectService->getProjectRoleType( );

                if( $id > 0 ){
                    $pageTitle = "Edit " . $pageTitle;
                    $projectsData = $projectService->getProjects( $userId = 0, $projectId = $id );
                } else {
                    $pageTitle = "Add " . $pageTitle;
                    $projectsData = [ ];
                }
            }
            /*
            
                    //$projectService->deleteProjectRole( $_POST[ 'deleteId' ] );

            */
            break;
        default:
            $pageTitle = "ABOUT ME";
            $action = "";
    }
/*
case 'family.php': case 'addeditfamily.php':  // Family Page
            */



    if( array_key_exists( "action", $_GET ) || 1==1 ){
    } else {
    // Config File
    //$_config = include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/private/config.php' );



    include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );
    
    require_once $_config[ "absolute_path" ] . '/model/addressService.php';
    
    require_once $_config[ "absolute_path" ] . '/model/skillService.php';
    
    require_once $_config[ "absolute_path" ] . '/model/validateService.php';



    //redirect function start
    $validateService = new validateService( );
    
    //redirect function end

    $fileName = strtolower( $fileName );

    switch ( $fileName ) {
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
        case 'skills.php':
            $skillService = new skillService( );

            $pageTitle = 'Skills';
            $parentClass = "skills";

            if( isset( $_POST[ 'deleteId' ] ) && isset( $_POST[ 'deleteType' ] ) ){
                $deleteType = trim( $_POST[ 'deleteType' ] );

                if( $deleteType == "technicalSkillsType" ){
                    $skillService->deleteTechnicalSkill( $_POST[ 'deleteId' ] );
                }
            }

            $technicalSkillsData = $skillService->getTechnicalSkill( $skillId = 0 );
            //$projectRoleData = $projectService->getProjectRoleType( );
            break;
        case 'addedittechnicalskill.php':
            $skillService = new skillService( );

            $pageTitle = 'Add Edit Technical Skill';
            $parentClass = "addEditTechnicalSkill";
            $technicalSkillData = [ ];
            
            if( $id > 0 ){
                $technicalSkillData = $skillService->getTechnicalSkill( $skillId = $id );
            }
            break;
        default:
            $pageTitle = 'Home';
            $parentClass = "home";
      }

    }
?>