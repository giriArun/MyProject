<?php
    class usersService{
        public function insertUser(
            $firstName,
            $lastName,
            $email,
            $phone,
            $termAndCondition,
            $createdBy = 0
        ){
            global $conn;

            $sql = "
                INSERT INTO users (
                    users_first_name, 
                    users_last_name, 
                    users_email,
                    users_phone,
                    users_terms,
                    created_by
                ) VALUES (
                    '$firstName', 
                    '$lastName', 
                    '$email',
                    '$phone',
                    $termAndCondition,
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

        public function updateUser(
            $userId,
            $firstName,
            $lastName,
            $email,
            $phone,
            $modifiedBy = 0
        ){
            global $conn;

            $sql = "
                UPDATE users 
                SET users_first_name = '$firstName',
                    users_last_name = '$lastName',
                    users_email = '$email',
                    users_phone = '$phone',
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE users_id = $userId
            ";

            if (mysqli_query($conn, $sql)) {
                $last_id = $userId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

        public function getUserByUserId( $userId ){
            global $conn;
            
            $sql = "
                SELECT users_first_name,
                    users_last_name,
                    users_email,
                    users_phone,
                    users_photo,
                    isAdmin
                FROM users
                WHERE users_id = $userId
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

                $returnArray[ "userFirstName" ] = $queryResult[ "users_first_name" ];
                $returnArray[ "userLastName" ] = $queryResult[ "users_last_name" ];
                $returnArray[ "userEmail" ] = $queryResult[ "users_email" ];
                $returnArray[ "userPhone" ] = $queryResult[ "users_phone" ];
                $returnArray[ "userPhoto" ] = $queryResult[ "users_photo" ];
                $returnArray[ "isAdmin" ] = $queryResult[ "isAdmin" ];
                $returnArray[ "status" ] = true;
                $returnArray[ "userId" ] = $userId;
            }

            return $returnArray;
        } 

        public function getUserIdByEmailOrPhone( $emailPhone ){
            global $conn;
            
            $sql = "
                SELECT users_id
                FROM users
                WHERE isActive = 1
                AND (
                    users_email = '$emailPhone'
                    OR users_phone = '$emailPhone'
                )
                ORDER BY users_id DESC
                LIMIT 1
            ";

            $result = mysqli_query( $conn, $sql );

            if ( mysqli_num_rows( $result ) > 0 ){
                return mysqli_fetch_assoc( $result )[ "users_id" ];
            } else {
                return 0;
            }
        }

        public function isEmailExist( $email, $userId = 0 ){
            global $conn;

            $sql = "
                SELECT users_email
                FROM users
                WHERE users_email = '$email'
            ";

            if( $userId > 0 ){
                $sql .= " AND users_id != $userId ";
            }

            $result = mysqli_query( $conn, $sql );
            
            if( mysqli_num_rows( $result ) > 0 ){
                return true;
            } else {
                return false;
            }
        } 

        public function isPhoneExist( $phone, $userId = 0  ){
            global $conn;

            $sql = "
                SELECT users_phone
                FROM users
                WHERE users_phone = '$phone'
            ";

            if( $userId > 0 ){
                $sql .= " AND users_id != $userId ";
            }

            $result = mysqli_query( $conn, $sql );

            if( mysqli_num_rows( $result ) > 0 ){
                return true;
            } else {
                return false;
            }
        }  

        public function isUserExist( $userId ){
            global $conn;

            $sql = "
                SELECT users_id
                FROM users
                WHERE users_id = $userId
            ";

            $result = mysqli_query( $conn, $sql );

            if( mysqli_num_rows( $result ) > 0 ){
                return true;
            } else {
                return false;
            }
        } 
    }
?>