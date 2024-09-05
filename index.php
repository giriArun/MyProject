<?php
    include( $_SERVER['DOCUMENT_ROOT'] . '/myproject/model/dbConnection.php' );

	require_once $_config[ "absolute_path" ] . '/include/global.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include $_config[ "absolute_path" ] . '/include/head.php';?>
    </head>

    <body>

        <?php
            include $_config[ "absolute_path" ] . '/include/header.php';

            switch( $action ){
                case "contact":
                    include $_config[ "absolute_path" ] . '/myInfo/contact.php';
                    break;
                case "projects":
                    include $_config[ "absolute_path" ] . '/myInfo/projects.php';
                    break;
                case "resume":
                    include $_config[ "absolute_path" ] . '/myInfo/resume.php';
                    break;
                default:
                    include $_config[ "absolute_path" ] . '/myInfo/aboutMe.php';
            }
            
            include $_config[ "absolute_path" ] . '/include/footer.php';
        ?>
    
    </body>
</html>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
    })()
</script>