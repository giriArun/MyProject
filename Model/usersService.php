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
                    user_first_name, 
                    user_last_name, 
                    user_email,
                    user_phone,
                    user_terms,
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

            $profileImage = 'profile_' . $userId . '.png';

            $sql = "
                UPDATE users 
                SET user_first_name = '$firstName',
                    user_last_name = '$lastName',
                    user_email = '$email',
                    user_phone = '$phone',
                    user_photo = '$profileImage',
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE user_id = $userId
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
                SELECT user_first_name,
                    user_last_name,
                    user_email,
                    user_phone,
                    user_photo,
                    isAdmin
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
                $returnArray[ "isAdmin" ] = $queryResult[ "isAdmin" ];
                $returnArray[ "status" ] = true;
                $returnArray[ "userId" ] = $userId;
            }

            return $returnArray;
        } 

        public function getUserIdByEmailOrPhone( $emailPhone ){
            global $conn;
            
            $sql = "
                SELECT user_id
                FROM users
                WHERE isActive = 1
                AND (
                    user_email = '$emailPhone'
                    OR user_phone = '$emailPhone'
                )
                ORDER BY user_id DESC
                LIMIT 1
            ";

            $result = mysqli_query( $conn, $sql );

            if ( mysqli_num_rows( $result ) > 0 ){
                return mysqli_fetch_assoc( $result )[ "user_id" ];
            } else {
                return 0;
            }
        }

        public function isEmailExist( $email, $userId = 0 ){
            global $conn;

            $sql = "
                SELECT user_email
                FROM users
                WHERE user_email = '$email'
            ";

            if( $userId > 0 ){
                $sql .= " AND user_id != $userId ";
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
                SELECT user_phone
                FROM users
                WHERE user_phone = '$phone'
            ";

            if( $userId > 0 ){
                $sql .= " AND user_id != $userId ";
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
                SELECT user_id
                FROM users
                WHERE user_id = $userId
            ";

            $result = mysqli_query( $conn, $sql );

            if( mysqli_num_rows( $result ) > 0 ){
                return true;
            } else {
                return false;
            }
        } 

        public function getDefaultUserId( ){
            global $conn;
            
            $sql = "
                SELECT user_id
                FROM users
                WHERE isAdmin = 1
                AND isActive = 1
                LIMIT 1
            ";
            
            $result = mysqli_query( $conn, $sql );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                return $queryResult[ "user_id" ];
            } else {
                return 0;
            }
        }  

        public function getUserAdmin( $userId ){
            global $conn;

            $sql = "
                SELECT isAdmin
                FROM users
                WHERE user_id = $userId
            ";

            $result = mysqli_query( $conn, $sql );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                return $queryResult[ "isAdmin" ];
            } else {
                return 0;
            }
        } 
    }
?>