<?php
    // Get File path & name
    $filePath = $_SERVER[ 'PHP_SELF' ];
    $fileNameArray = explode( "/", $filePath );
    $fileName = end( $fileNameArray );

    switch ( strtolower( $fileName ) ) {
        case 'signup.php':
            $pageTitle = 'SignUp';
            break;
        case 'label2':
            $pageTitle = 'SignUp';
            break;
        case 'label3':
            $pageTitle = 'SignUp';
            break;
        default:
            $pageTitle = 'Home';
      }

   /*  print_r($pageTitle);
    print_r($_SERVER);

    $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);

print_r( $pieces ); */
?>