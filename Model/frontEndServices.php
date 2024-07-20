<?php
    class frontEndServices{

        public function getHeaderFooterData( $userId ){
            global $conn;
            
            $sql = "
                SELECT users_first_name,
                    users_last_name,
                    users_email,
                    users_phone,
                    users_photo
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
                WHERE users_id_fk = $userId
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

        public function getDefaultUserId( ){
            global $conn;
            
            $sql = "
                SELECT users_id
                FROM users
                WHERE isAdmin = 1
                AND isActive = 1
                LIMIT 1
            ";
            
            $result = mysqli_query( $conn, $sql );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                return $queryResult[ "users_id" ];
            } else {
                return 0;
            }
        } 
    }
?>