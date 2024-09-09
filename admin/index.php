<?php
    include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );

    require_once $_config[ "absolute_path_admin" ] . '/include/global.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_config[ "absolute_path_admin" ] . '/include/head.php';?>
    </head>

    <body class="<?=$customBodyClass;?> <?=$action;?>">

        <?php
            if( !in_array( $action, array( "login", "signup" ) ) ){
                include $_config[ "absolute_path_admin" ] . '/include/header.php';
            }

            switch( $action ){
                case "login":
                    include $_config[ "absolute_path_admin" ] . '/registration/login.php';
                    break;
                case "signup":
                    include $_config[ "absolute_path_admin" ] . '/registration/signup.php';
                    break;
                case "family":
                    include $_config[ "absolute_path_admin" ] . '/family/family.php';
                    break;
                case "addeditfamily":
                    include $_config[ "absolute_path_admin" ] . '/family/addEditFamily.php';
                    break;
                case "resume":
                    include $_config[ "absolute_path_admin" ] . '/myInfo/resume.php';
                    break;
                default:
                    include $_config[ "absolute_path_admin" ] . '/myInfo/aboutMe.php';
            }

            if( !in_array( $action, array( "login", "signup" ) ) ){
                include $_config[ "absolute_path_admin" ] . '/include/footer.php';
            }
        ?>
    
    </body>
</html>

<?php 
    if( in_array( $action, array( "login","signup","addeditfamily" ) ) ){
        include $_config[ "absolute_path_admin" ] . '/include/ajaxPopupModal.php';
    }
    
    include $_config[ "absolute_path_admin" ] . '/include/foot.php';

    
    switch( $action ){
        case "family":
            include $_config[ "absolute_path_admin" ] . '/include/deletePopupModal.php';
        default:
            // Do Nothing
    }

?>


