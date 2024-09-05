<?php
    // Config File
    //$_config = include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/private/config.php' );

    //Session start
    if(session_id( ) == '' || !isset( $_SESSION ) || session_status( ) === PHP_SESSION_NONE) {
        // session isn't started
        session_start( );
    }

    // Get File path & name
    $filePath = $_SERVER[ 'PHP_SELF' ];
    $fileNameArray = explode( "/", $filePath );
    $fileName = end( $fileNameArray );

    include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );
    
    require_once $_config[ "absolute_path" ] . '/model/addressService.php';
    require_once $_config[ "absolute_path" ] . '/model/educationService.php';
    require_once $_config[ "absolute_path" ] . '/model/familyService.php';
    require_once $_config[ "absolute_path" ] . '/model/projectService.php';
    require_once $_config[ "absolute_path" ] . '/model/skillService.php';
    require_once $_config[ "absolute_path" ] . '/model/usersService.php';
    require_once $_config[ "absolute_path" ] . '/model/validateService.php';

    $usersService = new usersService( );

    //redirect function start
    $validateService = new validateService( );
    
    //redirect function end

    //session_unset();
    if( isset( $_SESSION[ 'userId' ] ) && $_SESSION[ 'userId' ] > 0 ){
        if( strtolower( $fileName ) == 'signup.php' || strtolower( $fileName ) == 'login.php' ){
            header( "Location: " . $_config[ "root_path_admin" ] . "/index.php" );
        }

        if( !isset( $_SESSION[ 'userFirstName' ] ) || strlen( trim( $_SESSION[ 'userFirstName' ] ) ) == 0 ){
            $userData = $usersService->getUserByUserId( $userId = $_SESSION[ 'userId' ] );
    
            if( $userData[ "status" ] ){
                $_SESSION[ 'userFirstName' ] = $userData[ "userFirstName" ];
                $_SESSION[ 'userLastName' ] = $userData[ "userLastName" ];
            } else {
                // remove all session variables
                session_unset();
                header( "Location: " . $_config[ "root_path_admin" ] . "/login.php" );
            }
        }
    } else {
        // remove all session variables
        session_unset();

        if( strtolower( $fileName ) != 'signup.php' && strtolower( $fileName ) != 'login.php' ){
            header( "Location: " . $_config[ "root_path_admin" ] . "/login.php" );
        }
    }

    $id = isset( $_GET[ 'id' ] ) ? intval( $_GET[ 'id' ] ) : 0;
    $fileName = strtolower( $fileName );

    switch ( $fileName ) {
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
        case 'family.php': case 'addeditfamily.php':  // Family Page
            if( $_SESSION[ "isAdmin" ] != 1 ){
                $validateService->redirectToHome( $_config[ "root_path_admin" ] );
            }

            $familyService = new familyService( );
            $pageTitle = "Family";

            if( $fileName == "family.php" ){
                $parentClass = "family";
                $familyData = $familyService->getFamily( $familyId = 0 );
            } else if( $fileName == "addeditfamily.php" ){
                $parentClass = "addEditFamily";
                
                if( $id > 0 ){
                    $pageTitle = "Edit " . $pageTitle;
                    $familyData = $educationService->getEdication( $educationId = $id );
                } else {
                    $pageTitle = "Add " . $pageTitle;
                    $familyData = [ ];
                }
            }
            /* $skillService = new skillService( );

            $pageTitle = 'Add Edit Technical Skill';
            $parentClass = "addEditTechnicalSkill";
            $technicalSkillData = [ ];
            
            if( $id > 0 ){
                $technicalSkillData = $skillService->getTechnicalSkill( $skillId = $id );
            } */
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