<?php   //hint: This service file for Technical skills, Awards/Certifications, Languages
    class skillService{
        public function insertTechnicalSkill( $skillName, $ratingScale ){
            global $conn;
            $createdBy = $_SESSION[ "userId" ];

            $sql = "
                INSERT INTO technical_skills (
                    user_id_fk,
                    skill_name,
                    rating_scale,
                    created_by
                ) VALUES (
                    $createdBy,
                    '$skillName',
                    $ratingScale,
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

        public function updateTechnicalSkill(
            $skillId,
            $skillName,
            $ratingScale
        ){
            global $conn;
            $modifiedBy = $_SESSION[ "userId" ];

            $sql = "
                UPDATE technical_skills 
                SET skill_name = '$skillName',
                    rating_scale = $ratingScale,
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE technical_skill_id = $skillId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $skillId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function deleteTechnicalSkill( $skillId ){
            global $conn;

            $sql = "
                DELETE 
                FROM technical_skills 
                WHERE technical_skill_id = $skillId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $skillId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function getTechnicalSkill( $skillId = 0 ){
            global $conn;
            $userId = $_SESSION[ "userId" ];
            
            $sql = "
                SELECT technical_skill_id,
                    skill_name,
                    rating_scale
                FROM technical_skills
            ";

            if( $skillId > 0 ){
                $sql .= "
                    WHERE technical_skill_id = $skillId
                    AND user_id_fk = $userId
                ";
            }

            $sql .= "
                ORDER BY skill_name
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
    }
?>