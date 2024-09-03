<?php
    //include 'dbConnection.php';
    include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );

    require_once $_config[ "absolute_path" ] . '/model/addressService.php';
    require_once $_config[ "absolute_path" ] . '/model/educationService.php';
    require_once $_config[ "absolute_path" ] . '/model/passwordService.php';
    require_once $_config[ "absolute_path" ] . '/model/projectService.php';
    require_once $_config[ "absolute_path" ] . '/model/skillService.php';
    require_once $_config[ "absolute_path" ] . '/model/usersService.php';
    require_once $_config[ "absolute_path" ] . '/model/validateService.php';
    //usersService.php

    // Start the session
    session_start();

    $addressService = new addressService( );
    $passwordService = new passwordService( );
    $projectService = new projectService( );
    $skillService = new skillService( );
    $usersService = new usersService( );
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

    function validatePhoneNumber($name) {
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

        if(!validatePhoneNumber($phone)){
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
            if( $usersService->isEmailExist( $email = $email ) ){
                array_push($message,"This Email already exists.");
            }
            
            if( $usersService->isPhoneExist( $phone = $phone ) ){
                array_push($message,"This Phone already exists.");
            }
            
            if( count( $message ) ){
                return array("status" => false, "message" => $message, "data" => '');
            } else {
                $userId = $usersService->insertUser(
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

        if( !$validateService->validateIisEmail( $emailPhone ) && !$validateService->validatePhoneNumber( $emailPhone ) ){
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
                        $_SESSION[ "isAdmin" ] = $usersService->getUserAdmin( $userId );
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

    function profileSubmit( $postData ){
        $userId = $postData['userId'];
        $firstName = $postData['firstName'];
        $lastName = $postData['lastName'];
        $email = $postData['email'];
        $phone = $postData['phone'];
        $addressId = $postData['addressId'];
        $address = $postData['address'];
        $policeStation = $postData['policeStation'];
        $cityOrTown = $postData['cityOrTown'];
        $district = $postData['district'];
        $pin = $postData['pin'];
        $state = $postData['state'];
        $country = $postData['country'];
        $mapUrl = $postData['mapUrl'];
       // $password = ""; //$postData[ 'password' ];
        //$termAndCondition = array_key_exists("termAndCondition",$postData)? 1 : 0;

        $message = [];
        global $usersService;
        global $validateService;
        global $addressService;
        global $conn;

        if( !$usersService->isUserExist( $userId ) ){
            array_push($message,"Invalid user information.");
        } else {
            //Validate User fields
            if(!$validateService->validateName($firstName) || !$validateService->validateName($lastName)){
                array_push($message,"Please enter a valid name.");
            }
    
            if(!$validateService->validateStringLength( $string = $firstName, $maxLength = 20, $minLength = 1) || !$validateService->validateStringLength( $string = $lastName, $maxLength = 20, $minLength = 1)){
                array_push($message,"Please enter a name within 20 characters.");
            }
    
            if(!$validateService->validateIisEmail($email)){
                array_push($message,"Please enter a valid Email.");
            }
    
            if(!$validateService->validateStringLength( $string = $email, $maxLength = 50, $minLength = 1)){
                array_push($message,"Please enter a Email within 50 characters.");
            }
    
            if(!$validateService->validatePhoneNumber($phone)){
                array_push($message,"Please enter a valid Phone number.");
            }

            //validate Address fields
            if( strlen($address) > 0 ){
                if(!$validateService->validateAddress($address)){
                    array_push($message,"Please enter a valid Address.");
                }

                if(!$validateService->validateStringLength( $string = $address, $maxLength = 100, $minLength = 1)){
                    array_push($message,"Please enter a Address within 100 characters.");
                }
            }
            
            if( strlen($policeStation) > 0 ){
                if(!$validateService->validatePlace($policeStation)){
                    array_push($message,"Please enter a valid Police Station.");
                }

                if(!$validateService->validateStringLength( $string = $policeStation, $maxLength = 50, $minLength = 1)){
                    array_push($message,"Please enter a Police Station within 50 characters.");
                }
            }
            
            if( strlen($cityOrTown) > 0 ){
                if(!$validateService->validatePlace($cityOrTown)){
                    array_push($message,"Please enter a valid City/Town.");
                }

                if(!$validateService->validateStringLength( $string = $cityOrTown, $maxLength = 50, $minLength = 1)){
                    array_push($message,"Please enter a City/Town within 50 characters.");
                }
            }
            
            if( strlen($district) > 0 ){
                if(!$validateService->validatePlace($district)){
                    array_push($message,"Please enter a valid District.");
                }

                if(!$validateService->validateStringLength( $string = $district, $maxLength = 50, $minLength = 1)){
                    array_push($message,"Please enter a District within 50 characters.");
                }
            }
            
            if( strlen($pin) > 0 ){
                if(!$validateService->validateNumber($pin)){
                    array_push($message,"Please enter a valid PIN.");
                }

                if(!$validateService->validateStringLength( $string = $pin, $maxLength = 6, $minLength = 6 )){
                    array_push($message,"Please enter a PIN with 7 characters.");
                }
            }
            
            if( strlen($state) > 0 ){
                if(!$validateService->validatePlace($state)){
                    array_push($message,"Please enter a valid State.");
                }

                if(!$validateService->validateStringLength( $string = $state, $maxLength = 50, $minLength = 1)){
                    array_push($message,"Please enter a State within 50 characters.");
                }
            }
            
            if( strlen($country) > 0 ){
                if(!$validateService->validatePlace($country)){
                    array_push($message,"Please enter a valid Country.");
                }

                if(!$validateService->validateStringLength( $string = $country, $maxLength = 50, $minLength = 1)){
                    array_push($message,"Please enter a Country within 50 characters.");
                }
            }
            
            if( strlen($mapUrl) > 0 ){
                if(!$validateService->validateUrl($mapUrl)){
                    array_push($message,"Please enter a valid Map URL.");
                }

                if(!$validateService->validateStringLength( $string = $country, $maxLength = 1000, $minLength = 1)){
                    array_push($message,"Please enter a Map URL within 1000 characters.");
                }
            }
            
            //return array("status" => false, "message" => $message, "data" => $validateService->validateAddress($address));
            
            if(count($message)){
                return array("status" => false, "message" => $message, "data" => '');
            } else {
                if( $usersService->isEmailExist( $email = $email, $userId = $userId ) ){
                    array_push($message,"This Email already exists.");
                }
                
                if( $usersService->isPhoneExist( $phone = $phone, $userId = $userId ) ){
                    array_push($message,"This Phone already exists.");
                }

                if( count( $message ) ){
                    return array("status" => false, "message" => $message, "data" => '');
                } else {
                    $uesrLastId = $usersService->updateUser(
                        $userId = $userId,
                        $firstName = $firstName,
                        $lastName = $lastName,
                        $email = $email,
                        $phone = $phone,
                        $modifiedBy = $userId
                    );

                    if( $uesrLastId > 0 ){
                        if( $addressId > 0 ){
                            $addressLastId = $addressService->updateAddress(
                                $userId = $userId,
                                $addressId = $addressId,
                                $address = $address,
                                $policeStation = $policeStation,
                                $cityOrTown = $cityOrTown,
                                $district = $district,
                                $pin = $pin,
                                $state = $state,
                                $country = $country,
                                $modifiedBy = $userId,
                                $mapUrl = $mapUrl
                            );
                        } else {
                            $addressLastId = $addressService->insertAddress(
                                $userId = $userId,
                                $address = $address,
                                $policeStation = $policeStation,
                                $cityOrTown = $cityOrTown,
                                $district = $district,
                                $pin = $pin,
                                $state = $state,
                                $country = $country,
                                $createdBy = $userId,
                                $mapUrl = $mapUrl
                            );
                        }
                        //$addressLastId = 0;
                        //array_push($message,"User created successfully.");
                        //return array( "status" => false, "message" => $message, "data" => $addressLastId );
                        if( $addressLastId > 0 ){


                

                            array_push($message,"User details update successfully.");

                            return array( "status" => true, "message" => $message, "data" => (object) array( "userId"=>$uesrLastId, "addressId"=>$addressLastId ) );
                        } else {
                            array_push($message,"Address details update failed.");
                        }
                    } else {
                        array_push($message,"User details update failed.");
                    }

                    return array( "status" => false, "message" => $message, "data" => '' );
                }
            }
        }
    }

    function projectRoleTypeSubmit( $postData ){
        $projectRoleId = $postData['projectRoleId'];
        $roleType = $postData['roleType'];

        $message = [];
        global $projectService;
        global $validateService;

        //Validate project role type
        if(!$validateService->validateString($roleType)){
            array_push($message,"Please enter a valid Project Role Type.");
        }

        if(count($message)){
            return array("status" => false, "message" => $message, "data" => '');
        } else {
            if( $projectRoleId > 0 ){
                $lastId = $projectService->updateProjectRole(
                    $projectRoleId = $projectRoleId,
                    $roleType = $roleType
                );
            } else {
                $lastId = $projectService->insertProjectRole( $roleType = $roleType );
            }

            if( $lastId > 0 ){
                array_push($message,"Project role type update successfully.");
                return array( "status" => true, "message" => $message );
            } else {
                array_push($message,"Project role type update failed.");
                return array( "status" => false, "message" => $message );
            }
        }
    }
    
    function projectSubmit( $postData ){
        $projectId = $postData['projectId'];
        $projectName = $postData['projectName'];
        $roleTypeId = $postData['roleTypeId'];
        $startDate = $postData['startDate'];
        $endDate = "";
        $continueProject = isset($_POST['continueProject']) ? 1 : 0;
        $technologies = $postData['technologies'];
        $tools = $postData['tools'];
        $projectDescription = $postData['myTinyMce'];
        $projectUrl = $postData['projectUrl'];

        if( !$continueProject ){
            $endDate = $postData['endDate'];
        }

        $projectId = is_numeric($projectId)? $projectId : 0;
        
        $message = [];
        global $projectService;
        global $validateService;

        //Validate User fields
        if( !$validateService->validateString($projectName) ){
            array_push($message,"Please enter a valid Project Name.");
        } elseif( !$validateService->validateStringLength( $string = $projectName, $maxLength = 100, $minLength = 1) ){
            array_push($message,"Please enter a Project Name within 100 characters.");
        }

        if( !$validateService->validateNumber($roleTypeId) || !$validateService->validateStringLength( $string = $roleTypeId, $maxLength = 10, $minLength = 1) ){
            array_push($message,"Please select a valid Project Role.");
        }

        if( $startDate == "" || !$validateService->validateDate($startDate) ){
            array_push($message,"Please enter a valid Start Date.");
        }

        if( !$continueProject && ( $endDate == "" || !$validateService->validateDate($endDate) ) ){
            array_push($message,"Please enter a valid End Date.");
        }

        if( strlen($technologies) > 0 ){
            if(!$validateService->validateString($technologies)){
                array_push($message,"Please enter a valid Technologies.");
            }

            if(!$validateService->validateStringLength( $string = $technologies, $maxLength = 250, $minLength = 1)){
                array_push($message,"Please enter a Technologies within 250 characters.");
            }
        }

        if( strlen($tools) > 0 ){
            if(!$validateService->validateString($tools)){
                array_push($message,"Please enter a valid Tools.");
            }

            if(!$validateService->validateStringLength( $string = $tools, $maxLength = 250, $minLength = 1)){
                array_push($message,"Please enter a Tools within 250 characters.");
            }
        }

        if( strlen($projectDescription) > 0 && !$validateService->validateStringLength( $string = $projectDescription, $maxLength = 2000, $minLength = 1)){
            array_push($message,"Please enter a Project Description within 2000 characters.");
        }
            
        if( strlen($projectUrl) > 0 ){
            if(!$validateService->validateUrl($projectUrl)){
                array_push($message,"Please enter a valid Project URL.");
            }

            if(!$validateService->validateStringLength( $string = $projectUrl, $maxLength = 200, $minLength = 1)){
                array_push($message,"Please enter a Project URL within 200 characters.");
            }
        }

        if(count($message)){
            return array("status" => false, "message" => $message, "data" => '');
        } else {
            if( $projectId > 0 ){
                $projectLastId = $projectService->updateProject(
                    $projectId = $projectId,
                    $projectName = $projectName,
                    $roleTypeId = $roleTypeId,
                    $startDate = $startDate,
                    $endDate = $endDate,
                    $continueProject = $continueProject,
                    $technologies = $technologies,
                    $tools = $tools,
                    $projectUrl = $projectUrl,
                    $projectDescription = htmlentities( $projectDescription, ENT_QUOTES )
                );
            } else {
                $projectLastId = $projectService->insertProject(
                    $projectName = $projectName,
                    $roleTypeId = $roleTypeId,
                    $startDate = $startDate,
                    $endDate = $endDate,
                    $continueProject = $continueProject,
                    $technologies = $technologies,
                    $tools = $tools,
                    $projectUrl = $projectUrl,
                    $projectDescription = htmlentities( $projectDescription, ENT_QUOTES )
                );
            }
    
            if( $projectLastId > 0 ){
                array_push($message,"User details update successfully.");

                return array( "status" => true, "message" => $message, "data" => '' );
            } else {
                array_push($message,"Address details update failed.");

                return array("status" => false, "message" => $message, "data" => '');
            }
        }
    }
    
    function technicalSkillSubmit( $postData ){
        $skillId = $postData['skillId'];
        $skillName = $postData['skillName'];
        $ratingScale = $postData['ratingScale'];

        $skillId = is_numeric($skillId)? $skillId : 0;
        
        $message = [];
        global $projectService;
        global $validateService;
        global $skillService;

        //Validate User fields
        if( !$validateService->validateString($skillName) ){
            array_push($message,"Please enter a valid Skill Name.");
        } elseif( !$validateService->validateStringLength( $string = $skillName, $maxLength = 50, $minLength = 1) ){
            array_push($message,"Please enter a Skill Name within 100 characters.");
        }

        if(count($message)){
            return array("status" => false, "message" => $message, "data" => '');
        } else {
            if( $skillId > 0 ){
                $skillLastId = $skillService->updateTechnicalSkill(
                    $skillId = $skillId,
                    $skillName = $skillName,
                    $ratingScale = $ratingScale
                );
            } else {
                $skillLastId = $skillService->insertTechnicalSkill(
                    $skillName = $skillName,
                    $ratingScale = $ratingScale
                );
            }
    
            if( $skillLastId > 0 ){
                array_push($message,"Skill details update successfully.");

                return array( "status" => true, "message" => $message, "data" => '' );
            } else {
                array_push($message,"Skill details update failed.");

                return array("status" => false, "message" => $message, "data" => '');
            }
        }
    }
    
    function addEditEducationSubmit( $postData ){
        $educationId = $postData['educationId'];
        $institutionName = $postData['institutionName'];
        $degreeName = $postData['degreeName'];
        $startDate = $postData['startDate'];
        $endDate = "";
        $continueDegree = isset($_POST['continueDegree']) ? 1 : 0;
        $institutionAddress = $postData['institutionAddress'];
        $degreeDetail = $postData['degreeDetail'];

        if( !$continueDegree ){
            $endDate = $postData['endDate'];
        }

        $educationId = is_numeric($educationId)? $educationId : 0;
        
        $message = [];
        $educationService = new educationService( );
        global $validateService;

        //Validate User fields
        if( !$validateService->validateString($institutionName) ){
            array_push($message,"Please enter a valid Institution Name.");
        } elseif( !$validateService->validateStringLength( $string = $institutionName, $maxLength = 100, $minLength = 1) ){
            array_push($message,"Please enter a Institution Name within 100 characters.");
        }

        if( !$validateService->validateString($degreeName) ){
            array_push($message,"Please enter a valid Degree Name.");
        } elseif( !$validateService->validateStringLength( $string = $degreeName, $maxLength = 20, $minLength = 1) ){
            array_push($message,"Please enter a Degree Name within 20 characters.");
        }

        if( $startDate == "" || !$validateService->validateDate($startDate) ){
            array_push($message,"Please enter a valid Start Date.");
        }

        if( !$continueDegree && ( $endDate == "" || !$validateService->validateDate($endDate) ) ){
            array_push($message,"Please enter a valid End Date.");
        }

        if( !$validateService->validateAddress($institutionAddress) ){
            array_push($message,"Please enter a valid Institution Address.");
        } elseif( !$validateService->validateStringLength( $string = $institutionAddress, $maxLength = 250, $minLength = 1) ){
            array_push($message,"Please enter a Institution Address within 250 characters.");
        }

        if( !$validateService->validateAddress($degreeDetail) ){
            array_push($message,"Please enter a valid Degree Detail.");
        } elseif( !$validateService->validateStringLength( $string = $degreeDetail, $maxLength = 500, $minLength = 1) ){
            array_push($message,"Please enter a Degree Detail within 500 characters.");
        }

        if(count($message)){
            return array("status" => false, "message" => $message, "data" => '');
        } else {
            if( $educationId > 0 ){
                $educationLastId = $educationService->updateEducation(
                    $educationId = $educationId,
                    $institutionName = $institutionName,
                    $degreeName = $degreeName,
                    $startDate = $startDate,
                    $endDate = $endDate,
                    $continueDegree = $continueDegree,
                    $institutionAddress = $institutionAddress,
                    $degreeDetail = $degreeDetail
                );
            } else {
                $educationLastId = $educationService->insertEducation(
                    $institutionName = $institutionName,
                    $degreeName = $degreeName,
                    $startDate = $startDate,
                    $endDate = $endDate,
                    $continueDegree = $continueDegree,
                    $institutionAddress = $institutionAddress,
                    $degreeDetail = $degreeDetail
                );
            }
    
            if( $educationLastId > 0 ){
                array_push($message,"Education details update successfully.");

                return array( "status" => true, "message" => $message, "data" => '' );
            } else {
                array_push($message,"Education details update failed.");

                return array("status" => false, "message" => $message, "data" => '');
            }
        }
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
            case "profileSubmit":
                print json_encode( profileSubmit( $_POST ) );
                break;
            case "projectRoleTypeSubmit":
                print json_encode( projectRoleTypeSubmit( $_POST ) );
                break;
            case "addEditProject":
                print json_encode( projectSubmit( $_POST ) );
                break;
            case "technicalSkillSubmit":
                print json_encode( technicalSkillSubmit( $_POST ) );
                break;
            case "addEditEducationSubmit":
                print json_encode( addEditEducationSubmit( $_POST ) );
                break;
            default:
                print json_encode([]);
          }
    } else{
        print json_encode([]);
    }

?>
