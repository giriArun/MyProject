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
                    user_id_fk, 
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
        
        public function checkByPasswordUserId(
            $passwordHash,
            $userId
        ){
            global $conn;

            $sql = "
                SELECT password_id,
                    isOneTime
                FROM password
                WHERE user_id_fk = $userId
                AND password_hash = '$passwordHash'
                AND isOneTime < 2
                ORDER BY password_id DESC
                LIMIT 1
            ";

            $result = mysqli_query( $conn, $sql );
            $returnArray = array( "status" => false, "newPassword" => false, "message" => array( "User authentication failed." ), "passwordId" => '0', "redirectUrl" => "" );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                $returnArray[ "newPassword" ] = ( $queryResult[ "isOneTime" ] == 1 ) ? true : false;
                $returnArray[ "redirectUrl" ] = ( $queryResult[ "isOneTime" ] == 1 ) ? "reset.php" : "";
                $returnArray[ "passwordId" ] = $queryResult[ "password_id" ];
                $returnArray[ "message" ] = array( "User login successfully." );
                $returnArray[ "status" ] = true;
            }
    
            return $returnArray;
        } 
    }


?>