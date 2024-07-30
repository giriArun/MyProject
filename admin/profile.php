<?php include 'include/global.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'include/head.php';?>
</head>

<body class="<?=$parentClass;?>">
    <?php include 'include/header.php';?>


    <section class="mt-5 pt-2">
        <div class="container-fluid">
            <div class="row background-color-bone">
                <div class="col-1"></div>
                <div class="col-10 my-5">
                    <div class="fs-2 text-center mb-5 mt-3 text-primary">Profile</div>
                    <div class="row">
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-12 col-sm-10 col-md-10 col-lg-10 bg-white shadow py-5 px-5">
                            <div class="row">
                                <?php
                                    if( !$userData[ "status" ] ){
                                        echo "error message!";
                                    } else {
                                        ?>
                                        <form class="row g-3 needs-validation" name="form_profileEdit" id="form_profileEdit" method="post" novalidate>
                                            <input type="hidden" name="userId" class="userId" id="validationUserId" value="<?=$userData[ "userId" ];?>">
                                            <input type="hidden" name="addressId" class="addressId" id="validationAddressId" value="<?=$addressData[ "addressId" ];?>">

                                            <div class="col-12 text-end profileEditButton">
                                                <i class="bi bi-pencil-square cursor-pointer text-danger editButton"></i>
                                                <i class="cursor-pointer text-secondary viewButton d-none">Edit...</i>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationFirstName">
                                                <label for="validationFirstName" class="form-label text-secondary">First name<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$userData[ "userFirstName" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="firstName" class="form-control" id="validationFirstName" maxlength="20" data-type="singleName" data-name="First Name" value="<?=$userData[ "userFirstName" ];?>" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the First name.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationLastName">
                                                <label for="validationLastName" class="form-label text-secondary">Last name<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$userData[ "userLastName" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="lastName" class="form-control" id="validationLastName" maxlength="20" data-type="singleName" data-name="Last Name" value="<?=$userData[ "userLastName" ];?>" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Last name.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationEmail">
                                                <label for="validationEmail" class="form-label text-secondary">Email<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$userData[ "userEmail" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="email" class="form-control" id="validationEmail" maxlength="50" data-type="email" data-name="Email" value="<?=$userData[ "userEmail" ];?>" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Email.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationPhone">
                                                <label for="validationPhone" class="form-label text-secondary">Phone<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$userData[ "userPhone" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="phone" class="form-control" id="validationPhone" minlength="10" maxlength="10" data-type="phone" data-name="Phone Number" value="<?=$userData[ "userPhone" ];?>" required>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Phone number.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12"><hr></div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationAddress">
                                                <label for="validationAddress" class="form-label text-secondary">Address<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "address" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="address" class="form-control" id="validationAddress" maxlength="100" data-type="address" data-name="Address" value="<?=$addressData[ "address" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Address.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationPoliceStation">
                                                <label for="validationPoliceStation" class="form-label text-secondary">Police Station<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "policeStation" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="policeStation" class="form-control" id="validationPoliceStation" maxlength="50" data-type="place" data-name="Police Station" value="<?=$addressData[ "policeStation" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Police Station.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationCityOrTown">
                                                <label for="validationCityOrTown" class="form-label text-secondary">City/Town<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "cityOrTown" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="cityOrTown" class="form-control" id="validationCityOrTown" maxlength="50" data-type="place" data-name="City/Town" value="<?=$addressData[ "cityOrTown" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the City/Town.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationDistrict">
                                                <label for="validationDistrict" class="form-label text-secondary">District<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "district" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="district" class="form-control" id="validationDistrict" maxlength="50" data-type="place" data-name="District" value="<?=$addressData[ "district" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the District.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationPin">
                                                <label for="validationPin" class="form-label text-secondary">PIN<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "pin" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="pin" class="form-control" id="validationPin" minlength="6" maxlength="6" data-type="phone" data-name="PIN" value="<?=$addressData[ "pin" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the PIN.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationState">
                                                <label for="validationState" class="form-label text-secondary">State<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "state" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="state" class="form-control" id="validationState" maxlength="50" data-type="place" data-name="State" value="<?=$addressData[ "state" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the State.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationCountry">
                                                <label for="validationCountry" class="form-label text-secondary">Country<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=$addressData[ "country" ];?></label>
                                                <div class="formField d-none">
                                                    <input type="text" name="country" class="form-control" id="validationCountry" maxlength="30" data-type="place" data-name="Country" value="<?=$addressData[ "country" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Country.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12"><hr></div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xxl-12 validationMapUrl">
                                                <label for="validationMapUrl" class="form-label text-secondary">Map URL<span class="formLabel">:</span></label>
                                                <label class="formLabel fs-5 text-primary"><?=substr( $addressData[ "mapUrl" ], 0, 30 );?>...</label>
                                                <div class="formField d-none">
                                                    <input type="url" name="mapUrl" class="form-control" id="validationMapUrl" maxlength="3000" data-type="url" data-name="Map URL" value="<?=$addressData[ "mapUrl" ];?>">
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Please provide the Map URL.</div>
                                                    <div class="invalid-js-message"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationProfileImage">
                                                <label for="validationProfileImage" class="form-label text-secondary">Profile Image</label>
                                                <div class="image_area">
                                                    <?php
                                                        $imageCount = 1;
                                                        $imageName = "profile";
                                                        $imageId = $userData[ "userId" ];
                                                    ?>
                                                    <label for="uploadImage<?=$imageCount?>">
                                                        <img src="../asset/images/uploadImages/<?=$userData[ "userPhoto" ];?>" 
                                                            id="uploadedImage<?=$imageCount?>" 
                                                            class="img-responsive img-circle" 
                                                            onerror="this.onerror=null; this.src='../asset/images/icon/profile_icon.png'"/>
                                                        <div class="overlay">
                                                            <div class="text">Click to Change Profile Image</div>
                                                        </div>
                                                        <input type="file" 
                                                            name="file_<?=$imageName?>" 
                                                            class="image" 
                                                            id="uploadImage<?=$imageCount?>" 
                                                            data-image-count = <?=$imageCount?>
                                                            data-image-name = <?=$imageName?>
                                                            data-image-id = <?=$imageId?>
                                                            style="display:none" />
                                                    </label>
                                                </div>
                                                <div class="valid-feedback" id="uploadedImageText<?=$imageCount?>">Looks good!</div>
                                            </div>
                                            <div class="col-0 col-sm-0 col-md-2 col-lg-2 col-xxl-4">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xxl-4 validationMapImage">
                                                <label for="validationMapImage" class="form-label text-secondary">Map Image</label>
                                                <div class="image_area">
                                                    <?php
                                                        $imageCount = 2;
                                                        $imageName = "map";
                                                        $imageId = $userData[ "userId" ];
                                                    ?>
                                                    <label for="uploadImage<?=$imageCount?>">
                                                        <img src="../asset/images/uploadImages/<?=$addressData[ "mapImage" ];?>" 
                                                            id="uploadedImage<?=$imageCount?>" 
                                                            class="img-responsive img-circle" 
                                                            onerror="this.onerror=null; this.src='../asset/images/icon/map-pin.png'"/>
                                                        <div class="overlay">
                                                            <div class="text">Click to Change Map Image</div>
                                                        </div>
                                                        <input type="file" 
                                                            name="file_<?=$imageName?>" 
                                                            class="image" 
                                                            id="uploadImage<?=$imageCount?>" 
                                                            data-image-count = <?=$imageCount?>
                                                            data-image-name = <?=$imageName?>
                                                            data-image-id = <?=$imageId?>
                                                            style="display:none" />
                                                    </label>
                                                </div>
                                                <div class="valid-feedback" id="uploadedImageText<?=$imageCount?>">Looks good!</div>
                                            </div>
                                           
                                            <div class="col-12"><hr></div>
                                            
                                            <div class="col-12">
                                                <button class="btn btn-primary" id="sub" type="submit">Submit form</button>
                                            </div>
                                        </form>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-0 col-sm-1 col-md-1 col-lg-1"></div>
                    </div>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </section>


    <?php
        print_r( $_SESSION );
    ?>
    <!-- <section class="about-me">
        <div class="container-fluid">
            <div class="row position-relative">
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 parent-box-left"></div>
                <div class="col-7 col-sm-7 col-md-7 col-lg-7 parent-box-right"></div>
                <div class="position-absolute top-0 start-0 col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row my-5">
                        <div class="col-1 col-sm-1 col-md-1 col-lg-1 col-xl-2"></div>
                        <div class="col-10 col-sm-10 col-md-10 col-lg-10 col-xl-8">
                            <div class="row">
                                <div class="col-0 col-sm-0 col-md-0 col-lg-1"></div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                                    <div class="row my-5">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center child-box-left">
                                            <div class="mx-md-2 mx-sm-5 mx-lg-5 my-5">
                                                <div>
                                                    <img class="rounded-circle profile-image"
                                                        src="asset/images/images.jpeg" alt="">
                                                </div>
                                                <div class="text-capitalize fw-bolder fs-1 my-3 profile-name">
                                                    <div class="profile-f-name">Arun</div>
                                                    <div class="">Giri</div>
                                                </div>
                                                <div class="w-25 m-auto bg-primary rounded-pill profile-line"></div>
                                                <div class="my-4 text-uppercase">Software Developer</div>
                                            </div>
                                            <div class="row bg-white text-center py-3">
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
                                                <div class="col-10 col-sm-10 col-md-10 col-lg-10">
                                                    <div class="row">
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                        <div class="col-2 col-sm-2 col-md-2 col-lg-2">
                                                            <a href="#"><i class="bi bi-whatsapp"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-1 col-sm-1 col-md-1 col-lg-1"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 bg-white">
                                            <div class="mx-md-2 mx-sm-5 mx-lg-5 my-5">
                                                <h2 class="fw-bolder profile-hello">Hello</h2>
                                                <p class="fw-bold fs-5">Here's who I am & what I do</p>
                                                <div class="text-uppercase profile-butons mb-3">
                                                    <a class="btn btn-outline-dark fw-bold rounded-pill my-1" href="#"
                                                        role="button">RESUME</a>
                                                    <a class="btn btn-outline-dark fw-bold rounded-pill my-1" href="#"
                                                        role="button">PROJECTS</a>
                                                </div>
                                                <p class="fs-6">I'm a paragraph. Click here to add your own
                                                    text and
                                                    edit me. It's
                                                    easy. Just click “Edit Text” or double click me to add your own
                                                    content and make changes to the font.</p>
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
            </div>
        </div>
    </section> -->

    <?php include 'include/footer.php';?>
</body>

</html>

<?php include 'include/ajaxPopupModal.php';?>
<?php include 'include/foot.php';?>
<?php include '../squareImageCrop/imageCrop.php';?>