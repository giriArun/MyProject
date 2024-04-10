<?php
    class usersService{
        public function insertUser(
            $conn,
            $firstName,
            $lastName,
            $email,
            $phone,
            $termAndCondition,
            $createdBy = 0
        ){
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

        public function isEmailExist(
            $conn,
            $email
        ){
            $sql = "
                SELECT users_email
                FROM users
                WHERE users_email = '$email'
            ";

            $result = mysqli_query( $conn, $sql );
            
            if( mysqli_num_rows( $result ) > 0 ){
                return true;
            } else {
                return false;
            }
        } 

        public function isPhoneExist(
            $conn,
            $phone
        ){
            $sql = "
                SELECT users_phone
                FROM users
                WHERE users_phone = '$phone'
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