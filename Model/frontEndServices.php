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
    }
?>