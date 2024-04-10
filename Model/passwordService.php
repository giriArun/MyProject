<?php
    class passwordService{
        public function insertPassword(
            $conn,
            $passwordHash,
            $userId,
            $isOneTime = 0,
            $createdBy
        ){
            $sql = "
                INSERT INTO password (
                    users_id_fk, 
                    password_hash, 
                    isOneTime,
                    created_by
                ) VALUES (
                    $userId, 
                    '$passwordHash', 
                    $isOneTime,
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
    }


?>