<?php
    class familyService{
        public function getFamily( $familyId = 0 ){
            global $conn;
            
            $sql = "
                SELECT id,
                    name,
                    nickname,
                    gender,
                    DOB,
                    DOD,
                    parent_id,
                    spouse_id,
                    sequence,
                    isRoot
                FROM family
            ";

            if( $familyId > 0 ){
                $sql .= " WHERE id = $familyId ";
            }

            $sql .= " ORDER BY name ASC ";

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
                            "familyId" => $queryResult[ "id" ],
                            "name" => $queryResult[ "name" ],
                            "nickname" => $queryResult[ "nickname" ],
                            "gender" => $queryResult[ "gender" ],
                            "dob" => $queryResult[ "DOB" ],
                            "dod" => $queryResult[ "DOD" ],
                            "parentId" => $queryResult[ "parent_id" ],
                            "spouseId" => $queryResult[ "spouse_id" ],
                            "sequence" => $queryResult[ "sequence" ],
                            "isRoot" => $queryResult[ "isRoot" ]
                        )
                    );
                }
            }

            return $returnArray;
        }
        /* public function insertEducation( 
            $institutionName,
            $degreeName,
            $startDate,
            $endDate,
            $continueDegree,
            $institutionAddress,
            $degreeDetail
        ){
            global $conn;
            $createdBy = $_SESSION[ "userId" ];
            $endDateFiled = "";
            $endDateValue = "";

            if( !$continueDegree ){
                $endDateFiled = "end_date,";
                $endDateValue = "'$endDate',";
            }

            $sql = "
                INSERT INTO educations (
                    user_id_fk,
                    institution_name,
                    degree_name,
                    start_date,
                    $endDateFiled
                    isContinue,
                    institution_address,
                    degree_detail,
                    created_by
                ) VALUES (
                    $createdBy,
                    '$institutionName',
                    '$degreeName',
                    '$startDate',
                    $endDateValue
                    $continueDegree,
                    '$institutionAddress',
                    '$degreeDetail',
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

        public function updateEducation(
            $educationId,
            $institutionName,
            $degreeName,
            $startDate,
            $endDate,
            $continueDegree,
            $institutionAddress,
            $degreeDetail
        ){
            global $conn;
            $modifiedBy = $_SESSION[ "userId" ];
            $endDateFiled = "";

            if( !$continueDegree ){
                $endDateFiled = "end_date = '$endDate',";
            }

            $sql = "
                UPDATE educations 
                SET institution_name = '$institutionName',
                    degree_name = '$degreeName',
                    start_date = '$startDate',
                    $endDateFiled
                    isContinue = $continueDegree,
                    institution_address = '$institutionAddress',
                    degree_detail = '$degreeDetail',
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE education_id = $educationId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $educationId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function deleteEducation( $educationId ){
            global $conn;

            $sql = "
                DELETE 
                FROM educations 
                WHERE education_id = $educationId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $educationId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 
 */
    }
?>