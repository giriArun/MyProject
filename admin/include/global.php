<?php
    //Session start
    if(session_id( ) == '' || !isset( $_SESSION ) || session_status( ) === PHP_SESSION_NONE) {
        // session isn't started
        session_start( );
    }
    
    require_once $_config[ "absolute_path" ] . '/model/familyService.php';
    require_once $_config[ "absolute_path" ] . '/model/usersService.php';

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
/*
case 'family.php': case 'addeditfamily.php':  // Family Page
            */



    if( array_key_exists( "action", $_GET ) || 1==1 ){
    } else {
    // Config File
    //$_config = include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/private/config.php' );



    include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );
    
    require_once $_config[ "absolute_path" ] . '/model/addressService.php';
    require_once $_config[ "absolute_path" ] . '/model/educationService.php';
    
    require_once $_config[ "absolute_path" ] . '/model/projectService.php';
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
          
            $projectsData = $projectService->getProjects( $userId = 0, $projectId = $id, $isProjectId = 1 );
            $projectRoleData = $projectService->getProjectRoleType( );
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
        case 'education.php': case 'addediteducation.php':  // Education Page
            if( $_SESSION[ "isAdmin" ] != 1 ){
                $validateService->redirectToHome( $_config[ "root_path_admin" ] );
            }

            $educationService = new educationService( );
            $pageTitle = "Education";
            
            if( isset( $_POST[ 'deleteId' ] ) && isset( $_POST[ 'deleteType' ] ) ){
                $deleteType = trim( $_POST[ 'deleteType' ] );

                if( $deleteType == "education" ){
                    $educationService->deleteEducation( $_POST[ 'deleteId' ] );
                }
            }

            if( $fileName == "education.php" ){
                $parentClass = "education";
                $educationData = $educationService->getEdication( $educationId = 0 );

            } else if( $fileName == "addediteducation.php" ){
                $parentClass = "addEditEducation";
                
                if( $id > 0 ){
                    $pageTitle = "Edit " . $pageTitle;
                    $educationData = $educationService->getEdication( $educationId = $id );
                } else {
                    $pageTitle = "Add " . $pageTitle;
                    $educationData = [ ];
                }
            }
            break;
        default:
            $pageTitle = 'Home';
            $parentClass = "home";
      }

    }
?>