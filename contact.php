<?php include 'include/global.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body>

    <?php include 'include/header.php';?>

    <section class="projects">
        <div class="container-fluid">
            <div class="row parent-box py-5">
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
                <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-8">
                    <div class="row">
                        <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                            <div class="row my-5 pb-4 pt-0">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center fs-2 fw-bold">
                                    <i class="bi bi-square-fill text-primary fs-4"></i>
                                    Let's talk
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 bg-white mt-4 mb-5 shadow">
                                    <div class="row px-5 py-3">
                                        <form class="row g-3 needs-validation" novalidate action="" method="post">
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 py-2 px-4">
                                                <label for="validationFirstName" class="form-label fw-bold">First
                                                    name</label>
                                                <input type="text" class="form-control" name="firstName"
                                                    id="validationFirstName" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the First name.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 py-2 px-4">
                                                <label for="validationLastName" class="form-label fw-bold">Last
                                                    name</label>
                                                <input type="text" class="form-control" name="lastName"
                                                    id="validationLastName" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Last name.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2 px-4">
                                                <label for="validationEmail" class="form-label fw-bold">Email</label>
                                                <input type="email" class="form-control" name="email"
                                                    id="validationEmail" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Email.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2 px-4">
                                                <label for="validationSubject"
                                                    class="form-label fw-bold">Subject</label>
                                                <input type="text" class="form-control" name="subject"
                                                    id="validationSubject" value="" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Subject.
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 py-2 px-4">
                                                <label for="validationMessage"
                                                    class="form-label fw-bold">Message</label>
                                                <textarea class="form-control" name="message" id="validationMessage"
                                                    rows="3" required></textarea>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Please provide the Message.
                                                </div>
                                            </div>
                                            <div class="col-12 py-2 px-4 mb-4">
                                                <button class="btn btn-primary fw-bold rounded-pill px-5"
                                                    type="submit">SEND</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-12 bg-white mt-4 mb-5 shadow">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 py-5 px-5">
                                            <div class="row">
                                                <div class="col-6 col-sm-5 col-md-4 col-lg-3 text-primary fw-bold fs-4 text-end">
                                                    <?=$headerFooterData[ "userFirstName" ];?>
                                                </div>
                                                <div class="col-6 col-sm-7 col-md-8 col-lg-9 text-primary fw-bold fs-4">
                                                    <?=$headerFooterData[ "userLastName" ];?>
                                                    <?php
                                                        if( strlen( trim( $addressData[ "mapUrl" ] ) ) > 0 ){
                                                            ?>
                                                                <a href="<?=$addressData[ "mapUrl" ];?>" class="ms-4" target="_blank"><i class="bi bi-geo-fill"></i></i></a>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-12 py-3"></div>
                                                <?php
                                                    if( strlen( trim( $addressData[ "address" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                Address:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "address" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                    if( strlen( trim( $addressData[ "policeStation" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                P.S:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "policeStation" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                    if( strlen( trim( $addressData[ "cityTown" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                City/Town:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "cityTown" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                    if( strlen( trim( $addressData[ "district" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                Dist:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "district" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                    if( strlen( trim( $addressData[ "pin" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                PIN:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "pin" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                    if( strlen( trim( $addressData[ "state" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                State:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "state" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                    if( strlen( trim( $addressData[ "country" ] ) ) > 0 ){
                                                        ?>
                                                            <div class="col-6 col-sm-5 col-md-4 col-lg-3 fw-bold fs-6 text-end">
                                                                Country:
                                                            </div>
                                                            <div class="col-6 col-sm-7 col-md-8 col-lg-9 fs-6">
                                                                <?=$addressData[ "country" ];?>
                                                            </div>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 px-0">
                                            <img src="asset/images/uploadImages/<?=$addressData[ "mapImage" ];?>"
                                                class="img-fluid height-webkit-fill-available"
                                                alt="map image"
                                                onerror="this.onerror=null; this.src='asset/images/icon/location-map-icon.png'">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                    </div>
                </div>
                <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>

            </div>
        </div>
    </section>

    <?php include 'include/footer.php';?>
    
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