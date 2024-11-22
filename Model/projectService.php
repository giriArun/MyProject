<?php
    class projectService{
        public function insertProjectRole( $roleType ){
            global $conn;
            $createdBy = $_SESSION[ "userId" ];

            $sql = "
                INSERT INTO project_roles (
                    project_role_type,
                    created_by
                ) VALUES (
                    '$roleType',
                    $createdBy
                )
            ";
    
            if ( mysqli_query( $conn, $sql ) ) {
                $last_id = mysqli_insert_id( $conn );
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function updateProjectRole(
            $projectRoleId,
            $roleType
        ){
            global $conn;
            $modifiedBy = $_SESSION[ "userId" ];

            $sql = "
                UPDATE project_roles 
                SET project_role_type = '$roleType',
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE project_role_id = $projectRoleId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $projectRoleId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function deleteProjectRole( $projectRoleId ){
            global $conn;

            $sql = "
                DELETE 
                FROM project_roles 
                WHERE project_role_id = $projectRoleId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $projectRoleId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function getProjectRoleType( $projectRoleId = 0 ){
            global $conn;
            
            $sql = "
                SELECT project_role_id,
                    project_role_type
                FROM project_roles
            ";

            if( $projectRoleId > 0 ){
                $sql .= "
                    WHERE project_role_id = $projectRoleId
                ";
            }

            $sql .= "
                ORDER BY project_role_type
            ";

            $result = mysqli_query( $conn, $sql );

            $returnArray = array( 
                "status" => false, 
                "data" => []
            );

            if( mysqli_num_rows( $result ) > 0 ){
                $returnArray[ "status" ] = true;
                while( $queryResult = mysqli_fetch_assoc( $result ) ) {
                    array_push(
                        $returnArray[ "data" ], 
                        array( 
                            "projectroleId" => $queryResult[ "project_role_id" ],
                            "projectRoleType" => $queryResult[ "project_role_type" ]
                        )
                    );
                }
            }

            return $returnArray;
        } 

        public function insertProject(
            $projectName,
            $roleTypeId,
            $startDate,
            $endDate,
            $continueProject,
            $technologies,
            $tools,
            $projectUrl,
            $projectDescription
        ){
            global $conn;
            $createdBy = $_SESSION[ "userId" ];
            $endDateFiled = "";
            $endDateValue = "";

            if( !$continueProject ){
                $endDateFiled = "end_date,";
                $endDateValue = "'$endDate',";
            }

            $sql = "
                INSERT INTO projects (
                    user_id_fk,
                    project_name,
                    project_site_url,
                    project_role_id_fk,
                    start_date,
                    $endDateFiled
                    isContinue,
                    project_technologies,
                    project_tools,
                    project_description,
                    created_by
                ) VALUES (
                    $createdBy,
                    '$projectName',
                    '$projectUrl',
                    $roleTypeId,
                    '$startDate',
                    $endDateValue
                    $continueProject,
                    '$technologies',
                    '$tools',
                    '$projectDescription',
                    $createdBy
                )
            ";
            
            if ( mysqli_query( $conn, $sql ) ) {
                $last_id = mysqli_insert_id( $conn );
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function updateProject(
            $projectId,
            $projectName,
            $roleTypeId,
            $startDate,
            $endDate,
            $continueProject,
            $technologies,
            $tools,
            $projectUrl,
            $projectDescription
        ){
            global $conn;
            $modifiedBy = $_SESSION[ "userId" ];
            $projectImage = 'project_' . $projectId . '.png';
            $endDateFiled = "";

            if( !$continueProject ){
                $endDateFiled = "end_date = '$endDate',";
            }

            $sql = "
                UPDATE projects
                SET project_name = '$projectName',
                    project_site_url = '$projectUrl',
                    project_role_id_fk = $roleTypeId,
                    start_date = '$startDate',
                    $endDateFiled
                    isContinue = $continueProject,
                    project_technologies = '$technologies',
                    project_tools = '$tools',
                    project_description = '$projectDescription',
                    project_image = '$projectImage',
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE project_id = $projectId
                AND user_id_fk = $modifiedBy
            ";
            
            if (mysqli_query($conn, $sql)) {
                $last_id = $projectId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function getProjects( 
            $userId = 0, 
            $projectId = 0
        ){
            global $conn;

            $userId = $userId > 0 ? $userId : $_SESSION[ "userId" ];

            $sql = "
                SELECT p.project_id, 
                    p.project_name, 
                    p.user_id_fk, 
                    p.project_site_url, 
                    p.start_date, 
                    p.end_date, 
                    p.isContinue, 
                    p.project_technologies, 
                    p.project_tools, 
                    p.project_description, 
                    p.project_image, 
                    pr.project_role_id, 
                    pr.project_role_type
                FROM projects AS p
                LEFT JOIN project_roles AS pr ON pr.project_role_id = p.project_role_id_fk
                WHERE p.user_id_fk = $userId
            ";

            if( $projectId > 0 ){
                $sql .= "
                    AND p.project_id = $projectId
                ";
            }

            $result = mysqli_query( $conn, $sql );

            $returnArray = array( 
                "status" => false, 
                "data" => []
            );

            if( mysqli_num_rows( $result ) > 0 ){
                $returnArray[ "status" ] = true;
                while( $queryResult = mysqli_fetch_assoc( $result ) ) {
                    array_push(
                        $returnArray[ "data" ], 
                        array( 
                            "projectId" => $queryResult[ "project_id" ],
                            "projectName" => $queryResult[ "project_name" ],
                            "userId" => $queryResult[ "user_id_fk" ],
                            "projectSiteUrl" => $queryResult[ "project_site_url" ],
                            "startDate" => $queryResult[ "start_date" ],
                            "endDate" => $queryResult[ "end_date" ],
                            "isContinue" => $queryResult[ "isContinue" ],
                            "projectTechnologies" => $queryResult[ "project_technologies" ],
                            "projectTools" => $queryResult[ "project_tools" ],
                            "projectDescription" => $queryResult[ "project_description" ],
                            "projectImage" => $queryResult[ "project_image" ],
                            "projectRoleId" => $queryResult[ "project_role_id" ],
                            "projectRoleType" => $queryResult[ "project_role_type" ]
                        )
                    );
                }
            }

            return $returnArray;
        }

        public function deleteProject( $projectId ){
            global $conn;

            $sql = "
                DELETE 
                FROM projects 
                WHERE project_id = $projectId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $projectId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 
    }
?>