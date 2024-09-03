<?php
    class frontEndServices{

        public function getHeaderFooterData( $userId ){
            global $conn;
            
            $sql = "
                SELECT user_first_name,
                    user_last_name,
                    user_email,
                    user_phone,
                    user_photo
                FROM users
                WHERE user_id = $userId
            ";

            $result = mysqli_query( $conn, $sql );

            $returnArray = array( 
                "status" => false, 
                "userFirstName" => "", 
                "userLastName" => "", 
                "userEmail" => '', 
                "userPhone" => "",
                "isAdmin" => 0 
            );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                $returnArray[ "userFirstName" ] = $queryResult[ "user_first_name" ];
                $returnArray[ "userLastName" ] = $queryResult[ "user_last_name" ];
                $returnArray[ "userEmail" ] = $queryResult[ "user_email" ];
                $returnArray[ "userPhone" ] = $queryResult[ "user_phone" ];
                $returnArray[ "userPhoto" ] = $queryResult[ "user_photo" ];
            }

            return $returnArray;
        } 

        public function getUserAddressDetails( $userId ){
            global $conn;
            
            $sql = "
                SELECT address,
                    police_station,
                    city_town,
                    district,
                    pin,
                    state,
                    country,
                    map_url,
                    map_image
                FROM address
                WHERE user_id_fk = $userId
            ";

            $result = mysqli_query( $conn, $sql );

            
            $returnArray = array( 
                "address" => "", 
                "policeStation" => "", 
                "cityTown" => "", 
                "district" => '', 
                "pin" => "",
                "state" => "",
                "country" => "",
                "mapUrl" => "",
                "mapImage" => ""
            );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                $returnArray[ "address" ] = $queryResult[ "address" ];
                $returnArray[ "policeStation" ] = $queryResult[ "police_station" ];
                $returnArray[ "cityTown" ] = $queryResult[ "city_town" ];
                $returnArray[ "district" ] = $queryResult[ "district" ];
                $returnArray[ "pin" ] = $queryResult[ "pin" ];
                $returnArray[ "state" ] = $queryResult[ "state" ];
                $returnArray[ "country" ] = $queryResult[ "country" ];
                $returnArray[ "mapUrl" ] = $queryResult[ "map_url" ];
                $returnArray[ "mapImage" ] = $queryResult[ "map_image" ];
            }

            return $returnArray;
        }

        // Project Page Start
        public function getProjects( $userId ){
            global $conn;

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
                ORDER BY p.isContinue DESC,
                    p.start_date DESC,
                    p.end_date DESC
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
        // Project Page End

        // Resume Page Start

        // Education section start
        public function getEducations( $userId ){
            global $conn;
            
            $sql = "
                SELECT institution_name,
                    degree_name,
                    start_date,
                    end_date,
                    isContinue,
                    institution_address,
                    degree_detail
                FROM educations
                WHERE user_id_fk = $userId
                ORDER BY start_date DESC
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
                            "institutionName" => $queryResult[ "institution_name" ],
                            "degreeName" => $queryResult[ "degree_name" ],
                            "startDate" => $queryResult[ "start_date" ],
                            "endDate" => $queryResult[ "end_date" ],
                            "isContinue" => $queryResult[ "isContinue" ],
                            "institutionAddress" => $queryResult[ "institution_address" ],
                            "degreeDetail" => $queryResult[ "degree_detail" ],
                        )
                    );
                }
            }

            return $returnArray;
        }
        // Education section end

        // skill section start
        public function getTechnicalsSkill( $userId ){
            global $conn;
            
            $sql = "
                SELECT technical_skill_id,
                    skill_name,
                    rating_scale
                FROM technical_skills
                WHERE user_id_fk = $userId
                ORDER BY rating_scale DESC
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
                            "technicalSkillId" => $queryResult[ "technical_skill_id" ],
                            "skillName" => $queryResult[ "skill_name" ],
                            "ratingScale" => $queryResult[ "rating_scale" ]
                        )
                    );
                }
            }

            return $returnArray;
        }
        // skill section end

        // Resume Page End
    }
?>