<?php
    // Config File
    $_config = include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/private/config.php' );

    $servername = $_config[ "host" ];
    $username = $_config[ "user_name" ];
    $password = $_config[ "password" ];
    $dbname = $_config[ "database_name" ];

    // Create connection
    $conn = mysqli_connect( $servername, $username, $password, $dbname );

    // Check connection
    if ( !$conn ) {
        die( "Connection failed: " . mysqli_connect_error( ) );
    }
    //echo "Connected successfully";
?>