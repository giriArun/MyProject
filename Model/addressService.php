<?php
    class addressService{
        public function getAddressById( $userId = 0, $addressId = 0 ){
            global $conn;
            
            $sql = "
                SELECT address_id,
                    users_id_fk,
                    address,
                    police_station,
                    city_town,
                    district,
                    pin,
                    state,
                    country,
                    map_url,
                    map_image
                FROM address
            ";

            if( $userId > 0 ){
                $sql .= " WHERE users_id_fk = $userId ";
            } else if( $addressId > 0 ){
                $sql .= " WHERE users_id_fk = $addressId ";
            }

            $result = mysqli_query( $conn, $sql );

            $returnArray = array( 
                "status" => false,
                "addressId" => 0,
                "usersId" => 0,
                "address" => "",
                "policeStation" => "",
                "cityOrTown" => "",
                "district" => "",
                "pin" => "",
                "state" => "",
                "country" => "",
                "mapUrl" => "",
                "mapImage" => ""
            );

            if( mysqli_num_rows( $result ) > 0 ){
                $queryResult = mysqli_fetch_assoc( $result );

                $returnArray = array(
                    "status" => true,
                    "addressId" => $queryResult[ "address_id" ],
                    "usersId" => $queryResult[ "users_id_fk" ],
                    "address" => $queryResult[ "address" ],
                    "policeStation" => $queryResult[ "police_station" ],
                    "cityOrTown" => $queryResult[ "city_town" ],
                    "district" => $queryResult[ "district" ],
                    "pin" => $queryResult[ "pin" ],
                    "state" => $queryResult[ "state" ],
                    "country" => $queryResult[ "country" ],
                    "mapUrl" => $queryResult[ "map_url" ],
                    "mapImage" => $queryResult[ "map_image" ]
                );
            }

            return $returnArray;
        } 

        public function insertAddress(
            $userId,
            $address,
            $policeStation,
            $cityOrTown,
            $district,
            $pin,
            $state,
            $country,
            $createdBy = 0,
            $mapUrl
        ){
            global $conn;

            $pin = strlen( $pin ) == 0 ? 'NULL' : $pin;
            $mapImage = 'map_' . $userId . '.png';
            
            $sql = "
                INSERT INTO address (
                    users_id_fk,
                    address, 
                    police_station, 
                    city_town,
                    district,
                    pin,
                    state,
                    country,
                    map_url,
                    map_image,
                    created_by
                ) VALUES (
                    $userId,
                    '$address', 
                    '$policeStation', 
                    '$cityOrTown', 
                    '$district', 
                    $pin,
                    '$state', 
                    '$country',
                    '$mapUrl',
                    '$mapImage',
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
        
        public function updateAddress(
            $userId,
            $addressId,
            $address,
            $policeStation,
            $cityOrTown,
            $district,
            $pin,
            $state,
            $country,
            $modifiedBy = 0,
            $mapUrl
        ){
            global $conn;

            $pin = strlen( $pin ) == 0 ? 'NULL' : $pin;
            $mapImage = 'map_' . $userId . '.png';

            $sql = "
                UPDATE address 
                SET address = '$address',
                    police_station = '$policeStation',
                    city_town = '$cityOrTown',
                    district = '$district',
                    pin = $pin,
                    state = '$state',
                    country = '$country',
                    map_url = '$mapUrl',
                    map_image = '$mapImage',
                    modified_on = now(),
                    modified_by = $modifiedBy
                WHERE users_id_fk = $userId
                AND address_id = $addressId
            ";
            
            if (mysqli_query($conn, $sql)) {
                $last_id = $addressId;
            } else {
                $last_id = 0;
            }
    
            return $last_id;
        } 

    }
?>